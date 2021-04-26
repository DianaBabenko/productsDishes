<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserRequest
 * @package App\Http\Requests
 */
class UserRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'surname'       => 'required|string|max:255',
            'patronymic'    => 'required|string|max:255',
            'email'         => 'required|string|email',
            'image'         => 'image|mimes:jpeg,png,jpg|max:2048'

        ];
    }
}
