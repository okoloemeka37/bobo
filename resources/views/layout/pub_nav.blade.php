<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset(mine/lol.png)}}" type="image/x-icon">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <link rel="stylesheet" href="{{asset('css/foot.css')}}">
        <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('script/jquery.js')}}" defer></script> 
        <script src="{{asset('script/index.js')}}" defer></script>
        <script src="{{asset('script/simp.js')}}" defer></script>
    <script src="{{asset('script/more.js')}}" defer></script> 
    <script src="https://kit.fontawesome.com/d335dcf51b.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="d-flex justify-content-between sticky-top bg-light shadow-lg pl-1 pl-2 ">
   
  <div class="mt-3"><a class="" href="{{route('blog_index')}}"><p>BoBo And Bae</p></a></div> 
    <ul class=" nav mt-1 show " id="nav">
        <li class="nav-item "><a href="{{route('about_show')}}" class="nav-link">About</a></li>
        <li class="nav-item text-primary"><a href="{{route('contact_show')}}" class="nav-link">Contact</a></li>
        <li class="nav-item text-primary" ><a href="{{route('blog_index')}}" class="nav-link">Blog</a></li>
         
        
   
   </ul>
  <div class="tri-line" id="toggle-nav">
              <div class="line"></div>
              <div class="line"></div>
              <div class="line"></div>
                   
            </div>
    </div>


@yield('content')


  

  <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify">I have developed a comprehensive Laravel blog site with several advanced features designed to enhance user experience and streamline content management. Key functionalities of the site include</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Languages</h6>
          <ul class="footer-links">
            <li>HTML</li>
            <li>CSS(BOOTSTRAP)</li>
            <li>JAVASCRIPT</li>
            <li>PHP(LARAVEL)</li>
            <li>SQLI</li>
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="{{route('about_show')}}">About Us</a></li>
            <li><a href="https://okoloemeka37.github.io/Portfolio/">Contact Us</a></li>
           
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; <?php echo date("Y") ?>
       <a href="https://okoloemeka37.github.io/Portfolio/">Zyler</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="https://web.facebook.com/emeka.okolo.5201"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="https://x.com/zylercodes?t=wb2Ah1UrbAUgYASqkIwZsQ&s=09&mx=2"><i class="fa-brands fa-x-twitter"></i></a></li>
            <li><a class="dribbble" href="https://github.com/okoloemeka37"><i class="fa-brands fa-github"></i></a></li>
            <li><a class="linkedin" href="https://www.linkedin.com/in/okolo-emeka-402295254/"><i class="fa fa-linkedin"></i></a></li>   
          </ul>
        </div>
      </div>
    </div>
</footer>

</body>
</html>