<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psychologist extends Model
{
    use HasFactory;

    protected $fillable = ['specialization', 'license_number', 'contact_info', 'usuario_id'];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
