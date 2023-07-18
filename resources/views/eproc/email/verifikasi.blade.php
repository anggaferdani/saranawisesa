<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  <body class="bg-light">
    <div class="container">
      <div class="card py-5">
        <img src="{{ asset('eproc/img/logo.png') }}" width="150" height="150" class="img-fluid mx-auto" alt="">
        <div class="card-body">
          <h1 class="fw-bold text-center mb-4">Verifikasi email anda</h1>
          <div class="h5 fw-normal mb-4">{!! $body !!}</div>
          <div class="text-center"><a class="btn btn-dark rounded-pill py-3 px-5" href="{{ $action_link }}"><h4 class="m-0">Verifikasi</h4></a></div>
        </div>
      </div>
    </div>
  </body>
</body>
</html>