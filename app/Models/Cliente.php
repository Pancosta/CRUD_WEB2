<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'sexo', 'endereco', 'telefone', 'email', 'user_id'];


    protected $enums = [
        'sexo' => ['Masculino', 'Feminino', 'Outro'],
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
