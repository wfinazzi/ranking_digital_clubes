<?php


    function somenteNumeros(string $string)
	  {
		  return preg_replace("/[^0-9]/", "", $string); 
    }

	

