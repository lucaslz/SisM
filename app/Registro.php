<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Registro extends Model
{
    protected $fillable = ['equipamento_id', 'descricao', 'datalimite', 'tipo'];
    protected $guarded = ['id', 'equipamento_id', 'created_at', 'update_at'];

    /**
     * Busca todas as manutencoes cadastradas no sistema
     */
    public static function sltRelatorioManutencao()
    {
    	$query = DB::table('registros')
    				->join('equipamentos', 'equipamentos.id', '=', 'registros.equipamento_id')
    				->select(
    					'equipamentos.nome as nomeEquipamento',
    					'registros.descricao',
    					'registros.datalimite',
    					'registros.tipo'
    				)
    				->get();
    	return $query->toArray();
    }
}
