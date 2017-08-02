<?php
/**
 * User: surprisepeas
 * Date: 2017/7/31 17:26
 */

namespace App\Http\Controllers\API;


use App\Http\Requests\API\User\UserStoreRequest;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    /**
     * Create a new user
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserStoreRequest $request)
    {
        return response()->json(User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]));
    }
}