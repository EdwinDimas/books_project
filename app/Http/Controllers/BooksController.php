<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;


class BooksController extends Controller
{


    public function store(Request $request){
        $user_id = 1;
        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->user_id = $ruser_id;
        $book->save();
        return response()->json(['message' => 'Book created', 'book' => $book], 201);
    }

    public function index(){
        $books = Book::all();
        return response()->json(['books' => $books], 200);
    }

    public function destroy($book_id){
        $book = Book::find($book_id);
        if ($book) {
            $book->delete();
            return response()->json(['message' => 'Book deleted'], 200);
        } else {
            return response()->json(['error' => 'Book not found'], 404);
        }
    }

}
