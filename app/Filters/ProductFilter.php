<?php

namespace App\Filters;
use Illuminate\Support\Facades\DB;

class ProductFilter extends QueryFilter
{
    public function sub_category_id($id)
    {
        return $this->builder->when($id, function($query) use($id){
            $query->where('sub_category_id', $id);
        });
    }

    public function category_id($id)
    {
        return $this->builder
        ->leftJoin('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
        ->leftJoin('categories', 'categories.id', '=', 'sub_categories.category_id')
        ->where('category_id', $id);
    }


    public function product_type_id($id)
    {
        return $this->builder
        ->leftJoin('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
        ->leftJoin('categories', 'categories.id', '=', 'sub_categories.category_id')
        ->leftJoin('product_types', 'product_types.id', '=', 'categories.product_type_id')
        ->where('product_type_id', $id);
    }

    // public function search_field($search_str = '')
    // {
    //     return $this->builder->when(DB::table('products'))
    //     ->leftJoin('size_prices', 'products.id', '=', 'size_prices.product_id')
    //     ->select('products.id')
    //     ->where('size_prices.price', 'LIKE', '"%'.$search_str.'%"');
    // }

    // public function search_field($search_str = '')
    // {
    //     return $this->builder
    //     ->leftJoin('localizations', 'products.id', '=', 'localizations.localizationable_id')
    //     ->where('products.id', 'LIKE', '"%'.$search_str.'%"');

    // }
}
