<?php

namespace App\Http\Livewire\Comment\Form;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Variation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Nagy\LaravelRating\Models\Rating;

class Edit extends Component
{
    protected $rules = [
        'star' => ['required', 'numeric'],
        'comment' => ['required', 'string', 'min:2'],
    ];

    public $star;
    public $comment;
    public $rating;
    public $variation;
    public $commentModel;

    public function mount($commentId, $variationId, $ratingId)
    {
        $this->variation = Variation::findOrFail($variationId);
        $this->commentModel = Comment::findOrFail($commentId);
        $this->rating = Rating::findOrFail($ratingId);

        $this->star = (int) $this->rating->value;
        $this->comment = $this->commentModel->comment;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.comment.form.edit');
    }

    public function edit()
    {
        $this->validate();

        DB::beginTransaction();

        try {

            $commentId = $this->commentModel->id;

            $comment = Comment::where('id', $commentId)->first();
            $comment->delete();

            $rating = Rating::where(function ($q) use ($commentId) {
                $q->where('type', 'like')
                    ->where('rateable_id', $commentId);
            })->pluck('id');

            Rating::destroy($rating);

            $user = Auth::user();

            $this->variation->commentAsUser(Auth::user(), $this->comment);

            $user->rate($this->variation, $this->star);

            DB::commit();

            $this->emit('commentUpdated');
        } catch (\Throwable $e) {

            Log::emergency($e->getMessage());

            DB::rollBack();
        }
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
