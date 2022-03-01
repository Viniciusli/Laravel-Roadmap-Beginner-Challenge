<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = ['categories', 'tags', 'articles'];

        $categories = Category::all()->take(9)->pluck('name')->toArray();
        $tags = Tag::all();
        $articles = Article::whereNotNull('image')->take(2)->get();

        return view('site.pages.home.index', compact($data));
    }
}
