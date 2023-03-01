<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    public $fillable = ['title', 'body', 'author_id'];
    public function author() {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function searchableAs()
    {
        return 'posts_index';
    }
}
