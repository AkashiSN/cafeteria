<?php

/**
 * StoreUserInfo.php
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
 * StoreUserInfo class
 *
 * メニュー追加の際のバリデーターです
 *
 * @category Request
 * @package  Request
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class StoreUserInfo extends FormRequest
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
     * ユーザー情報のリクエストに適応するルール。
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name'     => 'max:20',
            'files.*.image' => 'image|max:10000',
        ];
    }

    /**
     * ルールに適合しなかった場合に出力するメッセージの定義。
     *
     * @return void
     */
    public function messages()
    {
        return [
            'files.*.image.image' => '画像をアップロードしてください',
            'files.*.image.max'   => '画像は１MB以下でお願いします',
        ];
    }
}
