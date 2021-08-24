<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cpf', 'email', 'phone', 'cidade_id'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
