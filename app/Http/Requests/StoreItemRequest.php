<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\IntegrityEnum;
use App\ConservationStateEnum;
class StoreItemRequest extends FormRequest
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
            'name'                 => 'required|string|max:255',
            'number'               => 'required|integer',
            'dimentions'           => 'required|array',
            'location_id'          => 'required|exists:locations,id',
            'materials_id'         => 'required|exists:materials,id',
            'subtype_id'           => 'required|exists:subtypes,id',
            'colection_id'         => 'required|exists:colections,id',
            'action_conserve_id'   => 'required|exists:actions_conserve,id',
            'weight'               => 'required|integer',
            'technic'              => 'required|string|max:255',
            'integrity'            => ['required', new Enum(IntegrityEnum::class)],
            'conservation_state'   => ['required', new Enum(ConservationStateEnum::class)],
            'integrity'            => 'required|string|max:255',
            'conservation_state'   => 'required|string|max:255',
            'conservation_detail'  => 'nullable|string',
            'description'          => 'required|string',
            'reference'            => 'required|string|max:255',
            'date_cadastred'       => 'required|date',

        ];
    }
}
