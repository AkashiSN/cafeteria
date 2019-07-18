<?php

/**
 * StoreReview.php
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

use App\Models\Menu;
use Illuminate\Foundation\Http\FormRequest;

/**
 * StoreReview class
 *
 * レビューリクエストのバリデーターです
 *
 * @category Request
 * @package  Request
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class StoreReview extends FormRequest
{
    /**
     * レビューを投稿するメニューがあるかどうか。
     *
     * @return bool
     */
    public function authorize()
    {
        if (!Menu::where('id', $this -> menu_id) -> exists()) {
            return redirect() -> route('home');
        }

        return true;
    }

    /**
     * レビュー投稿のリクエストに適応するルール。
     *
     * @return array
     */
    public function rules()
    {
        return [
            'evaluation'    => 'required|min:1|max:5',
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
            'evaluation.required' => '評価を選んでください',
            'files.*.image.image' => '画像をアップロードしてください',
            'files.*.image.max'   => '画像は１MB以下でお願いします',
        ];
    }
}
