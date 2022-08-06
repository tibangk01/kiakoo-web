<?php

namespace App\Http\Livewire\Comment;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Like extends Component
{
    protected $listeners = [
        'like' => '$refresh',
        'dislikeAdded' => 'fresh',
    ];

    public $count;
    public $comment;
    public $commentId;

    public function mount($commentId)
    {
        $this->commentId = $commentId;

        $this->comment = Comment::with(['likes'])->where('id', $commentId)->first();

        $this->count = $this->comment->likes->filter(function ($like) {
            return $like->value == 1 ? $like : null;
        })->filter()
            ->count();
    }

    public function fresh()
    {
        $this->mount($this->commentId);
        $this->render();
    }

    public function render()
    {
        return view('livewire.comment.like');
    }

    public function like()
    {
        $user = Auth::user();

        if (session('not_auth'))
            session()->forget('not_auth');

        if ($user) {

            $user->like($this->comment);

            $this->comment = Comment::with('likes')->where('id', $this->commentId)->first();

            $this->count = $this->comment->likes->filter(function ($like) {
                return $like->value == 1 ? $like : null;
            })->filter()->count();

        } else {
            session()->flash('not_auth', true);
        }

        $this->emit('like');
        $this->emit('likeAdded');
    }
}
