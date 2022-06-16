<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultiRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        $request = [];

        if (isset($_REQUEST['title_uk']))
        {
            $request['title_uk'] = 'required|min:2|max:55';
        }

        if (isset($_REQUEST['title_ru']))
        {
            $request['title_ru'] = 'required|min:2';
        }

        if (isset($_REQUEST['description_uk']))
        {
            $request['description_uk'] = 'required|min:2';
        }

        if (isset($_REQUEST['description_ru']))
        {
            $request['description_ru'] = 'required|min:2';
        }

        if (isset($_REQUEST['product_type_id']))
        {
            $request['product_type_id'] = 'required';
        }

        if (isset($_REQUEST['category_id']))
        {
            $request['category_id'] = 'required';
        }

        if (isset($_REQUEST['sub_category_id']))
        {
            $request['sub_category_id'] = 'required';
        }

        if (isset($_REQUEST['home_view']))
        {
            $request['home_view'] = 'required';
        }

        if (isset($_REQUEST['route']))
        {
            $request['route'] = 'required';
        }

        if (isset($_REQUEST['image']))
        {
            $request['image'] = 'required|mimes:jpeg,png,jpg,svg';
        }

        if (isset($_REQUEST['sizecount']))
        {
            $count = $_REQUEST['sizecount'];
        }

        if (isset($_REQUEST['counter']))
        {
            $count = $_REQUEST['counter'];
        }

        if (isset($_REQUEST['size/1']))
        {
            for ($i = 1; $i <= $count; $i++) {
                $request['size/'.$i] = 'required';
            }
        }

        if (isset($_REQUEST['price/1']))
        {
            for ($i = 1; $i <= $count; $i++) {
                $request['price/'.$i] = 'required';
            }
        }

        if (isset($_REQUEST['price_units/1']))
        {
            for ($i = 1; $i <= $count; $i++) {
                $request['price_units/'.$i] = 'required';
            }
        }

        if (isset($_REQUEST['available/1']))
        {
            for ($i = 1; $i <= $count; $i++) {
                $request['available/'.$i] = 'required';
            }
        }

        if (isset($_REQUEST['phone']))
        {
            $request['phone'] = 'required|min:10|max:20';
        }

        return $request;
    }
}
