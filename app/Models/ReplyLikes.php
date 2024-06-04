<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyLikes extends Model
{
    use HasFactory;
    protected $table = 'question_reply_likes';
    protected $primaryKey = "question_reply_likes_id";

    protected $fillable = [
        'users_customers_id', 
        'question_replies_id',
        'status',
        'created_at',
    ];

    public function reply() {
        return $this->belongsTo(QuestionReplies::class, 'question_replies_id');
    }
}
