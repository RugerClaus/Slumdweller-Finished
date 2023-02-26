<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripePaymentController extends Controller
{


    public function checkout(Request $request)
    {
        // Set Stripe API key
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        // Get products from the cart and calculate total price
        $products = Cart::all()->where('UserId', session()->getId());
        $total_price = 0;
        foreach ($products as $product) {
            $total_price += $product->price;
        }

        // Create line items array
        $line_items = [];
        foreach ($products as $product) {
            array_push($line_items, [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                        'images' => $product->image1
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => 1,
            ]);
        }

        // Create Stripe checkout session
        $session = \Stripe\Checkout\Session::create([
            'mode' => 'payment',
            'line_items' => $line_items,
            'success_url' => route('checkout.success', [], true) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        // Save order to database
    

        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = $total_price;
        $order->UserId = $session->id;
        for($i = 0; $i < count($line_items); $i++)
        {
        $order->items = json_encode($line_items);
        }
        $order->save();

        Cart::all()->where('UserId', session()->getId())->delete();
        // Redirect to Stripe checkout page
        return redirect($session->url);
    }


    public function success(Request $request) 
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $sessionId = $request->get('session_id');

    
        $session = \Stripe\Checkout\Session::retrieve($sessionId);
        $order = Order::where('UserId', $session->id)->where('status', 'unpaid')->first();
        if(!$order) {
            throw new NotFoundHttpException();
        }
        if($order && $order->status === 'unpaid') {
            $order->status = 'paid';
            $order->save();

            // Send email notification
            $to = 'example@example.com'; // Set your email address here
            $subject = 'New Order: #' . $order->id;
            $message = 'Items: ' . $order->items . ' ' . $order->total_price;
            mail($to, $subject, $message);
        }
        
        return view('payments.success',["order" => json_encode($order)]);
    }

    public function cancel() 
    {

    }
    public function webhook() 
    {

        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
        } catch(\UnexpectedValueException $e) {
        // Invalid payload
        return response('Payment could not be processed at this time. Please contact your financial institution.',400);
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        return response('',400);
        }

        // Handle the event
        switch ($event->type) {
        case 'checkout.session.completed':
            $session = $event->data->object;
            $sessionId = $session->id;
            $order = Order::where('UserId', $session->id)->first();
            if(!$order) {
                throw new NotFoundHttpException();
            }
            if($order && $order->status === 'unpaid') {
                $order->status = 'paid';
                $order->save();
            }
            
        // ... handle other event types
        default:
            echo 'Received unknown event type ' . $event->type;
        }

        http_response_code(200);
        }
}
