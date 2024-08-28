<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewComment extends Model
{
    protected $table = 'review_comments';
    protected $fillable = ['comment'];
}
