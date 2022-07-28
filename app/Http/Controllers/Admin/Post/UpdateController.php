<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();;
        $this->service->update($data, $post);
        return redirect()->route('admin.post.show', $post->id);

    }
}
