<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
//        $posts = Post::paginate(10);
//        return view('posts.index', compact('posts'));
        $data = $request->validated();
        $query = Post::query();
        if(isset($data['category_id'])) {
            $query->where('category_id', $data['category_id']);
        }
        if(isset($data['title'])) {
            $query->where('title', 'like', "%{$data['title']}%");
        }
        $posts = $query->get();
        dd($posts);

    }
}
