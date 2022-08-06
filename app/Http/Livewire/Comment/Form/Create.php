<?php

namespace App\Http\Livewire\Comment\Form;

use Livewire\Component;
use App\Models\Variation;
use BeyondCode\Comments\Comment;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    protected $listeners = [
        'addCommentRefresh' => '$refresh',
        'commentUpdated' => 'fresh',
    ];

    protected $rules = [
        'variationId' => ['required', 'numeric'],
        'star' => ['required', 'numeric'],
        'comment' => ['required', 'string'],
    ];

    public $star = 1;
    public $comment;
    public $variationId;
    public $userHasVariationComment;

    public function mount($variationId)
    {
        $this->variationId = $variationId;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.comment.form.create');
    }

    public function store()
    {
        if (session('not_auth'))
            session()->forget('not_auth');

        if (is_null(Auth::user())) {

            session()->flash('not_auth', true);
            $this->emit('addCommentRefresh');
        } else {

            $this->validate();

            $user = Auth::user();

            //check if user already have comment
            $variationId = $this->variationId;
            $variation = Variation::findOrFail($this->variationId);

            $userHasVariationComment = Comment::where(function ($q) use ($variationId) {
                $q->where('user_id', Auth::id())
                    ->where('commentable_id', $variationId);
            })->first() ? true : false;

            if ($userHasVariationComment) {
                session()->flash('user_has_variation_comment', true);
            } else {

                $variation->commentAsUser(Auth::user(), $this->comment);

                $user->rate($variation, $this->star);

                session()->flash('comment_added', true);
            }

            $this->comment = '';
            $this->star = 1;
        }
    }

    public function fresh()
    {
        session()->flash('commentUpdated', true);
        $this->render();
    }

    public function oneStar()
    {
        $this->star = 1;
    }

    public function twoStars()
    {
        $this->star = 2;
    }

    public function threeStars()
    {
        $this->star = 3;
    }

    public function fourStars()
    {
        $this->star = 4;
    }

    public function fiveStars()
    {
        $this->star = 5;
    }
}
