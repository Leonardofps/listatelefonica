<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['cnpj', 'razao_social', 'telefone1', 'celular'];
}
