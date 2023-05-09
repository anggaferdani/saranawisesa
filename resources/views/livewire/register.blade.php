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
                    <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ $user_id }}" wire:model="user_id">
                    <div class="form-group">
                        <label for="lampiran0001">Lampiran 0001</label>
                        <input id="lampiran0001" type="text" class="form-control" name="lampiran0001" wire:model="lampiran0001">
                        @error('lampiran0001')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="lampiran0002">Lampiran 0002</label>
                        <input id="lampiran0002" type="text" class="form-control" name="lampiran0002" wire:model="lampiran0002">
                        @error('lampiran0002')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                @endif
                @if($currentStep == 2)
                <div class="step-two">
                    @csrf
                    <div class="form-group">
                        <label for="lampiran0003">Lampiran 0003</label>
                        <input id="lampiran0003" type="text" class="form-control" name="lampiran0003" wire:model="lampiran0003">
                        @error('lampiran0003')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="lampiran0004">Lampiran 0004</label>
                        <input id="lampiran0004" type="text" class="form-control" name="lampiran0004" wire:model="lampiran0004">
                        @error('lampiran0004')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                @endif
                @if($currentStep == 3)
                <div class="step-three">
                    @csrf
                    <div class="form-group">
                        <label for="lampiran0005">Lampiran 0005</label>
                        <input id="lampiran0005" type="text" class="form-control" name="lampiran0005" wire:model="lampiran0005">
                        @error('lampiran0005')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="lampiran0006">Lampiran 0006</label>
                        <input id="lampiran0006" type="text" class="form-control" name="lampiran0006" wire:model="lampiran0006">
                        @error('lampiran0006')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                @endif
                @if($currentStep == 4)
                <div class="step-four">
                    @csrf
                    <div class="form-group">
                        <label for="lampiran0007">Lampiran 0007</label>
                        <input id="lampiran0007" type="text" class="form-control" name="lampiran0007" wire:model="lampiran0007">
                        @error('lampiran0007')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="lampiran0008">Lampiran 0008</label>
                        <input id="lampiran0008" type="file" class="form-control" name="lampiran0008" wire:model="lampiran0008">
                        @error('lampiran0008')<div class="text-danger">{{ $message }}</div>@enderror
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
