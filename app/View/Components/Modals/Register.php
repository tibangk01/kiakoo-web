<?php

namespace App\View\Components\Modals;

use App\Models\Gender;
use App\Models\District;
use Illuminate\View\Component;

class Register extends Component
{
    public $districts;
    public $genders;

    public function __construct()
    {
        $this->genders = Gender::pluck('name', 'id');
        $this->districts = District::pluck('name', 'id'); //TODO: select2

    }
    
    public function render()
    {
        return view('components.modals.register');
    }
}
