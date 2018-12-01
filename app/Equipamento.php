<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Equipamento extends Model
{
    protected $fillable = ['nome'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    /**
     * Buscando produtos por um id produto
     */
    public static function sltEquipamentosPorProduto($id)
    {
    	$query = DB::table('equipamentos')
    				->join('registros', 'registros.equipamento_id', '=', 'equipamentos.id')
    				->select(
    					'equipamentos.nome as nomeEquipamento',
    					'registros.descricao',
    					'registros.datalimite',
    					'registros.tipo'
    				)
    				->where('registros.equipamento_id', '=', $id)
    				->get();
    	return $query->toArray();
    }
}
