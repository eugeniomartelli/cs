<?php

function formata_reais($valor)
{
    $str = "R$ " . number_format($valor, 2, ",", ".");
    
    return $str;
}

