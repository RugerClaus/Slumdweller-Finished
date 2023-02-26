<?php

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class StripePaymentControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test Stripe checkout.
     *
     * @return void
     */
    public function testCheckout()
    {
        // Create a product in the cart
        $product = new Cart();
        $product->name = 'Test Product';
        $product->price = 9.99;
        $product->UserId = session()->getId();
        $product->save();

        // Make a request to checkout
        $response = $this->post('/checkout');

        // Check that the response is a redirect to Stripe checkout page
        $response->assertStatus(302);
        $response->assertRedirect();

        // Check that an order was created
        $order = Order::where('UserId', session()->getId())->first();
        $this->assertNotNull($order);
        $this->assertEquals($order->status, 'unpaid');
        $this->assertEquals($order->total_price, $product->price);

        // Check that the order items were saved correctly
        $line_items = json_decode($order->items, true);
        $this->assertCount(1, $line_items);
        $this->assertEquals($line_items[0]['price_data']['product_data']['name'], $product->name);
        $this->assertEquals($line_items[0]['price_data']['unit_amount'], $product->price * 100);
        return "This has posted successfully";
    }

    /**
     * Test Stripe checkout success.
     *
     * @return void
     */
    public function testCheckoutSuccess()
    {
        // Create a test order
        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = 9.99;
        $order->UserId = 'test_session_id';
        $order->items = '[{"price_data":{"currency":"usd","product_data":{"name":"Test Product","images":""},"unit_amount":999},"quantity":1}]';
        $order->save();

        // Make a request to checkout success with the test session ID
        $response = $this->get('/checkout/success?session_id=test_session_id');

        // Check that the response is successful
        $response->assertStatus(200);

        // Check that the order was updated to paid
        $order = Order::where('UserId', 'test_session_id')->first();
        $this->assertNotNull($order);
        $this->assertEquals($order->status, 'paid');
    }
}