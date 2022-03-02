<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return view('books.index', ['books' => $books]);
    }
    
    public function show(Books $book)
    {
        return view('books.show', ['book' => $book]);
    }
    
    public function create()
    {
        return view('books.create');
    }
    
    public function store()
    {
        $book = new Books;
        
        $book->title = request('title');
        $book->isbn = request('isbn');
        $book->category_id = request('category_id');
        $book->parent_id = request('parent_id');
        $book->publisher_id = request('publisher_id');
        $book->condition = request('condition');
        $book->content = request('content');
        $book->description = request('description');
        $book->num_pages = request('num_pages');
        $book->quantity = request('quantity');
        $book->edition = request('edition');
        $book->price = request('price');
        $book->date_published = request('date_published');
        $book->save();
        return redirect()->to('/books/'.$book->id);
    }
}
