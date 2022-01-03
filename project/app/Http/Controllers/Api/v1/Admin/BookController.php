<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);

        return response()->json($books);
    }

   public function show(Book $book)
   {
       return response()->json($book);
   }

    public function store(BookRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $book = Book::create($data);

        return response()->json($book);
    }

    public function update(BookRequest $request, $bookId)
    {
        $data = $request->all();
        $book = Book::find($bookId);
        $book->update($data);

        return response()->json($book);
    }

    public function delete($bookId)
    {
        $book = Book::find($bookId);
        $book->delete();

        return response()->json($book);
    }

}
