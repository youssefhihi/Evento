<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required',
            'local' => 'required|max:255',
            'placesNumber' => 'required|integer',
            'date'=>'required',
            'type_booking' => 'required|in:automatic,manual',
            'category_id' => 'required|exists:categories,id',
            'organizer_id' => 'required|exists:categories,id',
           
        ];
    }
}
