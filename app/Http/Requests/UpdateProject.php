<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProject extends FormRequest
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
            'title' => 'required|unique:projects|string|max:255',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'title.unique' => 'You have not changes or The title has already been taken.',
        ];
    }

    }
