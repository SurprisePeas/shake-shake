<?php
/**
 * User: surprisepeas
 * Date: 2017/6/29 11:23
 */

namespace App\Http\Requests\API;


class UserLoginRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'email'    => 'required|email',
			'password' => 'required',
		];
	}
}