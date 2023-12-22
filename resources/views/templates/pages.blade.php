<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/image-uploader.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<style>
  .preview-area{ 
    display: flex;
    flex-wrap: wrap;
}
.preview-area img{
    width: 24%;
    margin: 0 0 10px;
    object-fit: contain;
}
.preview-area img:not(:nth-child(4n)){
    margin-right: 1.333%;
}
  body.sidebar-mini .main-sidebar .sidebar-menu > li.active > a{
    background-color: #920000;
    color: white !important;
    box-shadow: none;
  }
  .navbar-bg{
    background-color: #920000 !important;
  }
  .btn.btn-primary{
    background-color: #920000 !important;
    box-shadow: none;
    border: none;
  }
  .image2{
    display: block;
    width: 250px;
    height: 200px;
    margin-bottom: 1%;
  }
  .card2 .slick-list{
    margin: 0 -5px !important;
  }
  .card2 .slick-slide > div{
    margin: 0 5px !important;
  }
  .image3{
      width: 100%;
      height: 100%;
      object-fit: cover;
      cursor: pointer;
    }
  .btn.btn-primary:hover{
    background-color: #720000 !important;
    box-shadow: none;
    border: none;
  }
  .btn.btn-primary:active{
    background-color: #720000 !important;
    box-shadow: none;
    border: none;
  }
  .main-sidebar .sidebar-menu li.active a{
    color: #920000 !important;
  }
  body:not(.sidebar-mini) .sidebar-style-2 .sidebar-menu > li.active > a:before{
    background-color: #920000 !important;
  }
  .active{
    color: #920000 !important;
  }
  .modal-backdrop{
    display: none;
  }
  .modal{
    background: rgba(0, 0, 0, 0.5); 
  }
  .separator {
    display: flex;
    align-items: center;
    text-align: center;
  }
  .separator::before,
  .separator::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #000;
  }
  .separator:not(:empty)::before {
    margin-right: .25em;
  }
  .separator:not(:empty)::after {
    margin-left: .25em;
  }
</style>

<body class="sidebar-mini">
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('templates.subtemplates.navbar')
      @include('templates.subtemplates.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            @yield('header')
          </div>
          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>
      
      @include('templates.subtemplates.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js" integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="{{ asset('dist/image-uploader.min.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.input-images').imageUploader({
        imagesInputName: 'images',
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      if(window.File && window.FileList && window.FileReader){
        $("#image2").on("change", function(e){
          var files = e.target.files,
          filesLength = files.length;
          for(var i = 0; i < filesLength; i++){
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e){
              var file = e.target;
              $("<span class=\"image2\">" + "<img class=\"image3\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" + "</span>").insertAfter("#image2");
            });
            fileReader.readAsDataURL(f);
          }
        });
      }else{
        alert("Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus amet dolore ex saepe, incidunt accusamus distinctio voluptatum esse recusandae. Beatae dicta tempora culpa libero suscipit quam vero ad, corporis soluta.");
      }
    });
  </script>
  
  <!-- JS Libraies -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    $('.delete').click(function(){
      Swal.fire({
        title: "Are you sure?",
        text: "Are you sure you want to delete this item?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it",
        closeOnConfirm: false
      }).then((result) => {
        if(result.isConfirmed){
          $(this).closest("form").submit();
          Swal.fire(
            'Deleted',
            'You have successfully deleted',
            'success',
          );
        }
      });
    });
  </script>

  <script type="text/javascript">
    $('.verifikasi').click(function(){
      Swal.fire({
        title: "Are you sure?",
        text: "Nyatakan perusahaan ini telah memnuhi semua persyaratan yang ada",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        closeOnConfirm: false
      }).then((result) => {
        if(result.isConfirmed){
          $(this).closest("form").submit();
          Swal.fire(
            'Terverifikasi',
            'Perusahaan ini telah terverifikasi',
            'success',
          );
        }
      });
    });
  </script>

  <script type="text/javascript">
    $('.batalkanVerifikasi').click(function(){
      Swal.fire({
        title: "Are you sure?",
        text: "Pembatalan verifikasi akun akan mengakibatkan fitur-fitur terbatas pada akun Anda. Apakah Anda yakin ingin membatalkan verifikasi akun?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        closeOnConfirm: false
      }).then((result) => {
        if(result.isConfirmed){
          $(this).closest("form").submit();
          Swal.fire(
            'Batal Terverifikasi',
            'Berhasil membatalkan verifikasi akun. Akun Anda sekarang tidak lagi diverifikasi.',
            'success',
          );
        }
      });
    });
  </script>

  <script type="text/javascript">
    $('.tunjuk-sebagai-pemenang').click(function(){
      Swal.fire({
        title: "Are you sure?",
        text: "Dengan ini menyatakan bahwa perusahaan ini telah memenuhi semua persyaratan yang ada dan nyatakan perusahaan ini sebagai Pemenang",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        closeOnConfirm: false
      }).then((result) => {
        if(result.isConfirmed){
          $(this).closest("form").submit();
          Swal.fire(
            'Success',
            'Perusahaan ini dinyatakan sebagai pemenang',
            'success',
          );
        }
      });
    });
  </script>

<script type="text/javascript">
  $(document).ready(function () {
    $('#hapusPemenang').click(function (event) {
      event.preventDefault();

      var clickedLink = $(this);

      Swal.fire({
        title: "Are you sure?",
        text: "Dengan berat hati, kami sampaikan bahwa keputusan telah diambil untuk membatalkan kemenangan. Keputusan ini diambil setelah melalui pertimbangan yang matang dan sesuai dengan ketentuan yang berlaku.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes",
        closeOnConfirm: false
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = clickedLink.attr('href');

          Swal.fire(
            'Success',
            'Perusahaan ini dinyatakan sebagai pemenang',
            'success',
          );
        }
      });
    });
  });
</script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.select2').select2({});
    });
  </script>

  <script type="text/javascript">
    function preview(elem, output = '') {
      Array.from(elem.files).map((file) => {
          const blobUrl = window.URL.createObjectURL(file)
          output+=`<img src=${blobUrl}>`
      })   
      elem.nextElementSibling.innerHTML = output
    }
  </script>

  <script type="text/javascript">
    $('.card2').slick({
      arrows: false,
      dots: true,
      autoplay: true,
      autoplaySpeed: 3000,
      infinite: true,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            arrows: false,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
            arrows: false,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            arrows: false,
          }
        }
      ]
    });
  </script>

  <script type="text/javascript">
    function formatNumber(input){
      var num = input.value.replace(/[^0-9]/g, '');

      var formattedNum = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(num);
      input.value = formattedNum;
    }
  </script>

  <script type="text/javascript">
    var file = function(event){
      var image = document.querySelector('.image');
      image.src = URL.createObjectURL(event.target.files[0]);
    }
  </script>

  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
</body>
</html>