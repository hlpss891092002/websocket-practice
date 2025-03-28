<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'unique:users'],
            'password' => [],
        ];
        if ($this->isMethod('post')) {
            foreach($rules as $key => $value) {
                array_unshift($rules[$key], 'required');
            }
        }
        
        return $rules;
    }
    public function msgs()
    {
        return [
            'name.required' => 'Name is required',
            
            
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            
            'password.required' => 'Password is required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new ValidationException($validator, response()->json([
            'status' => 'error',
            'msg' => $errors->first()
        ], 422));
    }
    
}
    