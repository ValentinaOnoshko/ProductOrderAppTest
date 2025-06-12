<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with(['product.category'])->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create(): View
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'status' => 'in:новый,выполнен',
            'comment' => 'nullable|string',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $validated['order_date'] = now();

        Order::create($validated);

        return redirect()->route('orders.index')
            ->with('success', 'Заказ создан');
    }

    public function show(Order $order): View
    {
        return view('orders.show', compact('order'));
    }

    public function updateStatus(Order $order): RedirectResponse
    {
        $order->update(['status' => 'выполнен']);
        return redirect()->back()->with('success', 'Статус заказа изменён на "выполнен"');
    }
}
