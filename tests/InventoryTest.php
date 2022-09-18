<?php

use App\Inventory;
use App\ProductRepository;
use PHPUnit\Framework\TestCase;

class InventoryTest extends TestCase
{
  /** @group db */
  public function testProductsCanBeSet()
  {
    // Setup
    $mockRepo = $this->createMock(ProductRepository::class);

    $inventory = new Inventory($mockRepo);

    $mockProductsArray = [
      ['id' => 1, 'name' => 'cho'],
      ['id' => 2, 'name' => 'lee']
    ];

    $mockRepo->expects($this->exactly(1))->method('fetchProducts')->willReturn($mockProductsArray);

    // Do something
    $inventory->setProducts();

    // Make assertions
    $this->assertEquals('cho', $inventory->getProducts()[0]['name']);
    $this->assertEquals('lee', $inventory->getProducts()[1]['name']);
  }
}