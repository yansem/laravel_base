<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $page = $data['page'] ?? 1;
        $per_page = $data['per_page'] ?? 10;
        $filter = app()->make(PostFilter::class, ['queryParams' => $data]);
        $posts = Post::filter($filter)->paginate($per_page, ['*'], 'page', $page)->withQueryString();
        return PostResource::collection($posts);
        return view('posts.index', compact('posts'));

    }
}
