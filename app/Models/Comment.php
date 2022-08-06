<?php

namespace App\Models;

use Nagy\LaravelRating\Traits\Like\Likeable;
use BeyondCode\Comments\Comment as CommentsComment;

class Comment extends CommentsComment
{use Likeable;}
