<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use EntityManager;
use Responder;
use Auth;

class UserController extends Controller
{
    /* @var \App\Repositories\UsersRepository $userRepository */
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = EntityManager::getRepository(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Responder $responder)
    {
        return responder()->success($this->userRepository->findAll(), UserTransformer::class, 'uid')->respond();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Responder $responder, User $user)
    {
        return responder()->success($user, UserTransformer::class, 'uid')->respond();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
