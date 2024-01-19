<?php

namespace App\Http\Requests;

use App\Helpers\RolesHelper;
use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = auth()->user();
        return $user && $user->level() == RolesHelper::ADMIN;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'model' => 'required',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'price' => 'required|numeric|min:0',
            'manufacturer' => 'required|string|max:255',
            'passengers' => 'required|integer|min:1',
            'cargo_capacity' => 'required|integer|min:1',
        ];
    }
}
