<?php

namespace App\Http\Requests\Api\Item;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',

            'number' => 'required|string|max:255',

            'length' => 'nullable|integer|min:0',
            'height' => 'nullable|integer|min:0',
            'width' => 'nullable|integer|min:0',
            'weight' => 'required|integer|min:0',

            'archeological_site' => 'required|string|max:255',
            'technic' => 'required|string|max:255',
            'reference' => 'required|string|max:255',

            'integrity' => 'required|string|max:255',
            'conservation_state' => 'required|string|max:255',
            'conservation_detail' => 'required|string|max:255',

            'location_id' => 'required|exists:locations,id',
            'subtype_id' => 'required|exists:subtypes,id',
            'collection_id' => 'required|exists:collections,id',
            'ethnic_group_id' => 'required|exists:ethnic_groups,id',
        ];
    }
}
