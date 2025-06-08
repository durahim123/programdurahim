<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chat_message;

class Chat_categorie extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function messages()
    {
        return $this->hasMany(Chat_message::class);
    }
}
