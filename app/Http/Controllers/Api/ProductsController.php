<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;

use App\Http\Resources\Product as ProductResource;

class ProductsController extends Controller
{
    public function show ($id)
    {
        return new ProductResource(Product::find($id));
    }
}
