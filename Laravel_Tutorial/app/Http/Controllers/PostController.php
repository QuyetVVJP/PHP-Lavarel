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
            'contents' => $request->contents,
            'group_id' => $request->group_id,
            'create_at' =>date('Y-m-d H:i:s')
        ];

        $this->post->addPost($dataInsert);
        return redirect()->route('posts')->with('msg', 'Thêm bài viết thành công');
    }

    public function getPost(Request $request, $id = 0)
    {
        $title = '';
        if (!empty($id)) {
            $postDetail = $this->post->getDetail($id);
            if (!empty($postDetail[0])) {
                $request->session()->put('id', $id);
                $postDetail = $postDetail[0];
                $title = $postDetail->title;
            } else {
                return redirect()->route('posts')->with('msg', 'Bài viết không tồn tại');
            }
        } else {
            return redirect()->route('posts')->with('msg', 'Bài viết không tồn tại');
        }

        return view('clients.post.detail', compact('title', 'postDetail'));
    }

    public function getEdit(Request $request, $id = 0){
        $title = 'Cập nhật bài viết';
        if (!empty($id)) {
            $postDetail = $this->post->getDetail($id);
            if (!empty($postDetail[0])) {
                $request->session()->put('id', $id);
                $postDetail = $postDetail[0];
            } else {
                return redirect()->route('posts')->with('msg', 'Bài viết không tồn tại');
            }
        } else {
            return redirect()->route('posts')->with('msg', 'Bài viết không tồn tại');
        }
        $allGroups = getAllGroups();
        return view('clients.post.edit', compact('title', 'postDetail','allGroups'));
    }

    public function postEdit(PostRequest $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }

        $dataInsert = [
            'title' => $request->title,
            'author' => $request->author,
            'contents' => $request->contents,
            'group_id' => $request->group_id,
            'create_at' =>date('Y-m-d H:i:s')
        ];

        $this->post->updatePost($dataInsert, $id);
        return redirect()->route('posts')->with('msg', 'Cập nhật bài viết thành công');
    }
}
