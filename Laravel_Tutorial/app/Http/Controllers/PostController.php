<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    private $post;
    public function __construct()
    {
        $this->post = new Post();
    }

    public function index(Request $request){
        $listPost = $this->post->getAllPost();

        return view('clients.post.list',
            compact( 'listPost'));
    }
}
