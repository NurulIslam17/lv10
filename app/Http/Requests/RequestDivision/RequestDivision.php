<?php

namespace App\Http\Requests\RequestDivision;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RequestDivision extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return true;
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => "required|string|min:3|max:20",
            'email' => "required|string|min:5|max:20",
            'zip' => "required|unique:divisions|integer",
        ];
    }
}
