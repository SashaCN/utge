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
        // dd($_REQUEST);

        $request = [
            'title_uk' => 'required|min:2|max:55',
            'title_ru' => 'required|min:2|max:55',
        ];
        
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

        if(isset($_REQUEST['sizecount']))
        {
            for ($i = 1; $i <= $_REQUEST['sizecount']; $i++) { 
                $request['size.'.$i] = 'required';
                $request['price.'.$i] = 'required';
                $request['price_units.'.$i] = 'required';
                $request['available.'.$i] = 'required';
            }
        }
        return $request;    
    }
}
