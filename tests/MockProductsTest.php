<?php

use App\ProductRepository;
use PHPUnit\Framework\TestCase;

/** @group db */
class MockProductsTest extends TestCase
{
  public function testMockProductsAreReturned()
  {
    $mockRepo = $this->createMock(ProductRepository::class);

    $mockProductsArray = [
      ['id' => 1, 'name' => 'cho'],
      ['id' => 2, 'name' => 'lee']
    ];

    $mockRepo->method('fetchProducts')->willReturn($mockProductsArray);

    $products = $mockRepo->fetchProducts();

    $this->assertEquals('cho', $products[0]['name']);
  }
}