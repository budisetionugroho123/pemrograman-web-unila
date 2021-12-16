<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joins extends Model
{
    use HasFactory;
    protected $table = 'joins';
    protected $guarded = ['id'];
    public function getUsers()
    {
        return $this->belongsTo(User::class);
    }
}
