<?php

namespace App\Http\Controllers;


use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    private $post;
    const _PER_PAGE = 5;
    public function __construct()
    {
        $this->post = new Post();
    }

    public function index(Request $request){

        $filters = [];
        $keywords = null;
        if (!empty($request->group_id)) {
            $group_id = $request->group_id;

            $filters[] = ['post.group_id', '=', $group_id];
        };

        if (!empty($request->keywords)) {
            $keywords = $request->keywords;

        };

        // Xu ly logic sap xep
        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');

        $allowSort = ['asc', 'desc'];
        if (!empty($sortType) && in_array($sortType, $allowSort)) {
            if ($sortType == 'desc') {
                $sortType = 'asc';
            } else {
                $sortType = 'desc';
            }
        } else {
            $sortType = 'asc';
        }

        $sortArray = [
            'sortBy' => $sortBy,
            'sortType' => $sortType
        ];


        $listPost = $this->post->getAllPost( $filters, $keywords, $sortArray, self::_PER_PAGE);

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
        return redirect()->route('home')->with('msg', 'Thêm bài viết thành công');
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
                return redirect()->route('home')->with('msg', 'Bài viết không tồn tại');
            }
        } else {
            return redirect()->route('home')->with('msg', 'Bài viết không tồn tại');
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
                return redirect()->route('home')->with('msg', 'Bài viết không tồn tại');
            }
        } else {
            return redirect()->route('home')->with('msg', 'Bài viết không tồn tại');
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
        return redirect()->route('home')->with('msg', 'Cập nhật bài viết thành công');
    }

    public function delete($id = 0)
    {
        if (!empty($id)) {
            $userDetail = $this->post->getDetail($id);
            if (!empty($userDetail[0])) {

                $deleteStatus = $this->post->deletePost($id);
                if ($deleteStatus) {
                    $msg = 'Xóa bài viết thành công';
                } else {
                    $msg = 'Bạn không thể xóa bài viết lúc này, vui lòng thử lại sau';
                }
            } else {
                $msg = 'Bài viết không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }

        return redirect()->route('home')->with('msg', $msg);

    }


    public function about(){
        return view('clients.about');
    }
}
