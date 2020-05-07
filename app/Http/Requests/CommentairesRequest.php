<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class CommentairesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|min:5|max:255'
            // 'name' => 'required|min:5|max:255'
            'texte' => 'required|min:5',
            'codeProduit' => 'required',
            'numClient' => 'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
            'texte' => 'Comment',
            'codeProduit' => 'Product Name',
            'numClient' => 'Client Name',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
            'texte.required' => 'Must include the Comment field ',
            'numClient.required' => 'Must choose a Client which belongs the comment',
            'codeProduit.required' => 'Must choose a Product which belongs the comment',

        ];
    }
}
