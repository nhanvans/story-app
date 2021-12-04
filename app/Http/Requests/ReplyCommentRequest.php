<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class ReplyCommentRequest extends FormRequest
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
            'content' => 'required',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'content' => __('comment.content'),
        ];
    }

    public function messages()
    {
        return [
            'content.required' => __('public.rules.required', ['name' => ':attribute']),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // throw (new ValidationException($validator))
        //             ->errorBag($this->errorBag)
        //             ->redirectTo($this->getRedirectUrl());
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json([
                "success" => false,
                "error" => true,
                "status" => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                "message" => @trans('comment.create_fails'),
                "data" => [
                    'errors' => $errors
                ]
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
