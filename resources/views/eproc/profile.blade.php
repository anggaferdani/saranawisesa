<div class="row p-3">
  <div class="col-md-2 text-center">
    <img src="{{ asset('eproc/profile-picture/'.$perusahaan["profile_picture"]) }}" class="rounded-circle img-fluid" style="border: 2px solid #830000" alt="">
    <button class="btn btn-primary badge mt-2" data-toggle="modal" data-target="#edit">Edit Profile</button>
  </div>
  <div class="col-md-10">
    <h4 class="fw-bold mb-3" style="color: #830000;">{{ $perusahaan->nama_badan_usaha }}</h4>
    <div class="d-flex mb-3">
      <i class="fas fa-envelope" style="font-size: 20px; margin-right: 15px; color: #830000;"></i>
      <div class="mb-0" style="color: #830000;">{{ $perusahaan->email_badan_usaha }}</div>
    </div>
    <div class="d-flex mb-3">
      <i class="fas fa-map-marker-alt" style="font-size: 20px; margin-right: 15px; color: #830000;"></i>
      <div class="mb-0" style="color: #830000;">{{ $perusahaan->alamat_badan_usaha }}</div>
    </div>
    <div class="d-flex">
      <i class="fas fa-th-large" style="font-size: 20px; margin-right: 15px; color: #830000;"></i>
      <div class="mb-0 lh-sm" style="color: #830000;">{{ $perusahaan->deskripsi }}</div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('eproc.perusahaan.profile-perusahaan.update', ['id' => Crypt::encrypt(Auth::id())]) }}) }}" class="needs-validation" enctype="multipart/form-data" novalidate="">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label>Profile Picture</label>
            <input type="file" class="form-control" name="profile_picture" value="{{ $perusahaan->profile_picture }}" onchange="file(event)">
            <div><img src="{{ asset('eproc/profile-picture/'.$perusahaan["profile_picture"]) }}" class="image" alt="" width="200px"></div>
          </div>
          <div class="form-group">
            <label>Nama Badan Usaha</label>
            <input type="text" class="form-control" name="nama_badan_usaha" value="{{ $perusahaan->nama_badan_usaha }}">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi">{{ $perusahaan->deskripsi }}</textarea>
          </div>
          <div class="form-group">
            <label>Email Badan Usaha</label>
            <input type="email" class="form-control" name="email_badan_usaha" value="{{ $perusahaan->email_badan_usaha }}">
          </div>
          <div class="form-group">
            <label>Alamat Badan Usaha</label>
            <input type="text" class="form-control" name="alamat_badan_usaha" value="{{ $perusahaan->alamat_badan_usaha }}">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>