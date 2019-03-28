<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = ['nome', 'cargo', 'emails','telefone', 'celular', 'nome_secretaria'];

    public function search($keySearch){
    
    return $this->where('nome', 'LIKE', "%{$keySearch}%")->paginate();
    }

    public function categorias (){
        return $this->belongsToMany(Categoria::class, 'categoria_pessoa');
    }

}