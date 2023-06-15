<?php

namespace App\Http\Requests\Tweet;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tweet' => 'required|max:140'
        ];
    }

    public function userId(): int
    {
        return $this->user()->id;
    }
    public function tweet(): string
    {
        return $this->input('tweet');
    }


}
