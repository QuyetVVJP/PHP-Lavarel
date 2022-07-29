<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostRequest;
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

    public function add(){
        $title = 'Thêm bài viết';
        $allGroups = getAllGroups();
        return view('clients.post.add', compact('title', 'allGroups'));
    }

    public function postAdd(PostRequest $request){

        $dataInsert = [
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->contents,
            'group_id' => $request->group_id,
            'create_at' =>date('Y-m-d H:i:s')
        ];

        $this->post->addPost($dataInsert);
        return redirect()->route('posts')->with('msg', 'Thêm bài viết thành công');
    }
}
