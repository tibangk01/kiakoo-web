<?php

namespace App\View\Components\Variation\Comment;

use App\Models\Variation;
use Illuminate\View\Component;
use BeyondCode\Comments\Comment;
use Illuminate\Support\Facades\Auth;

class Add extends Component
{
    public $variation;
    public $userHasVariationComment;

    public function __construct($variationId)
    {
        $this->variation = Variation::findOrFail($variationId);

        $this->userHasVariationComment = Comment::where(function ($q) use ($variationId) {
            $q->where('user_id', Auth::id())
                ->where('commentable_id', $variationId);
        })->first() ? true : false;
    }

    public function render()
    {
        return view('components.variation.comment.add');
    }
}
