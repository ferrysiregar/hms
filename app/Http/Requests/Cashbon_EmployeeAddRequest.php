<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Cashbon_EmployeeAddRequest extends FormRequest
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
            
				"date" => "required|date",
				"employee_name" => "required",
				"salary_employee" => "required",
				"cashbon_value" => "required|numeric",
				"calc_month_payment" => "required|numeric",
				"payment_per_month" => "required|numeric",
				"cashbon_description" => "required",
            
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
