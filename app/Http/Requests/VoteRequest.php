<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteRequest extends FormRequest
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

     public function rules()
     {
         return [
             'question_id'=>'required',
             'option_id'=>'required',
             'select_option'=>'required',
            //  'email'=>'required|unique:votes',
            'email'=>'required',
         ];
     }


     public function VoteDetail(){
         $request = $this;
         return[
             'email'=> $request->email,
             'question_id'=> $request->question_id,
             'option_id'=>$request->option_id,
             'selected_option' => $request->select_option,
         ];
     }
}
