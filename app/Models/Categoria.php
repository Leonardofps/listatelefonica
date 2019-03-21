<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nome'];


    public function pessoas (){
        return $this->belongsToMany(Pessoa::class);
    }
}
