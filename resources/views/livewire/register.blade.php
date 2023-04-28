<div>
    <div class="card card-primary">
        @if($currentStep == 1)
            <div class="card-header"><h4>Register 1/4</h4></div>
        @endif
        @if($currentStep == 2)
            <div class="card-header"><h4>Register 2/4</h4></div>
        @endif
        @if($currentStep == 3)
            <div class="card-header"><h4>Register 3/4</h4></div>
        @endif
        @if($currentStep == 4)
            <div class="card-header"><h4>Register 4/4</h4></div>
        @endif
        <div class="card-body">
            <form wire:submit.prevent="register" class="needs-validation" enctype="multipart/form-data" novalidate="#">
                @if($currentStep == 1)
                <div class="step-one">
                    @csrf
                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input id="nama_perusahaan" type="text" class="form-control" name="nama_perusahaan" wire:model="nama_perusahaan">
                        @error('nama_perusahaan')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                @endif
                @if($currentStep == 2)
                <div class="step-two">
                    @csrf
                    <div class="form-group">
                        <label for="nib">Nomor Induk Berusaha</label>
                        <input id="nib" type="number" class="form-control" name="nib" wire:model="nib">
                        @error('nib')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_perusahaan">Alamat Perusahaan</label>
                        <textarea id="alamat_perusahaan" class="form-control" name="alamat_perusahaan" wire:model="alamat_perusahaan"></textarea>
                        @error('alamat_perusahaan')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                @endif
                @if($currentStep == 3)
                <div class="step-three">
                    @csrf
                    <div class="form-group">
                        <label for="telepon_perusahaan">Telepon Perusahaan</label>
                        <input id="telepon_perusahaan" type="number" class="form-control" name="telepon_perusahaan" wire:model="telepon_perusahaan">
                        @error('telepon_perusahaan')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="email_perusahaan">Email Perusahaan</label>
                        <input id="email_perusahaan" type="email" class="form-control" name="email_perusahaan" wire:model="email_perusahaan">
                        @error('email_perusahaan')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                @endif
                @if($currentStep == 4)
                <div class="step-four">
                    @csrf
                    <div class="form-group">
                        <label for="dokumen_pendukung">Dokumen Pendukung</label>
                        <input id="dokumen_pendukung" type="file" class="form-control" name="dokumen_pendukung" wire:model="dokumen_pendukung">
                        @error('dokumen_pendukung')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="terms_and_conditions" class="custom-control-input" id="terms_and_conditions" wire:model="terms_and_conditions">
                        <label class="custom-control-label" for="terms_and_conditions">I agree with the terms and conditions</label>
                        </div>
                        @error('terms_and_conditions')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                @endif
                <div class="form-group">
                    @if($currentStep == 1)
                        <div></div>
                    @endif

                    @if($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                        <button type="button" class="btn btn-secondary" wire:click="decreaseStep()">Back</button>
                    @endif

                    @if($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                        <button type="button" class="btn btn-primary" wire:click="increaseStep()">Next</button>
                    @endif

                    @if($currentStep == 4)
                        <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
