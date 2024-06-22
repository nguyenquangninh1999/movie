<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChatRequest extends FormRequest
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
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'video' => 'required|string',
            'image' => 'nullable|image',
            'category' => 'required|string',
            'pay' => 'required|string',
            'zalo' => 'required|string',
            'birthday' => 'required|string',
            'height' => 'required|string',
            'weight' => 'required|string',
            'work' => 'required|string',
            'price' => 'required|string',
            'telegram' => 'required|string',
        ];
    }
}
