<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProductControllerTests extends TestCase
{
    use DatabaseMigrations;

    public function testCreateNewProduct()
    {

        $postData = [
            'productName' => 'Test product',
            'productPrice' => '10000',
            'productImage' => 'http://test-product-image-url.com'
        ];

        $this->post('/api/product', $postData);

        $response = $this->response;

        $this->assertEquals(201, $response->getStatusCode());
    }

    public function testUpdateProduct()
    {
        $initialData = [
            'productName' => 'Test product name',
            'productPrice' => '10000',
            'productImage' => 'http://test-product-image-url.com'
        ];

        $initialContent = $this->post('/api/product', $initialData)
            ->response
            ->getOriginalContent()['data'];

        $this->assertEquals('Test product name', $initialContent['name']);

        $lastInsertedID = $initialContent['_id'];
        $updateData = [
            'productName' => 'Updated Product name'
        ];

        $updatedContent = $this->put('/api/product/'.$lastInsertedID, $updateData)
            ->response
            ->getOriginalContent()['data'];

        $this->assertEquals('Updated Product name', $updatedContent['name']);
    }

    public function testGetProduct()
    {
        $initialData = [
            'productName' => 'Test product name',
            'productPrice' => '10000',
            'productImage' => 'http://test-product-image-url.com'
        ];

        $initialContent = $this->post('/api/product', $initialData)
            ->response
            ->getOriginalContent()['data'];

        $this->assertEquals('Test product name', $initialContent['name']);

        $lastInsertedID = $initialContent['_id'];

        $statusCode = $this->get('/api/product/'.$lastInsertedID)
            ->response
            ->getStatusCode();

        $this->assertEquals(200, $statusCode);
    }

    public function testDeleteProduct()
    {
        $initialData = [
            'productName' => 'Test product name',
            'productPrice' => '10000',
            'productImage' => 'http://test-product-image-url.com'
        ];

        $initialContent = $this->post('/api/product', $initialData)
            ->response
            ->getOriginalContent()['data'];

        $this->assertEquals('Test product name', $initialContent['name']);

        $lastInsertedID = $initialContent['_id'];

        $statusCode = $this->delete('/api/product/'.$lastInsertedID)
            ->response
            ->getStatusCode();

        $this->assertEquals(200, $statusCode);
    }
}