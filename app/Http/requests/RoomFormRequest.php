<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'roomtype_id' =>[
                'required',
                'integer'
            ],
            'title' =>[
                'required',
                'string'
            ],
            'price' =>[
                'required',
                'string'
            ],
            'room_no' =>[
                'required',
                'integer'

            ],
            'image' =>[
                'nullable',
                // 'image|mimes:jpeg,png,jpg'
            ],
        ];
    }
}
