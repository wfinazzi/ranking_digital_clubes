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