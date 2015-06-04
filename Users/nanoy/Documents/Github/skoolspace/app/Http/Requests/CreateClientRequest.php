<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateClientRequest extends Request {

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
            'firstName' => 'required',
            'middleName' => 'required',
            'lastName' => 'required',
            'admNo' => 'required | unique:clients,admNo',
            'class' => 'required',
            'telNumber' => 'required',
            'gender' => 'required',
            'username' => 'required',
        ];
    }

}
