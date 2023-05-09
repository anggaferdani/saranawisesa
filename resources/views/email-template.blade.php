<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Saranawisesa</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  <body class="bg-light">
    <div class="container">
      <div class="card my-10">
        <div class="card-body">
          <h1 class="h3 mb-2">Email Verifikasi</h1>
          <hr>
          <div class="space-y-3">
            <p class="text-gray-700">{!! $body !!}</p>
          </div>
          <hr>
          <a class="btn btn-primary" href="{{ $action_link }}">Verifikasi</a>
        </div>
      </div>
    </div>
  </body>
</body>
</html>