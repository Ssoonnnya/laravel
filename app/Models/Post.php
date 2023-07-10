<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post 
{
    use HasFactory;

    public $title;

    public $excerpt;
    
    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug){

        $this -> title = $title;
        $this -> excetpt = $excerpt;
        $this -> date = $date;
        $this -> body = $body;
        $this -> slug = $slug;
    }

    public static function all(){

        return cache()->rememberForever('post.all', function(){

            $files = File::files(resource_path("posts"));

        collect($files);
    
        
            $posts=array_map(function($file) {
                $document = YamlFrontMatter::parseFile($file);
        
                return new Post(
                    $document -> title,
                    $document -> excerpt,
                    $document -> date,
                    $document -> body(),
                    $document -> slug,
        
                );
            }, $files);
    
            // ->sortByDesc("date")
        });
        
    
    }

    public static function find($slug){

        return static::all()->firstWhere('slug', $slug);

        // if(! file_exists($path =  __DIR__ . resource_path("posts/{$slug}.html" ))){

        //    throw new ModelNotFoundException();
        // }

        // $post = cache()->remember("posts.{$slug}", 1200, function() use ($path){
        //     return file_get_contents($path);

        // });

        // return $post = file_get_contents($path);

    }
}
