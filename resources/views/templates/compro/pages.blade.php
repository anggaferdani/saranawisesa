<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.1.10/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  body{
    font-family: 'Nunito Sans', sans-serif;
  }
  .navbar-brand-scrolled{
    transition: all .10s ease-in-out;
    width: 70px !important;
  }
  .navbar-brand-scrolled2{
    transition: all .10s ease-in-out;
    width: 170px !important;
    display: block !important;
  }
  .navbar-collapse-scrolled2{
    transition: all .10s ease-in-out;
    margin-top: 0px !important;
  }
  .nav-biasa{
    color: black!important
  }
  .nav-link{
    transition: all .10s ease-in-out;
    color: white;
  }
  .nav-link-scrolled{
    transition: all .10s ease-in-out;
    color: black !important;
  }
  .product-and-service{
    transition: all .10s ease-in-out;
    text-transform: lowercase;
  }
  .product-and-service:first-letter{
    text-transform: capitalize;
  }
  .puzzle{
    width: 100%;
    height: 100%;
  }

  .puzzle-border {
    height: 100%;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: auto auto auto;
    grid-template-areas: 
      "info info info tag" 
      "comment comment comment comment" 
      "album album rotate rotate"
  }
  
  .info {
    border-right: 15px solid white;
    border-bottom: 15px solid white;
    grid-area: info;
    background: #920000;
    color: white;
    font-size: 40px;
    font-weight: bold;
  }
  
  .tag {
    border-bottom: 15px solid white;
    grid-area: tag;
    background: transparent;
  }
  
  .comment {
    grid-area: comment;
    background: transparent;
  }
  
  .album {
    border-top: 15px solid white;
    border-right: 15px solid white;
    grid-area: album;
    background: transparent;
  }
  
  .rotate {
    border-top: 15px solid white;
    grid-area: rotate;
    background: transparent;
  }

  .kontener{
    align-items: start!important;
    transition: all .10s ease-in-out;
    padding-top: 1rem;
  }

  .kontener.scrolled{
    align-items: center!important;
    transition: all .10s ease-in-out;
    padding: 0;
  }

  #sw{
    width: 150px;
  }
  
  @media only screen and (max-width: 992px) {
    #sw{
      width: 60px;
    }

    .navbar{
      background-color: white;
    }

    .nav-link{
      color: black;
    }
    
    .kontener{
      align-items: start!important;
      padding-top: 0;
    }
  }
</style>
<body style="margin-top: 90px;">
  @if(str_contains(Route::currentRouteName(), 'index'))
    @include('templates.compro.subtemplates.navbar2')
  @else
    @include('templates.compro.subtemplates.navbar')
  @endif

  @yield('content')

  @include('templates.compro.subtemplates.footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js" integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script type="text/javascript">
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav',
    });
    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: true,
      centerMode: true,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true,
            arrows: false,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2,
            arrows: false,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: false,
          }
        }
      ]
    });
  </script>

  <script type="text/javascript">
    $(window).scroll(function(){
      if($(document).scrollTop() > 20){
        $('.navbar').addClass('bg-light-subtle');
        $('.navbar').addClass('border-bottom');
        $('.navbar-brand').addClass('navbar-brand-scrolled');
        $('.navbar-brand2').addClass('navbar-brand-scrolled2');
        $('.navbar-collapse').addClass('navbar-collapse-scrolled2');
        $('.navbar-collapse').addClass('navbar-collapse-scrolled2');
        $('.nav-link').addClass('nav-link-scrolled');
        $('.kontener').addClass('scrolled');
      }else{
        $('.navbar').removeClass('bg-light-subtle');
        $('.navbar').removeClass('border-bottom');
        $('.navbar-brand').removeClass('navbar-brand-scrolled');
        $('.navbar-brand2').removeClass('navbar-brand-scrolled2');
        $('.nav-link').removeClass('nav-link-scrolled');
        $('.navbar-collapse').addClass('navbar-collapse-scrolled2');
        $('.kontener').removeClass('scrolled');
      }
    });
  </script>
</body>
</html>