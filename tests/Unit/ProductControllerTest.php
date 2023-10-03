<?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Arrange
        $productMock = Mockery::mock(Product::class);
        $productMock->shouldReceive('all')->andReturn(new Collection());
        $controller = new ProductController($productMock);
        // Act
        $response = $controller->index();
        // Assert
        $this->assertEquals('products.index', $response->name()); // Assert the view name
        $this->assertInstanceOf(Collection::class, $response->getData()['products']); // Assert that 'products' is an instance of Collection
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
            'name' => 'Test Product',
            'qty' => 10,
            'price' => 9.99,
            'description' => 'This is a test product',
        ]);
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
        // Act
        $controller = new ProductController();
        $response = $controller->delete($product);
        // Assert
        $this->assertTrue($response->isRedirect());
        $this->assertEquals(route('product.index'), $response->getTargetUrl());
        $this->assertEquals('Product successfully deleted', session('success'));
    }

}
