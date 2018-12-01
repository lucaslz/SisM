<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registro;
use App\Equipamento;
use App\Http\MapeamentoTipoManutencao;
use Validator;

class ManutencaoController extends Controller
{
	/**
	 * Chama a view de area geral
	 */
    public function areaGeral()
    {
		$dados['manutencoes'] = Registro::sltRelatorioManutencao();

        array_walk($dados['manutencoes'], function(&$v, $k){
            $v->tipo = MapeamentoTipoManutencao::TIPO_MANUTENCAO[$v->tipo];
            return $v;
        });
        
    	return view('home', $dados);
    }

    /**
     * Chama a view de inclusaode manutencao
     */
    public function incluir()
    {	
    	//Tratando dados do select do equipamento
    	$dados['equipamento'] = Equipamento::all()->toArray();
    	array_walk($dados['equipamento'], function(&$v, $k) {
    		unset($v['created_at']);
    		unset($v['updated_at']);
    		return $v;
    	});

    	//Pegando dados para o select de tipo de manitencao
    	$dados['tipoManutencao'] = MapeamentoTipoManutencao::TIPO_MANUTENCAO;

    	//Chamando view de inclusao de manutencao
    	return view('incluir_manutencao', $dados);
    }

    /**
     * Metodo para incluir e validar novas manutencoes
     */
    public function incluirValidar(Request $request)
    {
        $validator = Validator::make($request->except('_token'), [
            'equipamento_id' => 'required|int|not_in:0',
            'tipo' => 'required|not_in:0',
            'datalimite' => 'required',
            'descricao' => 'required|max:255|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('incluirManutencao')
                ->withErrors($validator)
                ->withInput();
        }

        Registro::create($request->except('_token'));
    	
        return redirect()->route('geral')->with('success', "Manutenção cadastrado com sucesso !");
    }
}
