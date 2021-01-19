<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use App\Services\ActorService;

/**
 * Author Controller
 */
class ActorController extends Controller
{
    use ApiResponser;

    public $actorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActorService $actorService)
    {
        $this->actorService = $actorService;
    }

    /**
     * Return the list of authors
     *
     * @return Illuminate\Http\Response
     */

     //optain all actor
    public function all()
    {
        $allActorsJson  = $this->successResponse($this->actorService->allActors());
        $allActors =json_decode($allActorsJson->content(), true);
        return view('Actor.actors',compact('allActors'));
    }

    /**
     * Create an author.
     *
     * @param Illuminate
     * @return Illuminate\Http\Response
     */
    //add an actor
    public function create(Request $request)
    {
        return $this->successResponse($this->actorService->createActor($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Show an author.
     *
     * @return Illuminate\Http\Response
     */
    public function read($id)
    {
        return $this->successResponse($this->actorService->readOneActor($id));
    }

    /**
     * Update an author.
     *
     * @return Illuminate\Http\Response
     */
    public function updateActor(Request $request, $id)
    {
        return $this->successResponse($this->actorService->updateActor($request->all(), $id));
    }

    /**
     * Delete an author.
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->successResponse($this->actorService->deleteActor($id));
    }
}
