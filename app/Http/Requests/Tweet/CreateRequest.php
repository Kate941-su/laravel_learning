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
            'tweet' => 'required|max:140',
            'images' => 'array|max:4',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
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
    public function images(): array {
        return $this->file('images', []);
    }

}
