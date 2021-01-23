<?php

namespace App\Services;
use App\Traits\ConsumesExternalServices;
use Illuminate\Support\Facades\Config;


class ActorService
{
    use ConsumesExternalServices;

    public $baseUri;
    public $secret;
    public $token;

    public function __construct()
    {
        $this->baseUri = Config::get('services.actors.base_uri');
        $this->secret  = Config::get('services.actors.secret')[0]->token;
       $token = $this->auth('POST', '/oauth/token');
       $this->token=json_decode($token,true)['access_token'];
    }

    public function allActors()
    {
        //dd(json_decode($token,true)['access_token']);
        return   $this->performRequest('GET', '/api/actors');
    }

    public function createActor($data)
    {
        return $this->performRequest('POST', '/api/actor', $data);
    }

    public function readOneActor($actor)
    {
        return $this->performRequest('GET', "/api/actor/{$actor}");
    }

    public function updateActor($data, $actor)
    {
        return $this->performRequest('PUT', "/api/actor/{$actor}", $data);
    }

    public function deleteActor($actor)
    {
        return $this->performRequest('DELETE', "/api/actor/{$actor}");
    }
}
