<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class ActorService
{
    use ConsumesExternalServices;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        //$this->baseUri = config('services.actors.base_uri');
        //$this->secret  = config('services.actors.secret');

        $this->baseUri = 'http://localhost:8080';
        $this->secret  = '20nomalis21';
    }

    public function allActors()
    {
        return $this->performRequest('GET', '/api/actors');
    }

    public function createActor($data)
    {
        return $this->performRequest('POST', '/api/actors', $data);
    }

    public function readOneActor($actor)
    {
        return $this->performRequest('GET', "/api/actor/{$actor}");
    }

    public function updateActor($data, $actor)
    {
        return $this->performRequest('PUT', "/api/actors/{$actor}", $data);
    }

    public function deleteActor($actor)
    {
        return $this->performRequest('DELETE', "/actors/{$actor}");
    }
}
