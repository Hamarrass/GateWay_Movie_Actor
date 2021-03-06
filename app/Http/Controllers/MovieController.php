<?php

namespace App\Http\Controllers;

use App\Services\ActorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\MovieService;

/**
 * Movie Controller
 */
class MovieController extends Controller
{
    use ApiResponser;

    public $movieService;
    public $actorService;

    /**
     *
     * @return void
     */
    public function __construct(MovieService $movieService ,ActorService $actorService)
    {
        $this->movieService = $movieService;
        $this->actorService = $actorService;
    }

    /**
     *
     * @return Illuminate\Http\Response
     */

     //optain all movies
    public function all()
    {
        $allActorsJson  = $this->successResponse($this->actorService->allActors());
        $allActors =json_decode($allActorsJson->content(), true);

        $allMoviesJson  = $this->successResponse($this->movieService->allMovies());
        $allMovies =json_decode($allMoviesJson->content(), true);

        return view('movie.movies',compact('allMovies','allActors'));
    }

    /**
     *
     * @param Illuminate
     * @return Illuminate\Http\Response
     */
    //add an a movie
    public function create(Request $request)
    {
       $this->successResponse($this->movieService->createMovie($request->all(), Response::HTTP_CREATED));
       return redirect()->route('movies');
    }

    /**
     * Show a movie.
     *
     * @return Illuminate\Http\Response
     */

    public function read($id)
    {
        $movieJson  = $this->successResponse($this->movieService->readOneMovie($id));
        $movie =json_decode($movieJson->content(), true);
        return view('movie.movie',compact('movie'));
    }


 /**
     * edit an movie.
     *
     * @return Illuminate\Http\Response
*/
    public function edit($id)
    {
        $movieJson  = $this->successResponse($this->movieService->readOneMovie($id));
        $movie =json_decode($movieJson->content(), true);
        return  view('movie.editmovie',compact('movie'));
    }


    /**
     * Update a movie.
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->successResponse($this->movieService->updateMovie($request->all(), $id));
        return  redirect()->route('movies');
    }

    /**
     * Delete a movie.
     *
     * @return Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->successResponse($this->movieService->deleteMovie($id));
        return  redirect()->route('movies');
    }

    public function actorMovies($id){

        $actorsMovie=$this->successResponse($this->movieService->actorsMovie($id));
        $actorsMovie =json_decode($actorsMovie->content(), true);
        return  view('actorsmovie.actrosmovies',compact('actorsMovie'));
    }
}
