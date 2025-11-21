<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new UserCollection(User::paginate($this->resolvePerPage($request)));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $user->update($request->validated());

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->user()->delete();

        return response()->json(['message' => 'User deleted']);
    }

    public function search(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)
            ->select('name', 'email', 'avatar')
            ->firstOrFail();

        return response()->json($user, 200);
    }
}
