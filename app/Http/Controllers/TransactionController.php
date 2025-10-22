<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'book')->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        // kembalikan dalam format JSON
        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $transactions
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. validator dan cek validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        // 2. generate orderNumber -> unique | ORD-0003
        $uniqueCode = "ORD-" . strtoupper(uniqid());

        // 3. ambil user yang sudah login dan cek login (apakah ada data user?)
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorize!'
            ], 401);
        }

        // 4. mencari data buku dari request
        $book = Book::find($request->book_id);

        // 5. cek stok buku
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Not enough stock!'
            ], 400);
        }

        // 6. hitung total harga = price * quantity
        $totalAmount = $book->price * $request->quantity;

        // 7. kurangi stok buku(update)
        $book->stock -= $request->quantity;
        $book->save();

        // 8. simpan data transaksi
        $transactions = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully!',
            'data' => $transactions,
        ], 201);
    }

    public function show(string $id)
    {
        $transaction = Transaction::with(['user', 'book'])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Detail resource',
            'data' => $transaction,
        ], 200);
    }

    public function update(string $id, Request $request)
    {
        // 1. Mencari data
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                "success" => false,
                "message" => "Transaction not found"
            ], 404);
        }

        // 2. Validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. Kembalikan stok lama
        $oldBook = Book::find($transaction->book_id);
        $oldBook->stock += $transaction->quantity;
        $oldBook->save();

        // 4. Ambil buku baru
        $book = Book::find($request->book_id);

        // 5. Cek stok buku baru
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Not enough stock!'
            ], 400);
        }

        // 6. Kurangi stok buku baru
        $book->stock -= $request->quantity;
        $book->save();

        // 7. Hitung total harga
        $totalAmount = $book->price * $request->quantity;

        // 8. Update data transaksi
        $data = [
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount,
        ];

        $transaction->update($data);

        // 9. Kembalikan response
        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully!',
            'data' => $transaction->fresh()
        ], 200);
    }

    public function destroy(string $id)
    {
        $transaction = Transaction::find($id);

        // Jika data tidak ditemukan
        if (!$transaction) {
            return response()->json([
                "success" => false,
                "message" => "Transaction not found"
            ], 404);
        }

        // Jika berhasil dihapus
        $transaction->delete();

        return response()->json([
            "success" => true,
            "message" => "Transaction deleted successfully"
        ], 200);
    }
}
