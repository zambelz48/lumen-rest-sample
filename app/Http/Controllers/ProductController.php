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

        return $this->successResponse($product, 201);
    }

    public function updateProduct(Request $request, $productID)
    {

        $product = Product::find($productID);

        if (is_null($product)) {
            return $this->errorResponse([
                'code' => '112',
                'message' => 'Product not found'
            ], 400);
        }

        $productName = $request['productName'];
        $productPrice = $request['productPrice'];
        $productImage = $request['productImage'];

        if (!empty($productName)) {
            $product->name = $productName;
        }

        if (!empty($productPrice)) {
            $product->price = (double)$productPrice;
        }

        if (!empty($productImage)) {
            $product->image = $productImage;
        }

        if (!$product->update()) {
            return $this->errorResponse([
                'code' => '678',
                'message' => 'Failed to update data into database'
            ], 400);
        }

        return $this->successResponse($product, 200);
    }

    public function getProduct($productID)
    {

        if (empty($productID)) {
            return $this->errorResponse([
                'code' => '910',
                'message' => 'Product ID is not provided'
            ], 400);
        }

        $product = Product::find($productID);
        if (is_null($product)) {
            return $this->errorResponse([
                'code' => '112',
                'message' => 'Product not found'
            ], 400);
        }

        return $this->successResponse($product, 200);
    }

    public function deleteProduct($productID)
    {
        $product = Product::find($productID);

        if (is_null($product)) {
            return $this->errorResponse([
                'code' => '112',
                'message' => 'Product not found'
            ], 400);
        }

        if (!$product->delete()) {
            return $this->errorResponse([
                'code' => '678',
                'message' => 'Failed to delete data from database'
            ], 400);
        }

        return $this->successResponse([ $product->_id ], 200);
    }

}