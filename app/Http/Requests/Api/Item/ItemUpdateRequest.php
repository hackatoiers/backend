<?php

namespace App\Http\Requests\Api\Item;

use Illuminate\Foundation\Http\FormRequest;

class ItemUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',

            'number' => 'sometimes|required|string|max:255',

            'length' => 'sometimes|nullable|integer|min:0',
            'height' => 'sometimes|nullable|integer|min:0',
            'width' => 'sometimes|nullable|integer|min:0',
            'weight' => 'sometimes|required|integer|min:0',

            'archeological_site' => 'sometimes|required|string|max:255',
            'technic' => 'sometimes|required|string|max:255',
            'reference' => 'sometimes|required|string|max:255',

            'integrity' => 'sometimes|required|string|max:255',
            'conservation_state' => 'sometimes|required|string|max:255',
            'conservation_detail' => 'sometimes|required|string|max:255',

            'location_id' => 'sometimes|required|exists:locations,id',
            'subtype_id' => 'sometimes|required|exists:subtypes,id',
            'collection_id' => 'sometimes|required|exists:collections,id',
            'ethnic_group_id' => 'sometimes|required|exists:ethnic_groups,id',
        ];
    }
}
