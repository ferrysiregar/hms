<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomAddRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
		
        return [
            
				"room_name" => "required|string",
				"room_type_id" => "required",
				"room_facilities_id" => "required",
				"price_basic" => "required|numeric",
				"price_sales" => "required|numeric",
				"status_room_id" => "required",
				"photo_room_id" => "required",
            
        ];
    }

	public function messages()
    {
        return [
			
            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
