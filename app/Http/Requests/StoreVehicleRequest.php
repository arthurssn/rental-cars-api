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
            'vehicle_class' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório.',
            'model.required' => 'Modelo é obrigatório.',
            'year.required' => 'Ano é obrigatório.',
            'price.required' => 'Preço é obrigatório.',
            'manufacturer.required' => 'Fabricante é obrigatório.',
            'passengers.required' => 'Passageiros é obrigatório.',
            'cargo_capacity.required' => 'Capacidade de carga é obrigatório.',
            'vehicle_class.required' => 'Classe do veículo é obrigatório.',
        ];
    }
}
