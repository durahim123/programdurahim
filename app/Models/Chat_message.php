<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat_categorie;

class Chat_message extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'user_id', 'message', 'sender_role', 'is_bot'];

    public function category()
    {
        return $this->belongsTo(Chat_categorie::class);
    }
}
