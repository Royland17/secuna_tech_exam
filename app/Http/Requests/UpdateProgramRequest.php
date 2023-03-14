<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProgramRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        // dd($this->program);
        return [
            'name' => [
                'sometimes',
                'required',
                Rule::unique('programs')->ignore($this->program, 'id')
            ],
            'pentesting_start_date' => 'nullable',
            'pentesting_end_date' => 'nullable',
        ];
    }
}
