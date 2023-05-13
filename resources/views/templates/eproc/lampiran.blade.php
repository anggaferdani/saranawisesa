<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-social/bootstrap-social.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
</head>
<style>
  .form-section{
      display: none;
  }
  .form-section.current{
      display: inline;
  }
  .parsley-errors-list{
      color:red;
  }
</style>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-4">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header"><h4>@yield('title')</h4></div>
              <div class="card-body">
            
                @if(Session::get('success'))
                  <div class="alert alert-important alert-success" role="alert">
                    {{ Session::get('success') }}
                  </div>
                @endif
            
                @if(Session::get('fail'))
                  <div class="alert alert-important alert-danger" role="alert">
                    {{ Session::get('fail') }}
                  </div>
                @endif
            
                <form method="POST" action="{{ route('eproc.postregister') }}" class="needs-validation" novalidate="#">
                  @csrf
                  <div class="form-section">
                    <div class="form-group">
                      <label for="nama_badan_usaha">Nama Badan Usaha</label>
                      <input id="nama_badan_usaha" type="text" class="form-control" name="nama_badan_usaha">
                      @error('nama_badan_usaha')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                      <label for="status_badan_usaha">Status Badan Usaha</label>
                      <select id="status_badan_usaha" class="form-control form-control-sm" name="status_badan_usaha">
                        <option disabled selected>Pilih</option>
                        <option value="pusat">Pusat</option>
                        <option value="cabang">Cabang</option>
                      </select>
                      @error('status_badan_usaha')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                      <label for="alamat_kantor" class="control-label">Alamat Kantor</label>
                      <textarea id="alamat_kantor" class="form-control" name="alamat_kantor"></textarea>
                      @error('alamat_kantor')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                  </div>
                  <div class="form-section">
                    <div class="form-group">
                      <label for="no_telepon">No Telepon</label>
                      <input id="no_telepon" type="text" class="form-control" name="no_telepon">
                      @error('no_telepon')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                      <label for="no_fax" class="control-label">No Fax</label>
                      <input id="no_fax" type="text" class="form-control" name="no_fax">
                      @error('no_fax')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                      <label for="email" class="control-label">Email</label>
                      <input id="email" type="text" class="form-control" name="email">
                      @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                      <label for="bukti_kepemilikan_tempat_usaha" class="control-label">Bukti Kepemilikan Tempat Usaha</label>
                      <input id="bukti_kepemilikan_tempat_usaha" type="text" class="form-control" name="bukti_kepemilikan_tempat_usaha">
                      @error('bukti_kepemilikan_tempat_usaha')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                  </div>
                  <div class="form-group form-navigation">
                    <button type="button" class="previous btn btn-secondary">Previous</button>
                    <button type="button" class="next btn btn-primary">Next</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>