<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        
        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $books = $request->validate([
            'title' => 'required',
            'writer' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'publisher' => 'required',
            'year' => 'required',
        ]);

        $books = Book::create($books);

        return response([
            'message' => 'book succesfull added',
            'data' => new BookResource($books),
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Book::find($id);
        return response()->json([
            'data' => $books
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
    
        if (!$book) {
            return response()->json([
                'message' => 'book not found',
                'data' => $book
            ], 404);
        }
    
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'string|required',
            'writer' => 'string|required',
            'user_id' => 'integer|required',
            'category_id' => 'integer|required',
            'publisher' => 'string|required',
            'year' => 'integer|required',
        ]);
    
        // Cek apakah validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
    
        // Update data
        $book->update($request->all());
    
        return response()->json([
            'message' => 'Book successfully updated',
            'data' => $book
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Book::find($id);
        
        if(!$books){
            return response()->json([
                'message' => 'Book not found',
                'data' => $books
            ], 404);
        }
        $books->delete();




        return response()->json([
            'message' => 'Book successfully deleted',
            'data' => $books
        ], 200);
    }
}
