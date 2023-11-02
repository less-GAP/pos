<?php


namespace Modules\Salon\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
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
            'username' => [
                'required',
                Rule::unique('users')->ignore($this->input('id')),
            ],
            'full_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->input('id')),
            ],
        ];
    }


}
