<?php

namespace App\Http;

/**
 * Faz o mapeamento do tipo de manutencao
 */
final class MapeamentoTipoManutencao
{
	//Mapeando tipos de manutencao
	const TIPO_MANUTENCAO = [
		"1" => "Preventiva",
		"2" => "Corretiva",
		"3" => "Urgente",
	];
}