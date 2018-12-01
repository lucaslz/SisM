<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rota de controlede de Manutencao
Route::get('/', 'ManutencaoController@areaGeral')->name('geral');
Route::get('/manutencao/incluir', 'ManutencaoController@incluir')->name('incluirManutencao');
Route::post('/manutencao/incluirValidar', 'ManutencaoController@incluirValidar')->name('incluirManutencaoValidar');

//Rota de controle de equipamento
Route::get('/equipamento/Incluir', 'EquipamentoController@incluir')->name('incluirEquipamento');
Route::post('/equipamento/incluirValidar', 'EquipamentoController@incluirValidar')->name('incluirEquipamentoValidar');
Route::get('/equipamento/relatorio', 'EquipamentoController@relatorioEquipamentosCadastrados')->name('relatorioEquipamentosCadastrados');
Route::get('/equipamento/relatorio/produto', 'EquipamentoController@relatorioEquipamentosProduto')->name('relatorioEquipamentosProduto');
Route::post('/equipamento/relatorio/produto/filtro', 'EquipamentoController@relatorioEquipamentosProdutoFiltro')->name('relatorioEquipamentosProdutoFiltro');