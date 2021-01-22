<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use App\Services\ActorService;

/**
 * Actor Controller
 */
class ActorController extends Controller
{
    use ApiResponser;

    public $actorService;

    /**
     *
     * @return void
     */
    public function __construct(ActorService $actorService)
    {
        $this->actorService = $actorService;
    }

    /**
     *
     * @return Illuminate\Http\Response
     */

     //optain all actor
    public function all()
    {


        $allActorsJson  = $this->successResponse($this->actorService->allActors());

        $allActors =json_decode($allActorsJson->content(), true);
        return view('actor.actors',compact('allActors'));
    }

    /**
     *
     * @param Illuminate
     * @return Illuminate\Http\Response
     */
    //add an actor
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

       $this->successResponse($this->actorService->createActor($request->all(), Response::HTTP_CREATED));
       return redirect()->route('actors');
    }

    /**
     * Show an Actor.
     *
     * @return Illuminate\Http\Response
     */

    public function read($id)
    {
        $actorJson  = $this->successResponse($this->actorService->readOneActor($id));
        $actor =json_decode($actorJson->content(), true);
        return view('actor.actor',compact('actor'));
    }


 /**
     * edit an actor.
     *
     * @return Illuminate\Http\Response
*/
    public function edit($id)
    {
        $actorJson  = $this->successResponse($this->actorService->readOneActor($id));
        $actor =json_decode($actorJson->content(), true);
        return  view('actor.editactor',compact('actor'));
    }


    /**
     * Update an actor.
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->successResponse($this->actorService->updateActor($request->only('name'), $id));
        return  redirect()->route('actors');
    }

    /**
     * Delete an Actor.
     *
     * @return Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->successResponse($this->actorService->deleteActor($id));
        return  redirect()->route('actors');
    }
}
