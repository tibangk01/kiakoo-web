<?php

namespace App\View\Components;

use App\Models\Discount;
use Illuminate\View\Component;

class DayOffer extends Component
{
    public $discounts;

    public function __construct()
    {
        $this->discounts = Discount::where(function($q){
            $q->where('is_daily_offer', true)
            ->where('expires_at', '>=', now())
            ->where('quantity', '>', 0);
        })->with('discountable.media')
            ->get();

        if ($this->discounts->count() != 0 && $this->discounts->count() < 6) {

            while ($this->discounts->count() < 6) {
                $this->discounts->push($this->discounts->random());
            }
        }
    }

    public function render()
    {
        return view('components.day-offer');
    }
}
