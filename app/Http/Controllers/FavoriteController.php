<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        $variations = $user->favorite(Variation::class);

        $ids = $variations->pluck('id');

        $variations = Variation::WhereIn('id', $ids)
            ->with([
                'media',
                'discount'
            ])->paginate(config('kiakoo.pagination'));

        return view('favorites.index', [
            'variations' => $variations,
        ]);
    }
}
