<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function getCategories(Request $request)
    {
        $categories = Category::with('topics')->get();

        return compact('categories');
    }
}
