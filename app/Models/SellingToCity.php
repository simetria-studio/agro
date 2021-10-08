<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellingToCity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cidade_id',
        'produto_id',
        'status',
     ];

     public function products()
     {
        return $this->belongsTo(Produto::class, 'produto_id');
     }
}
