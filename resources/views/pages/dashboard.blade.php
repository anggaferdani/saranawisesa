@extends('templates.pages')
@section('title', 'Dashboard')
@section('header')
<h1>Dashboard</h1>
@endsection
@section('content')
<div class="row">
  <p>Lorem ipsum dolor sit, {{ auth()->user()->email }} amet consectetur adipisicing elit. Libero, tenetur sequi placeat laborum inventore quas maiores suscipit error sapiente hic saepe non vero quisquam explicabo optio! Maxime beatae molestiae aut! Maiores aliquid ex dignissimos dicta architecto temporibus doloribus, perspiciatis obcaecati illum enim nisi laudantium tempore, debitis aspernatur ad. Accusamus velit odio minima in aliquid voluptates. Saepe autem perferendis nulla vero distinctio ad omnis laboriosam beatae molestias maiores, in cum molestiae repellendus nostrum cumque quia magni eos. Ad ipsa velit tenetur, totam accusamus voluptatum, repellendus et eaque earum corrupti dolore aperiam molestiae non officia, maxime rerum. Ullam, libero? Debitis, quisquam incidunt.</p>
</div>
@endsection