<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publishers;

class PublishersController extends Controller
{
    public function index()
    {
        $publishers = Publishers::all();
        return view('publishers.index', ['publishers' => $publishers]);
    }
    
    public function show(Publishers $id)
    {
        return view('publishers.show', ['publisher' => $id]);
    }
    
    public function create()
    {
        return view('publishers.create');
    }
    
    public function store()
    {
        $publisher = new Publishers;
        
        $publisher->name = request('name');
        $publisher->description = request('description');
        $publisher->address = request('address');
        $publisher->email = request('email');
        $publisher->save();
        return redirect()->to('/publishers/'.$publisher->id);
    }
}
