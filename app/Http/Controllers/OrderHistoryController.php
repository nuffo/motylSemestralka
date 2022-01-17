<?php

namespace App\Http\Controllers;

use App\Retrievers\OrderItemsRetriever;
use App\Containers\OrderContainer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $orders = Order::where('user_id', $user_id)->get();
        $ordersItems = new Collection();

        foreach($orders as $order) {
            $ordersItems = $ordersItems->merge(OrderItem::where('order_id' , $order['id'])->get());
        }

        return view("orderHistory", [
            "orders" => $orders,
            "ordersItems" => $ordersItems,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->getAuthIdentifier();
        $orderItemsRetriever = new OrderItemsRetriever();
        $orderItemsContainers = $orderItemsRetriever->retrieve();

        $orderContainer = OrderContainer::build($orderItemsContainers);

        $order = new Order([
            'user_id' => $user_id,
            'order_price' => $orderContainer->getOrderPrice(),
        ]);
        $order->save();

        foreach ($orderItemsContainers as $orderItemsContainer) {
            $orderItem = new OrderItem([
                'name' => $orderItemsContainer->getMeal()->name,
                'count' => $orderItemsContainer->getCount(),
                'price' => $orderItemsContainer->getTotalPrice(),
                'order_id' => $order->getAttribute('id'),
            ]);
            $orderItem->save();
        }

        $request->session()->forget('order');

        return redirect()->route('homepage')->with('Objednávka bola zaznamenaná.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
