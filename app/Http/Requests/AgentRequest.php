<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AgentRequest extends Request
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
        switch($this->method)
        {
            case "PATCH":
                return [
                    'name' => 'required|min:3|unique:agents,name,'.$this->agents->id,
                    'email' => 'required|email|unique:agents,email,'.$this->agents->id,
                    'phone' => ['required', 'regex:/(([0-9])|\(|\)|-|\.| ){10,16}/']
                ];
            case "POST":
                return [
                    'name' => 'required|min:3|unique:agents,name',
                    'email' => 'required|email|unique:agents,email',
                    'phone' => ['required', 'regex:/(([0-9])|\(|\)|-|\.| ){10,16}/']
                ];
        }
    }
}
