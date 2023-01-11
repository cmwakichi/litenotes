<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'text'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
    public function notes()
    {
        return $this->hasMany(Note::class, 'user_id', 'id');
    }
}
