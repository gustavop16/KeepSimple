<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CepController extends Controller
{

    public function exportDataCep(Request $request){

        $csvFileName = 'data_ceps.csv';
        $handle      = fopen($csvFileName, 'w');
        $header      = ['CEP', 'LOGRADOURO', 'COMPLEMENTO', 'BAIRRO', 'LOCALIDADE', 'UF', 'IBGE', 'GIA', 'DDD', 'SIAFI'];

        fputcsv($handle, $header);
        foreach ($request->ceps as $item) {
            fputcsv($handle, $this->dataCep($item) );
        }
        fclose($handle);
        
        return response()->json(['file' => $csvFileName]);
    }

    public function dataCep($data){
        return [
            isset($data['cep'])         ? utf8_decode($data['cep'])         : null, 
            isset($data['logradouro'])  ? utf8_decode($data['logradouro'])  : '-', 
            isset($data['complemento']) ? utf8_decode($data['complemento']) : '-', 
            isset($data['bairro'])      ? utf8_decode($data['bairro'])      : '-', 
            isset($data['localidade'])  ? utf8_decode($data['localidade'])  : '-', 
            isset($data['uf'])          ? utf8_decode($data['uf'])          : '-', 
            isset($data['ibge'])        ? utf8_decode($data['ibge'])        : '-', 
            isset($data['gia'])         ? utf8_decode($data['gia'])         : '-', 
            isset($data['ddd'])         ? utf8_decode($data['ddd'])         : '-', 
            isset($data['siafi'])       ? utf8_decode($data['siafi'])       : '-'
        ];
    }

}
