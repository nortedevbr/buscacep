<?php

use nortedevbr\BuscaCep;

require dirname(__DIR__) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$buscaCep = new BuscaCep();

try {
    $resposta = $buscaCep->porCep(67100090);
} catch (SoapFault $e) {
    dd($e->getMessage());
}

dd($resposta->getEndereco());