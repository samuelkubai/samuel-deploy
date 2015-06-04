<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateSchoolRequest extends Request {

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
            'name' => 'required',
            'description' => 'required',
            'username' => 'required | unique:groups,username',
            'email' => 'email| unique:groups,email',
           // 'url' => 'required',
		];
	}

}
