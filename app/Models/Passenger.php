<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable = ['CPF', 'NOME', 'RG', 'DATANASC', 'DDD1', 'TELEFONE1', 'DDD2', 'TELEFONE2', 'PCRIANCA', 'NOMECRIANCA', 'CPFCRIANCA', 'RGCRIANCA', 'VAGA'];
    protected $table = 'passageiro';
    public $timestamps = false;
}
