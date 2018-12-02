<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Equipamento;
use Illuminate\Support\Facades\DB;
use App\Http\MapeamentoTipoManutencao;

class EquipamentoController extends Controller
{
    /**
     * Chama a view de inclusao de equipamento
     */
    public function incluir()
    {
    	return view('incluir_equipamento');
    }

    /**
     * Metodo que valida e inclui os dados do equipamento
     */
    public function incluirValidar(Request $request)
    {
        
        $validator = Validator::make($request->except('_token'), [
            'nome' => 'required|max:255|min:2'
        ]);

        if ($validator->fails()) {
            return redirect()
            			->route('incluirEquipamento')
                        ->withErrors($validator)
                        ->withInput();
        }

        $return = Equipamento::create($request->except('_token'));
    	return redirect()
            ->route('relatorioEquipamentosCadastrados')
            ->with('success', "Produto Inserido com Sucesso !!!");
    }

    /**
     * Relatorio de equipamentos cadastrados
     */
    public function relatorioEquipamentosCadastrados()
    {
        //Orderando e tratando dados do equipamento
        $dados['equipamentos'] = DB::table('equipamentos')->orderBy('nome')->get()->toArray();
        array_walk($dados['equipamentos'], function(&$v, $k){
            unset($v->created_at);
            unset($v->updated_at);
            return $v;
        });

        return view('equipamentos_cadastrados', $dados);
    }

    /**
     * Chama a tela de relatorio de equipamentos por produto
     */
    public function relatorioEquipamentosProduto()
    {   
        //Orderando e tratando dados do equipamento
        $dados['equipamentos'] = DB::table('equipamentos')->orderBy('nome')->get()->toArray();
        array_walk($dados['equipamentos'], function(&$v, $k){
            unset($v->created_at);
            unset($v->updated_at);

            return $v;
        });

        $dados['manutencoes'] = null;
        $dados['equipamento_id'] = 0;
        return view('pesquisa_equipamento_produto', $dados);
    }

    /**
     * Filtro do relatorio
     */
    public function relatorioEquipamentosProdutoFiltro(Request $request)
    {
        $id = $request->except('_token')['equipamento_id'];
        $dados['equipamento_id'] = $id;
        $dados['equipamentos'] = DB::table('equipamentos')->orderBy('nome')->get()->toArray();
        array_walk($dados['equipamentos'], function(&$v, $k){
            unset($v->created_at);
            unset($v->updated_at);
            return $v;
        });
        
        $dados['manutencoes'] = Equipamento::sltEquipamentosPorProduto($id);
        
        array_walk($dados['manutencoes'], function(&$v, $k){
            $v->tipo = MapeamentoTipoManutencao::TIPO_MANUTENCAO[$v->tipo];
        });
        
        return view('pesquisa_equipamento_produto', $dados);
    }
}
