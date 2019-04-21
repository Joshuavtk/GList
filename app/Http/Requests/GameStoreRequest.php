<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class GameStoreRequest
 * @package App\Http\Requests
 * @property array platform_id
 * @property array franchise_id
 * @property array tag_id
 */
class GameStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:150',
            'body' => 'nullable|max:300',
            'urgency' => 'nullable|integer',
            'favorite' => 'nullable|boolean',
            'score' => 'nullable|integer',
            'obtained_at' => 'nullable|date',
            'finished_at' => 'nullable|date',
            'platform_id' => 'nullable|array',
            'franchise_id' => 'nullable|array',
            'tag_id' => 'nullable|array',
        ];
    }
}
