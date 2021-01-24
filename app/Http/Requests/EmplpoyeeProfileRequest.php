<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class EmplpoyeeProfileRequest extends FormRequest
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
        $validateArr=[];
        
        $emp_id= Auth::guard('employee')->user()->id;
         $validateArr=[
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:employees,email,'.$emp_id,
            'primary_phone' => 'required|min:10',
            'secondary_phone' => 'min:10'
        ];
         return $validateArr;
    }
}
