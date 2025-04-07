<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    //evita duplicar likes
    public function store(Post $post){
        //evita duplicar likes
        if(!$post->likes()->where('user_id',auth()->id())->exists()){
            $post->likes()->create(['user_id'=>auth()->id()]);
        }

        return response()->json(['likes'=>$post->likes()->count()]);
    }

    public function destroy(Post $post){
        $post->likes()->where('user_id',auth()->id())->delete();
        
        return response()->json(['likes'=>$post->likes()->count()]);   
    }
}
