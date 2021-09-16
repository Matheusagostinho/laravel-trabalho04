<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['model', 'year', 'daily', 'feature', 'average', "owner_id", 'brand_id'];

    // public function endereco(){
    //     return $this->hasOne(Endereco::class)
    // };

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
