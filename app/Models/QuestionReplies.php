<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionReplies extends Model
{
    use HasFactory;

    protected $table = 'question_replies';
    protected $primaryKey = "question_replies_id";

    protected $fillable = [
        'users_customers_id',
        'users_questions_id',
        'reply',
        'created_at',
    ];
    public function user() {
        return $this->belongsTo(User::class, 'users_customers_id');
    }

    public function likes() {
        return $this->hasMany(ReplyLikes::class, 'question_replies_id');
    }

    public function likesCount() {
        return $this->likes()->where('status', 'Liked')->count();
    }
}
