<?php

namespace App\View\Components\Modals\Address;

use App\Models\District;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $phoneNumber;
    public $districts;

    public function __construct()
    {
        $this->phoneNumber = Auth::user()->customer->phone_number;
        $this->districts = District::pluck('name', 'id');
    }

    public function render()
    {
        return view('components.modals.address.create');
    }
}
