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
        $this->baseUri = config('services.actors.base_uri');
        dd($this->baseUri);
        $this->secret  = config('services.actors.secret');
    }

    public function allActors()
    {
        return $this->performRequest('GET', '/actors');
    }

    public function createActor($data)
    {
        return $this->performRequest('POST', '/actors', $data);
    }

    public function readOneActor($actor)
    {
        return $this->performRequest('GET', "/actors/{$actor}");
    }

    public function updateActor($data, $actor)
    {
        return $this->performRequest('PUT', "/authors/{$actor}", $data);
    }

    public function deleteActor($actor)
    {
        return $this->performRequest('DELETE', "/authors/{$actor}");
    }
}
