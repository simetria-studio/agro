<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pescador extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'pescador';
    protected $fillable = [
        'name',
        'email',
        'password',
        'telefone',
        'cpf',
        'fazenda',
        'cep',
        'cidade',
        'estado',
        'pais',
        'bairro',
        'rua',
        'numero',
        'complemento',
        'latitude',
        'longitude',
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'pescador_id');
    }
}
