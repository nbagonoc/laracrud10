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

    public function testIndexMethod()
    {
        // Create a mock of the Product model to simulate database behavior
        $productMock = Mockery::mock(Product::class);
        $productMock->shouldReceive('all')->andReturn(new Collection()); // Mock the all method to return an empty collection

        // Create an instance of the ProductController and inject the mock
        $controller = new ProductController($productMock);

        // Call the method under test
        $response = $controller->index();

        // Assertions
        $this->assertEquals('products.index', $response->getName()); // Assert the view name
        $this->assertInstanceOf(Collection::class, $response->getData()['products']); // Assert that 'products' is an instance of Collection
    }
}
