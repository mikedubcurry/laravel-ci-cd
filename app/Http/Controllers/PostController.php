<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Events\NewPostCreated;

class PostController extends Controller
{
    public function create(Request $request)
    {
        return view('posts.create');
    }

    public function index(Request $request)
    {
        $page = $request->get('page');
        
        if($page <= 1) {
            $page = 1;
        }

        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('posts.index', ['posts' =>$posts, 'page' => $page  ]);
    }

    public function getPost( $postId)
    {
        $post = Post::where('id',$postId)->first();
        return view('posts.post', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $post = new Post(['title'=> $request->title, 'body' => $request->body, 'author_id' => $user->id]);

        $post->save();

        NewPostCreated::dispatch($post);

        return redirect(route('posts'));
    }

    public function search(Request $request)
    {
        
        $page = $request->get('page');
        
        if($page <= 1) {
            $page = 1;
        }
        
        $query = $request->get('query');

        if(is_null($query)) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(5);

            return view('posts.index', ['posts' => $posts, 'page' => $page]);
        }
        $posts = Post::search($query)->paginate(5);

        return view('posts.index', ['posts' => $posts, 'page' => $page]);
    }
}
