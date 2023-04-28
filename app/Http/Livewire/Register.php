<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Perusahaan;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;
    public $nama_panjang;
    public $email;
    public $password;
    public $nama_perusahaan;
    public $nib;
    public $dokumen_pendukung;
    public $telepon_perusahaan;
    public $email_perusahaan;
    public $alamat_perusahaan;
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
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function validateData(){
        if($this->currentStep == 1){
            $this->validate([
                'nama_panjang' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
            ]);
        }elseif($this->currentStep == 2){
            $this->validate([
                'nama_perusahaan' => 'required|string',
                'nib' => 'required',
                'alamat_perusahaan' => 'required|string',
            ]);
        }elseif($this->currentStep == 3){
            $this->validate([
                'telepon_perusahaan' => 'required',
                'email_perusahaan' => 'required|email|unique:perusahaans,email_perusahaan',
            ]);
        }
    }
    
    public function register(){
        $this->resetErrorBag();
        if($this->currentStep == 4){
            $this->validate([
                'dokumen_pendukung' => 'required|mimes:doc,docx,pdf|max:1024',
                'terms_and_conditions' => 'accepted',
            ]);
        }

        $nama_dokumen_pendukung = 'dok'.$this->dokumen_pendukung->getClientOriginalName();
        $upload_dokumen = $this->dokumen_pendukung->storeAs('dokumen_pendukung', $nama_dokumen_pendukung);

        if($upload_dokumen){
            $input_array_users = array(
                'nama_panjang' => $this->nama_panjang,
                'email' => $this->email,
                'password' => $this->password,
            );
            
            $user = User::create($input_array_users);

            $input_array_perusahaans = array(
                'user_id' => $user->id,
                'nama_perusahaan' => $this->nama_perusahaan,
                'nib' => $this->nib,
                'dokumen_pendukung' => $nama_dokumen_pendukung,
                'telepon_perusahaan' => $this->telepon_perusahaan,
                'email_perusahaan' => $this->email_perusahaan,
                'alamat_perusahaan' => $this->alamat_perusahaan,
            );

            Perusahaan::create($input_array_perusahaans);
            $this->reset();
            $this->currentStep = 1;
        }
    }
}
