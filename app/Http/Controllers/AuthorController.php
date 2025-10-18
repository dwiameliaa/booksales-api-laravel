<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $authors
        ], 200);
    }

    public function store(Request $request)
    {
        // 1. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'bio' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // 2. Cek validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. Upload image
        $image = $request->file('photo');
        $image->store('authors', 'public');

        // 4. Simpan data
        $author = Author::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'photo' => $image->hashName(),
        ]);

        // 5. Response
        return response()->json([
            'success' => true,
            'message' => 'Resource added successfully!',
            'data' => $author,
        ], 201);
    }

    public function show(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Detail resource',
            'data' => $author,
        ], 200);
    }

    public function update(string $id, Request $request)
    {
        // 1. mencari data
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Author not found"
            ], 404);
        }

        // 2. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'bio' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. siapkan data yang ingin di update
        $data = [
            'name' => $request->name,
            'bio' => $request->bio,
        ];

        // 4. handle image (upload image dan delete image)
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image->store('authors', 'public');

            if ($author->photo) {
                Storage::disk('public')->delete('authors/' . $author->photo);
            }

            $data['photo'] = $image->hashName();
        }

        // 5. update data baru ke database
        $author->update($data);

        return response()->json([
            'succes' => true,
            'massage' => 'Resource updated successfully!',
            'data' => $author,
        ], 200);
    }

    public function destroy(string $id)
    {
        $author = Author::find($id);

        // Jika data tidak ditemukan
        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Author not found"
            ], 404);
        }

        if($author->photo) {
            // delete from storage
            Storage::disk('public')->delete('authors/' . $author->photo);
        }
        
        // Jika berhasil dihapus
        $author->delete();

        return response()->json([
            "success" => true,
            "message" => "Author deleted successfully"
        ], 200);
    }
}
