<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    hi, <h1>{{$name}} Replied To Your Comment</h1>
    <p>saying "{{$body}}"</p>
    <a href="{{route('post_show',$id)}}">click </a> 


</body>
</html>