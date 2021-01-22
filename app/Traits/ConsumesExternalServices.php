<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalServices
{
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {

     // $formParams=["grant_type"=>"client_credentials", "client_id"=>"1" ,"client_secret"=>$this->secret];
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);


        if (isset($this->token)) {
            $headers['Authorization'] = $this->token;
        }
        $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);
        return $response->getBody()->getContents();
    }

    public function auth($method, $requestUrl, $formParams = [], $headers = [])
    {

      $formParams=["grant_type"=>"client_credentials", "client_id"=>"1" ,"client_secret"=>$this->secret];
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);


        if (isset($this->secret)) {
            //$headers['Authorization'] = $this->secret;
        }
        $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);
        return $response->getBody()->getContents();
    }
}
