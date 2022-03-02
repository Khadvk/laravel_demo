<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index', ['categories' => $categories]);
    }
    
    public function show(Categories $id)
    {
        return view('categories.show', ['category' => $id]);
    }
    
    public function create()
    {
        return view('categories.create');
    }
    
    public function store()
    {
        $category = new Categories;
        
        $category->name = request('name');
        $category->description = request('description');
        $category->save();
        return redirect()->to('/categories/'.$category->id);
    }
}
