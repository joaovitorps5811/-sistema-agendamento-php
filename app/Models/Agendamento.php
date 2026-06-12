<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    // Desativa as colunas automáticas created_at e updated_at se você não tiver elas no banco
    public $timestamps = false; 

    // Indica o nome real da tabela no banco
    protected $table = 'agendamentos';

    // LIBERA as colunas para o Laravel aceitar o salvamento:
    protected $fillable = [
        'id_usuario',
        'id_servico',
        'data_agendamento',
        'hora',
        'status'
    ];
}