<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vimeo\Laravel\VimeoManager;

class VimeoController extends Controller
{
    public function create(){
        return view('video-upload.create');
    }

    public function store(Request $request, VimeoManager $vimeo){

        $request->validate(['video'=>'required|mimetypes:video/avi/video/mpeg,video/quicktime|max:60000']);

        $url = $vimeo->upload($request->video,
        [
            'name' => $request->title,
            'description' => $request->description
        ]);

        dd($uri);
    }
}