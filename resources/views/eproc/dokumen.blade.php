@extends('templates.pages')
@section('title', 'Data Personalia')
@section('header')
<h1>Data Personalia</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    
    @if(Session::get('success'))
      <div class="alert alert-primary">{{ Session::get('success') }}</div>
    @endif

    @if(Session::get('fail'))
      <div class="alert alert-danger">{{ Session::get('fail') }}</div>
    @endif

    <div class="card">
      @include('eproc.profile')
    </div>

    <div class="card">
      @include('eproc.menu')
    </div>

    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Tipe Dokumen</th>
                <th>Berkas Dokumen</th>
                <th>Nomor Dokumen</th>
                <th>Tanggal Terbit</th>
                <th>Tanggal Kadaluarsa</th>
              </tr>
              <tr>
                <td>1</td>
                <td style="white-space: nowrap">
                  <button type="button" class="btn btn-icon text-white" style="background-color: #830000 !important;"><i class="fa fa-pen"></i></button>
                  <button type="button" class="btn btn-icon text-white" data-toggle="modal" data-target="#exampleModalCenter" style="background-color: #830000 !important;"><i class="fa fa-eye"></i></button>
                  <button type="button" class="btn btn-icon text-white delete" style="background-color: #830000 !important;"><i class="fa fa-trash"></i></button>
                </td>
                <td>Akta Pendirian Perusahaan <span class="text-danger">*wajib</span></td>
                <td>Nama_dokumen.pdf</td>
                <td>001</td>
                <td>01/06/2023</td>
                <td>01/06/2024</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama</label>
          <input disabled type="text" class="form-control" name="nama" value="Angga Wahyu">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input disabled type="text" class="form-control" name="nama" value="Angga Wahyu">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input disabled type="text" class="form-control" name="nama" value="Angga Wahyu">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-white" style="background-color: #830000 !important;" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection