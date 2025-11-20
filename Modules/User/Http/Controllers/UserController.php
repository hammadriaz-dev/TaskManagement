<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\Contracts\Services\UserServiceInterface;
use Modules\User\DTO\UserDTO;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected UserServiceInterface $service;

    public function __construct(UserServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = $this->service->all();
        return view('user::index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $dto = $request->getDTO();
        $this->service->create($dto);
        return redirect()->route('admin.users.index')->with('success', 'User created');
    }

    /**
     * Show the specified resource.
     */
    public function show(User $user)
    {
        $user = $user->load('roles');
        return view('user::show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = $this->service->find($id);
        return view('user::edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $dto = $request->getDTO();
        $user = $this->service->update($user, $dto);
        return redirect()->route('admin.users.index')->with('success', 'User updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->service->delete($user);
        return redirect()->back();
    }
}
