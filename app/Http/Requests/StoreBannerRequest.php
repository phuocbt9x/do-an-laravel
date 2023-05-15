<?php

namespace App\Http\Requests;

use App\Enums\BannerPosition;
use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:255|unique:banners,title',
            'content' => 'sometimes',
            'image' => 'required|image',
            'position' => 'required|enum_value:' . BannerPosition::class . ', false',
            'time_start' => 'required|date|after_or_equal:today',
            'time_end' => 'required|date|after:time_start',
        ];
    }
}
