<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class QrcodeComponent extends Component
{
    public $qrCode = null, $sannerQrCode = [];

    public function render()
    {
        return view('livewire.admin.qrcode-component')->layout('layouts.master');
    }

    public function QrcodeCheck($qrCode = null)
    {
//        $this->qrCode=$qrCode;
        array_push($this->sannerQrCode, $qrCode);
        $this->sannerQrCode = array_unique($this->sannerQrCode);

    }
}
