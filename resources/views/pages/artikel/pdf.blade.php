<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Artikel</title>
</head>
<body>
  <h1>{{ $title }}</h1>
  <p>{{ $date }}</p>
  <p>debitis aspernatur ad. Accusamus velit odio minima in aliquid voluptates. Saepe autem perferendis nulla vero distinctio ad omnis laboriosam beatae molestias maiores, in cum molestiae repellendus nostrum cumque quia magni eos.</p>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul Artikel</th>
        <th>Thumbnail</th>
        <th>Tanggal Publikasi</th>
        <th>Isi Artikel</th>
      </tr>
    </thead>
    <tbody>
      <?php $id = 0; ?>
      @foreach ($artikel as $artikels)
      <?php $id++; ?>
        <tr>
          <td>{{ $id }}</td>
          <td>{{ $artikels->judul_artikel }}</td>
          <td><img src="artikel/{{ $artikels->thumbnail }}" alt="" width="100px"></td>
          <td>{{ $artikels->tanggal_publikasi }}</td>
          <td>{{ $artikels->isi_artikel }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>