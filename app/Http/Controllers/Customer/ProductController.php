<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list($filter = null)
    {
        $products = Product::all();
        if (!empty($filter)) {
            $products = Product::where('category_id', $filter)->get();
        }
        return view('home', compact('products'));
    }

    # Order Press for product
    public function pressOrder($productId)
    {
        $product = Product::find($productId);
        # Check already press
        if (Order::where('product_id', $productId)->where('user_id', auth()->user()->id)->exists()) {
            return back()->with('error', 'Already added in cart');
        }
        if ($product) {
            $orderPress = Order::create([
                'user_id'    => auth()->user()->id,
                'product_id' => $product->id ?? $productId,
                'price'      => $product->price ?? 0.00,
            ]);

            if ($orderPress) {
                return back()->with('success', 'Order pressed successfully!');
            } else {
                return back()->with('error', 'oppoos, Something went wrong');
            }
        }
    }

    # get press orders
    public function checkout()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('checkout', compact('orders'));
    }
}
