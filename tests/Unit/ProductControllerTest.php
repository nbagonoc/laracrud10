<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        $product1 = Product::factory()->create();
        $product2 = Product::factory()->create();
        $controller = new ProductController();
        // Act
        $response = $controller->index();
        // Assert
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertEquals('products.index', $response->name());
        $this->assertArrayHasKey('products', $response->getData());
        $this->assertTrue($response->getData()['products']->contains($product1));
        $this->assertTrue($response->getData()['products']->contains($product2));
    }

    public function testCreate()
    {
        // Arrange
        $controller = new ProductController();
        // Act
        $response = $controller->create();
        // Assert
        $this->assertEquals('products.create', $response->name());
    }

    public function testSave()
    {
        // Arrange
        $request = new Request([
            'name' => 'Test Product',
            'qty' => 10,
            'price' => 9.99,
            'description' => 'This is a test product'
        ]);
        $controller = new ProductController();
        // Act
        $response = $controller->save($request);
        // Assert
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'qty' => 10,
            'price' => 9.99,
            'description' => 'This is a test product'
        ]);
        $this->assertTrue($response->isRedirect());
        $this->assertEquals(route('product.index'), $response->getTargetUrl());
        $this->assertEquals('Product successfully saved', session('success'));
    }

    public function testRead()
    {
        // Arrange
        $product = new Product([
            "id" => 1,
            "name" => "test product",
            "qty" => 10,
            "price" => 19.99,
            "description" => "This is a test product description.",
            "created_at" => "2023-10-02 11:21:37",
            "updated_at" => "2023-10-02 11:21:37"
        ]);
        // $product = Product::factory()->create(); //works as well
        $controller = new ProductController();
        // Act
        $response = $controller->read($product);
        // Assert
        $this->assertEquals('products.read', $response->name());
        $this->assertEquals($product, $response->getData()['product']);
    }

    public function testEdit()
    {
        // Arrange
        $product = new Product([
            "id" => 1,
            "name" => "test product",
            "qty" => 10,
            "price" => 19.99,
            "description" => "This is a test product description.",
            "created_at" => "2023-10-02 11:21:37",
            "updated_at" => "2023-10-02 11:21:37"
        ]);
        // $product = Product::factory()->create(); //works as well
        $controller = new ProductController();
        // Act
        $response = $controller->edit($product);
        // Assert
        $this->assertEquals('products.edit', $response->name());
        $this->assertEquals($product, $response->getData()['product']);
    }

    public function testUpdate(){
        // Arrange
        $product = Product::factory()->create([
            "id" => 1,
            "name" => "Test Product",
            "qty" => 10,
            "price" => 19.99,
            "description" => "This is a test product description.",
            "created_at" => "2023-10-02 11:21:37",
            "updated_at" => "2023-10-02 11:21:37"
        ]);
        // $product = Product::factory()->create(); //works as well
        $request = new Request([
            'name' => 'Updated Product',
            'qty' => 20,
            'price' => 19.99,
            'description' => 'This is an updated product',
        ]);
        $controller = new ProductController();
        // Act
        $response = $controller->update($request, $product);
        // Assert
        $this->assertDatabaseHas('products', [
            'name' => 'Updated Product',
            'qty' => 20,
            'price' => 19.99,
            'description' => 'This is an updated product',
        ]);
        $this->assertEquals(route('product.index'), $response->getTargetUrl());
        $this->assertEquals('Product successfully update', session('success'));
    }

    public function testDelete()
    {
        // Arrange
        $product = new Product([
            "id" => 1,
            "name" => "test product",
            "qty" => 10,
            "price" => 19.99,
            "description" => "This is a test product description.",
            "created_at" => "2023-10-02 11:21:37",
            "updated_at" => "2023-10-02 11:21:37"
        ]);
        // $product = Product::factory()->create(); //works as well
        // Act
        $controller = new ProductController();
        $response = $controller->delete($product);
        // Assert
        $this->assertTrue($response->isRedirect());
        $this->assertEquals(route('product.index'), $response->getTargetUrl());
        $this->assertEquals('Product successfully deleted', session('success'));
    }

}
