<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function saveProduct(Request $request)
    {
        $productName = $request['productName'];
        $productPrice = $request['productPrice'];
        $productImage = $request['productImage'];

        if (empty($productName) || empty($productPrice)) {
            return $this->errorResponse([
                'code' => '123',
                'message' => 'Product name or price cannot be empty'
            ], 400);
        }

        $product = new Product();
        $product->name = $productName;
        $product->price = (double)$productPrice;
        $product->image = $productImage;

        if(!$product->save()) {
            return $this->errorResponse([
                'code' => '345',
                'message' => 'Failed to save data into database'
            ], 400);
        }

        return $this->successResponse($product, 200);
    }

    public function getProduct($productID)
    {

        if (empty($productID)) {
            return $this->errorResponse([
                'code' => '678',
                'message' => 'Product ID is not provided'
            ], 400);
        }

        $product = Product::find($productID);
        if (is_null($product)) {
            return $this->errorResponse([
                'code' => '910',
                'message' => 'Product not found'
            ], 400);
        }

        return $this->successResponse($product, 200);
    }

}