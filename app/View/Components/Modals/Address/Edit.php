<?php

namespace App\View\Components\Modals\Address;

use App\Models\User;
use App\Models\District;
use Illuminate\View\Component;

class Edit extends Component
{
    public $address;
    public $phoneNumber;
    public $districts;
    public $customerId;

    public function __construct($userId)
    {
        $user = User::with(['customer.addresses.district'])->findOrFail($userId);

        $this->districts = District::pluck('name', 'id');

        $this->address = $user->customer->addresses->last();
        $this->phoneNumber =  $user->customer->phone_number;

        $this->customerId = $user->customer->id;
    }

    public function render()
    {
        return view('components.modals.address.edit');
    }
}
