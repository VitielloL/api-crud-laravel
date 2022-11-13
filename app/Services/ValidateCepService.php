<?php

namespace App\Services;

use GuzzleHttp\Client;

class ValidateCepService
{
    public function validateCep(string $cep) {
        $url = "http://viacep.com.br/ws/" . $cep . "/json/";
        $client = new Client();
        $response = $client->request('GET', $url);
        $body = json_decode($response->getBody()->getContents(), true);
        if (isset($body["erro"])) {
            return false;
        }
        return true;
    }
}