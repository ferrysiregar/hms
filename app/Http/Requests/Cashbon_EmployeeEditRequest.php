<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Cashbon_EmployeeEditRequest extends FormRequest
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
            
				"date" => "filled|date",
				"employee_name" => "filled",
				"salary_employee" => "filled",
				"cashbon_value" => "filled|numeric",
				"calc_month_payment" => "filled|numeric",
				"payment_per_month" => "filled|numeric",
				"cashbon_description" => "filled",
            
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
