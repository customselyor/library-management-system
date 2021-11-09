<?php

namespace App\Http\Livewire\Admin;

use App\Models\UserProfile;
use Livewire\Component;

class QrcodeComponent extends Component
{
    public $qrCode = null, $sannerQrCode = [], $user = null, $userData = 123;

    public function render()
    {
        return view('livewire.admin.qrcode-component')->layout('layouts.master');
    }

    public function QrcodeCheck($qrCode = null)
    {
        $this->userData="9899876431245789";
        $user_or_book = $this->checkIfUserOrBook($qrCode);

        if ($user_or_book == 'user') {
            $user_profile = UserProfile::where('qr_code', $qrCode)->with('user')->first();
            
        }

        //    $this->qrCode=$qrCode;
        // $this->user = UserProfile::where('qr_code', $qrCode)->with('user')->first();
        // dd($this->user);
        //    dd($this->qrCode);
        array_push($this->sannerQrCode, $qrCode);
        $this->sannerQrCode = array_unique($this->sannerQrCode);

    }
    protected function checkIfUserOrBook($qrCode)
    {
        $firstCharacter = substr($qrCode, 0, 1);

        if ($firstCharacter == 'E' || $firstCharacter == 'R') {
            return 'user';
        }

        return 'book';
    }
}
