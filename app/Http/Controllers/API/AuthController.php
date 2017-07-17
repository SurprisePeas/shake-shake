<?php
/**
 * User: surprisepeas
 * Date: 2017/6/28 18:05
 */

namespace App\Http\Controllers\API;

use App\Http\Requests\API\UserLoginRequest;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
	public function login(UserLoginRequest $request)
	{

		$credentials = $request->only('email', 'password');
		try {
			if (!$token = JWTAuth::attempt($credentials)) {
				return response()->json(['error' => 'invalid_credentials'], 401);
			}
		} catch (JWTException $e) {
			return response()->json(['error' => 'could_not_create_token'], 500);
		}
		return response()->json(compact('token'));
	}
}