<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersQuestions extends Model {
    use HasFactory;
    protected $table = 'users_questions';
    protected $primaryKey = "users_questions_id";

    protected $fillable = [
        'users_customers_id',
        'question',
        'created_at',
    ];
    public function user() {
        return $this->belongsTo(User::class, 'users_customers_id');
    }

    public function replies() {
        return $this->hasMany(QuestionReplies::class, 'users_questions_id');
    }

    public function replyCount() {
        return $this->replies()->count();
    }

    public function likes() {
        return $this->hasMany(QuestionLikes::class, 'users_questions_id');
    }

    public function likesCount() {
        return $this->likes()->where('status', 'Liked')->count();
    }
}
