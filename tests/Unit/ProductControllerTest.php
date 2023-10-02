<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Mockery;

class ProductControllerTest extends TestCase
{
    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testIndex()
    {
        // Create a mock of the Product model to simulate database behavior
        $productMock = Mockery::mock(Product::class);
        $productMock->shouldReceive('all')->andReturn(new Collection()); // Mock the all method to return an empty collection

        // Create an instance of the ProductController and inject the mock
        $controller = new ProductController($productMock);

        // Call the method under test
        $response = $controller->index();

        // Assertions
        $this->assertEquals('products.index', $response->name()); // Assert the view name
        $this->assertInstanceOf(Collection::class, $response->getData()['products']); // Assert that 'products' is an instance of Collection
    }

    public function testCreate()
    {
        // Create an instance of the ProductController and inject the mock
        $controller = new ProductController();

        // Call the method under test
        $response = $controller->create();

        // Assertions
        $this->assertEquals('products.create', $response->name()); // Assert the view name
    }

    public function testRead()
    {
        $productMock = Mockery::mock(Product::class);
        $product = new Product([
            'name' => 'Test Product',
            'qty' => 10, // Replace with your desired quantity
            'price' => 19.99, // Replace with your desired price
            'description' => 'This is a test product description.'
        ]);
        $productMock->shouldReceive('findOrFail')->with(1)->andReturn($product); // Mock the 'findOrFail' method

        // Create an instance of the ProductController and inject the mock
        $controller = new ProductController($productMock);

        // Call the method under test
        $response = $controller->read($product);

        // Assertions
        $this->assertEquals('products.read', $response->name()); // Assert the view name
        $this->assertEquals($product, $response->getData()['product']);
    }

    // public function test

}
