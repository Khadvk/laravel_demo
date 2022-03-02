<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Authors::all();
        return view('authors.index', ['authors' => $authors]);
    }
    
    public function show(Authors $id)
    {
        return view('authors.show', ['author' => $id]);
    }
    
    public function create()
    {
        return view('authors.create');
    }
    
    public function store()
    {
        $author = new Authors;
        
        $author->name = request('name');
        $author->description = request('description');
        $author->biography = request('biography');
        $author->birthday = request('birthday');
        $author->address = request('address');
        $author->email = request('email');
        $author->save();
    }
}
