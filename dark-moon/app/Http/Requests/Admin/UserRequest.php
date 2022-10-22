<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Constants\UserTypes ;
class UserRequest extends FormRequest
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

    protected function prepareForValidation(): void
    {
        $this->merge([
            'phone' => $this->phone[0] == 0  ? substr($this->phone, 1) : $this->phone,
        ]);
    }
    public function rules()
    {
        $rules = [
            'name'        => 'required|min:2|max:45',
            'email'       => 'required|email|min:2|max:100|unique:users',
            'phone'       => 'required|unique:users',
        ];
            if($this->method() == "PUT"){
                $rules['email'] = $rules['email'].",email,".$this->id;
                $rules['phone'] =  $rules['phone'].",phone,".$this->id;
                $rules['password'] = 'confirmed';
            }

        if ($this->method() == 'POST') {
            $rules['password'] = 'required|min:8|max:100|confirmed';
        }

        // if ($this->method() == 'PUT') {
        //     if ($this->password) {
        //         $rules['password'] = 'min:8|max:100|confirmed';
        //     }
        // }
    
        if($this->type == UserTypes::CASHIER){
            // if($this->method() == "POST"){
                $rules['branch_id'] = 'required';
                $rules['type'] = 'required';
            // }
        }
return $rules; 
        
    }

        public function messages()
        {
            return [
                'branch_id.required'=>trans('translations.branch_id_required')
            ];
        }

    

}
