<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    hi, <h1>{{$name}}</h1> 
<h3>{{$topic}}</h3> 
<p><?php echo substr($body,0,300)?>...</p>
<p class="btn btn-primary"><a href="{{route('post_show',$id)}}">Read More</a></p>
</body>
</html>