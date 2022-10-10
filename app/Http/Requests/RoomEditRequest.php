<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomEditRequest extends FormRequest
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
            
				"room_name" => "filled|string",
				"room_type_id" => "filled",
				"room_facilities_id" => "filled",
				"price_basic" => "filled|numeric",
				"price_sales" => "filled|numeric",
				"status_room_id" => "filled",
				"photo_room_id" => "filled",
            
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
