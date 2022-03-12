<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ActionsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->text){
            $posts = Post::where('title', 'like', '%' . $request->text . '%')
                ->orWhere('description', 'like', '%' . $request->text . '%')
                ->orWhereHas('category', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->text . '%');
                })->paginate(1);
        }else{

            $posts = Post::paginate(1);
        }
        return view('site.posts', [
            'posts' => $posts
        ]);
    }
}
