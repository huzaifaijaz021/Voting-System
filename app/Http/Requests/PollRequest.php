<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PollRequest extends FormRequest
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
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
        ];
    }
    public function prepareRequest()
    {
        $request =$this;
        return[
            'option1'=>$request->option1,
            'option2'=>$request->option2,
            'option3'=>$request->option3,
            'option4'=>$request->option4,
        ];
    }
    public function queStore()
    {
        $request = $this;
        return[
            'question'=>$request->question,
        ];
    }
}
