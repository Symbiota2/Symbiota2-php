<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Http\Controllers\ApiController;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use EntityManager;
use Responder;
use Auth;

class UserController extends ApiController
{
    /* @var \App\Repositories\UsersRepository $userRepository */
    protected $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = EntityManager::getRepository(User::class);
        $this->middleware('client.credentials')->only(['store', 'resend']);
        $this->middleware('auth:api')->except(['store', 'verify', 'resend']);
        $this->middleware('transform.input:' . UserTransformer::class)->only(['store', 'update']);
        //$this->middleware('scope:manage-account')->only(['show', 'update']);
        //$this->middleware('can:view,user')->only('show');
        $this->middleware('can:update,user')->only('update');
        $this->middleware('can:delete,user')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->allowedAdminAction();
        if ($this->userRepository->count([]) === 0) {
            return responder()->error(404, 'No data')->respond();
        }
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
    public function show(Request $request)
    {
        return responder()->success($request->user(), UserTransformer::class, 'uid')->respond();
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
