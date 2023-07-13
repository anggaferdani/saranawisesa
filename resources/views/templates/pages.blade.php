<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">

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
  
  <!-- JS Libraies -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript">
    $('.delete').click(function(){
      Swal.fire({
        title: "Are you sure?",
        text: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus amet dolore ex saepe, incidunt accusamus distinctio voluptatum esse recusandae. Beatae dicta tempora culpa libero suscipit quam vero ad, corporis soluta.",
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
        text: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus amet dolore ex saepe, incidunt accusamus distinctio voluptatum esse recusandae. Beatae dicta tempora culpa libero suscipit quam vero ad, corporis soluta.",
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
            'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus amet dolore ex saepe, incidunt accusamus distinctio voluptatum esse recusandae. Beatae dicta tempora culpa libero suscipit quam vero ad, corporis soluta.',
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
    $(document).ready(function(){
      $('.select2').select2({});
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