<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except([]);
    }


    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $user_id = auth()->user()->id;

        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->description = $request->input('description');
        $book->user_id = $user_id;
        $book->save();
        return response()->json(['message' => 'Book created', 'book' => $book], 201);
    }

    public function index(){

        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $books = Book::where('user_id', $user_id)->get();
            return response()->json(['books' => $books], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

    }

    public function destroy($book_id){

        $validator = Validator::make([ 'book_id' => $book_id],[
            'book_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $user_id = auth()->user()->id;

        $book = Book::where('id',$book_id)->where('user_id',$user_id)->first();
        if ($book) {
            $book->delete();
            return response()->json(['message' => 'Book deleted'], 200);
        } else {
            return response()->json(['error' => 'Book not found'], 404);
        }
    }

}
