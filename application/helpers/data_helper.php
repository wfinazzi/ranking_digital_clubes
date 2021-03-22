<?php    
    
    function getDataAtual()
	{
		date_default_timezone_set('America/Sao_Paulo');
		return date("Y-m-d h:m:s");
	}

	function mySQLtoDateBR($date_from_db)
	{
		$timestamp = strtotime($date_from_db);
		return date('d/m/Y', $timestamp);
	}

    function Intervalo_De_Anos_Inicial_E_Final($ano_inicial, $ano_final)
    {
        $anos = array();
        for ($i = $ano_inicial; $i <= $ano_final; $i++)
            $anos[$i] = $i;
        return $anos;
    }
    
    function Meses_Do_Ano()
    {
        $meses = array();
        for ($i = 1; $i < 13; $i++)
        {
            $mes = Preenche_Texto($i, 2, '0', STR_PAD_LEFT);
            $meses[$mes] = Nome_Do_Mes($mes);
        }
        return $meses;
    }

    function Preenche_Texto($texto, $tamanho, $preenchimento = ' ', $direcao = STR_PAD_RIGHT)
    {
        $opcao = array(
          'left' => STR_PAD_LEFT,
          STR_PAD_LEFT => STR_PAD_LEFT,
          'right' => STR_PAD_RIGHT,
          STR_PAD_RIGHT => STR_PAD_RIGHT,
          'both' => STR_PAD_BOTH,
          STR_PAD_BOTH => STR_PAD_BOTH
        );
        return str_pad($texto, $tamanho, $preenchimento, $opcao[$direcao]);
    }

    function Nome_Do_Mes($mes)
    {
        switch ($mes)
        {
            case '01': return 'Janeiro';
            case '02': return 'Fevereiro';
            case '03': return 'Março';
            case '04': return 'Abril';
            case '05': return 'Maio';
            case '06': return 'Junho';
            case '07': return 'Julho';
            case '08': return 'Agosto';
            case '09': return 'Setembro';
            case '10': return 'Outubro';
            case '11': return 'Novembro';
            case '12': return 'Dezembro';
        }
    }