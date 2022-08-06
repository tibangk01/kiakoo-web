<?php

namespace App\View\Components\Variation\Comment;

use App\Models\Variation;
use Illuminate\View\Component;

class All extends Component
{
    public $variation;
    public $comments;
    public $datas;

    public function __construct($variationId)
    {
        $this->variation = Variation::findOrFail($variationId);

        $this->comments = $this->variation->comments->load('commentator.customer.human')->reject(function($comment){
            return $comment->is_approved == false;
        });

        $this->datas =  $this->comments->map(function($comment){

            return [
                'comment' => $comment->comment,
                'user_id' => $comment->user_id,
                'updated_at' => $comment->updated_at,
                'first_name' =>$comment->commentator->customer->human->first_name,
            ];
        });
    }

    public function render()
    {
        return view('components.variation.comment.all');
    }
}
