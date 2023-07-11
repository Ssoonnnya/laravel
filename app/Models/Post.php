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
            return $posts;
            // ->sortByDesc("date")
        });
        
    
    }
    public static function find($slug){

        return static::all()->firstWhere('slug', $slug);

    }

    public static function findOrFail($slug){

        $post = static::find($slug);

        if(! $post){

            throw new ModelNotFoundException();
        }
         
        return $post;
    }
}
