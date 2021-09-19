<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Upload Videos</title>
    </head>
    <body>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('video-upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="title">
        <input type="text" name="description" placeholder="description">
        <input type="file" name="video" placeholder="">
        <input type="submut" value="Submit">
    </body>
</html>
