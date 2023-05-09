<?php

namespace App\Http\Livewire;

use App\Models\Perusahaan;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;
    public $user_id;
    public $lampiran0001;
    public $lampiran0002;
    public $lampiran0003;
    public $lampiran0004;
    public $lampiran0005;
    public $lampiran0006;
    public $lampiran0007;
    public $lampiran0008;
    public $terms_and_conditions;

    public $totalSteps = 4;
    public $currentStep = 1;

    public function render()
    {
        return view('livewire.register');
    }

    public function mount(){
        $this->currentStep = 1;
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function increaseStep(){
        $this->resetErrorBag();
        // $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function validateData(){
        if($this->currentStep == 1){
            $this->validate([
                'user_id' => 'required',
                'lampiran0001' => 'required|string',
                'lampiran0002' => 'required|string',
            ]);
        }elseif($this->currentStep == 2){
            $this->validate([
                'lampiran0003' => 'required|string',
                'lampiran0004' => 'required|string',
            ]);
        }elseif($this->currentStep == 3){
            $this->validate([
                'lampiran0005' => 'required|string',
                'lampiran0006' => 'required|string',
            ]);
        }
    }
    
    public function register(){
        $this->resetErrorBag();
        if($this->currentStep == 4){
            $this->validate([
                'lampiran0007' => 'required|string',
                'lampiran0008' => 'required|mimes:doc,docx,pdf|max:1024',
                'terms_and_conditions' => 'accepted',
            ]);
        }

        $nama_lampiran0008 = 'dok'.$this->lampiran0008->getClientOriginalName();
        $upload_dokumen = $this->lampiran0008->storeAs('lampiran0008', $nama_lampiran0008);

        if($upload_dokumen){
            $perusahaan = array(
                'user_id' => $this->user_id,
                'lampiran0001' => $this->lampiran0001,
                'lampiran0002' => $this->lampiran0002,
                'lampiran0003' => $this->lampiran0003,
                'lampiran0004' => $this->lampiran0004,
                'lampiran0005' => $this->lampiran0005,
                'lampiran0006' => $this->lampiran0006,
                'lampiran0007' => $this->lampiran0007,
                'lampiran0008' => $nama_lampiran0008,
            );

            Perusahaan::create($perusahaan);
            $this->reset();
            // $this->currentStep = 1;
            return redirect()->route('eproc.login');
        }
    }
}
