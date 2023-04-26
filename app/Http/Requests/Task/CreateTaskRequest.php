<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{

    protected $redirect = '/tasks/create';

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

            'name'=>'required',
            'priority' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Task name is required!',
            'priority.required' => 'Priority is required!'
        ];
    }
}
