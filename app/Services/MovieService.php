<?php

namespace App\Services;
use App\Traits\ConsumesExternalServices;
use Illuminate\Support\Facades\Config;


class MovieService
{
    use ConsumesExternalServices;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = Config::get('services.movies.base_uri');
        $this->secret  = Config::get('services.movies.secret')[0]->token;
        $token       = $this->auth('POST','/oauth/token');
        $this->token = json_decode($token,true)['access_token'];
    }

    public function allMovies()
    {

        return $this->performRequest('GET', '/api/movies');
    }

    public function createMovie($data)
    {
        return $this->performRequest('POST', '/api/movie/create', $data);
    }

    public function readOneMovie($id)
    {
        return $this->performRequest('GET', "/api/movie/{$id}");
    }

    public function updateMovie($data, $id)
    {
       return $this->performRequest('PUT', "/api/movie/{$id}", $data);
    }

    public function deleteMovie($id)
    {
        return $this->performRequest('DELETE', "/api/movie/{$id}");
    }
}
