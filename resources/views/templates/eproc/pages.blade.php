<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<style>
  .ball{
    width: 25%;
    top: 6%;
    right: 6%;
  }
  .banner2{
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    z-index: -3;
  }
  .banner3{
    position: absolute;
    top: 56%;
    right: 46%;
    width: 12%;
    z-index: -2;
  }
  .banner4{
    position: absolute;
    bottom: 0%;
    left: 0%;
    width: 10%;
    z-index: -1;
  }
  @media screen and (max-width: 480px){
    .ball{
      width: 60%;
      top: 2%;
      right: -4%;
    }
    .banner2{
      position: absolute;
      top: 0;
      right: 0;
      width: 90%;
      z-index: -3;
    }
    .banner3{
      display: none;
    }
    .banner4{
      display: none;
    }
  }
</style>
<body style="margin-top: 90px;">
  @include('templates.eproc.subtemplates.navbar')

  @yield('content')

  @include('templates.eproc.subtemplates.footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
 </body>
</html>