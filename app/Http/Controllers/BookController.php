<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate();
        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $newBook = new Book();
        $newBook->title = $data['title'];
        $newBook->author = $data['author'];
        $newBook->price = $data['price'];
        $newBook->img = $data['img'];
        $newBook->save();

        return redirect()->route('books.index');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', [
            'book' => $book
        ]);
    }

    public function edit($id)
    {
        return view('books.edit', compact('id'));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrfail($id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
