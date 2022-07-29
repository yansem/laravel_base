<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $post) {
            Post::firstOrCreate([
                'title' => $post['zagolovok']
            ],
                [
                    'title' => $post['zagolovok'],
                    'content' => $post['kontent'],
                    'image' => $post['izobrazeniya'],
                    'likes' => $post['laiki'],
                    'category_id' => $post['kategoriya'],

                ]);
        }
    }
}
