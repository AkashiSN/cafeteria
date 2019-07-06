<?php

/**
 * ReviewRequest.php
 *
 * PHP Version = 7.0
 *
 * @category Request
 * @package  Request
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * ReviewRequest class
 *
 * レビューリクエストのバリデーターです
 *
 * @category Request
 * @package  Request
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('get')) {
            return [];
        }

        return [
            'evaluation' => 'required',
            'files.*.image' => 'image|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
