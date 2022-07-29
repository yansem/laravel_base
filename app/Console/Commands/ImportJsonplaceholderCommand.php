<?php

namespace App\Console\Commands;

use App\Components\ImportData;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportJsonplaceholderCommand extends Command
{

    protected $signature = 'import:jsonplaceholder';

    protected $description = 'Get data from jsonplaceholder';


    public function handle()
    {
        $import = new ImportData();
        $response = $import->client->request('GET', 'posts');
        $posts = json_decode($response->getBody()->getContents());
        foreach ($posts as $post) {
            Post::firstOrCreate([
                'title' => $post->title
            ], [
                'title' => $post->title,
                'content' => $post->body,
                'category_id' => 2
            ]);
        }
        dd('finish');
    }
}
