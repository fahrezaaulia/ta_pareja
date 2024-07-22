<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $fillable = [''];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Nama()
    {
        return $this->hasMany(User::class);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class, 'tamu_id');
    }
}
