<?php

namespace App\Http\Requests;

use App\Helpers\RolesHelper;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->level() == RolesHelper::ADMIN;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'year' => 'integer|min:1900|max:' . (date('Y') + 1),
            'price' => 'numeric|min:0',
            'manufacturer' => 'string|max:255',
            'passengers' => 'integer|min:1',
            'cargo_capacity' => 'integer|min:1',
        ];
    }
}
