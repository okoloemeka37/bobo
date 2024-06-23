<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    hi, <h1>{{$name}} comment on Your Post</h1>
    <a href="{{route('post_show',$id)}}">click </a> 
<h3>post content</h3>
<hr> 
<p>{{$body}}</p>

</body>
</html>