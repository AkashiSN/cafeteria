<?php

/**
 * StoreAdminMenu.php
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
 * StoreAdminMenu class
 *
 * メニュー追加の際のバリデーターです
 *
 * @category Request
 * @package  Request
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class StoreAdminMenu extends FormRequest
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
     * メニュー追加のリクエストに適応するルール。
     *
     * @return array
     */
    public function rules()
    {
        return [
            'item_name' => 'required|max:30',
            'price'     => 'required|integer',
            'energy'    => 'required|integer',
            'protein'   => 'required|numeric',
            'lipid'     => 'required|numeric',
            'salt'      => 'required|numeric',
        ];
    }
}
