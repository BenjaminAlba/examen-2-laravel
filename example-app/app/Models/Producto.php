<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'cantidad',
        'precio',
        'id_usuario'
    ];

    protected $dates = ['deleted_at'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
