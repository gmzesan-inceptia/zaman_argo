<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a sale can be created successfully', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $product = Product::create([
        'name' => 'Test Product',
        'purchase_price' => 80,
        'sell_price' => 100,
        'stock' => 50,
    ]);

    $response = $this->post('/dashboard/sales', [
        'products' => [$product->id],
        'quantities' => [2],
        'discount' => 10,
        'paid' => 150,
    ]);

    $response->assertRedirect();

    $this->assertDatabaseHas('sales', [
        'subtotal' => 200,
        'discount' => 10,
        'vat' => 9.5,
        'total' => 199.5,
        'paid' => 150,
        'due' => 49.5,
    ]);
});
