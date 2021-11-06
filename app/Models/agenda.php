<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';

    protected $fillable = [
        'descrição',
        'data',
        'observações',
        'usuario'
    ];
    public function usuario() {
        return $this->belongsTo('App\Models\User', 'usuario');
    }
}
