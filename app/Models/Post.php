<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Post 
{
    use HasFactory;

    public static function all(){

        return File::files(resource_path("posts/"));
        return array_map(fn($file)=>$file->getContent(), $files);
    }

    public static function find($slug){

        if(! file_exists($path =  __DIR__ . resource_path("posts/{$slug}.html" ))){

           throw new ModelNotFoundException();
        }

        $post = cache()->remember("posts.{$slug}", 1200, function() use ($path){
            return file_get_contents($path);

        });

        return $post = file_get_contents($path);

    }
}
