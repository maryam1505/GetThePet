<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionLikes extends Model {
    use HasFactory;
    protected $table = 'question_likes';
    protected $primaryKey = "question_likes_id";

    protected $fillable = [
        'users_customers_id', 
        'users_questions_id',
        'status',
        'created_at',
    ];

    public function question() {
        return $this->belongsTo(UsersQuestions::class, 'users_questions_id');
    }
}
