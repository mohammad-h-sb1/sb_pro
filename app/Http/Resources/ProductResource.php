<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->resource->id,
            'category_id'=>$this->resource->category_id,
            'name'=>$this->resource->name,
            'content'=>$this->resource->content,
            'money'=>$this->resource->money,
            'banner'=>$this->resource->banner,
        ];
//        return parent::toArray($request);
    }

//    public function with($request)
//    {
//        return[
//            $product=Product::all(),
//            $product->tags()
//        ];
//    }
}
