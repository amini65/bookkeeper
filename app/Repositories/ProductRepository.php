<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getProducts()
    {
        return Product::query()->get();
    }
    public function getProductById($id)
    {
        return Product::query()->whereId($id)->first();
    }


    public function store($request,$image='')
    {
        return Product::query()->create([
            'name'=>$request->name,
            'code'=>$request->userName,
            'image'=>$image
        ]);
    }
    public function update($request,$Product,$image='')
    {
        return $Product->update([
            'name'=>$request->name,
            'code'=>$request->userName,
            'image'=>$image
        ]);
    }
}
