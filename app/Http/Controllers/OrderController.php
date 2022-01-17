<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Containers\OrderItemContainer;
use App\Containers\OrderContainer;
use App\Retrievers\OrderItemsRetriever;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderItemsRetriever = new OrderItemsRetriever();
        $orderItemsContainers = $orderItemsRetriever->retrieve();
        $orderContainer = OrderContainer::build($orderItemsContainers);

        return view("order", ["orderItems" => $orderItemsContainers, "orderPrice" => $orderContainer->getOrderPrice()]);
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
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();
        $order = $request->session()->get('order');

        $orderItemsRetriever = new OrderItemsRetriever();
        $orderItemsContainers = $orderItemsRetriever->retrieve();
        
        $meal = Meal::find($data['meal_id']);
        if(isset($orderItemsContainers[$meal->id])) {
            $orderItemsContainers[$meal->id]->incrementCount();
        } else {
            $orderItemsContainers[$meal->id] = OrderItemContainer::build($meal, 1, $meal->price);
        }

        $orderContainer = OrderContainer::build($orderItemsContainers);
        $request->session()->put('order', $orderContainer->orderItemsToArray());
  
        return redirect()->route('menu.index')->with("success", "Jedlo bolo pridane do objednávky.");
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
        $orderItemsRetriever = new OrderItemsRetriever();
        $orderItemsContainers = $orderItemsRetriever->retrieve();

        $meal = Meal::find($id);
        if($request->operation == "increment") {
            $orderItemsContainers[$meal->id]->incrementCount();
        } else if($request->operation == "decrement") {
            $orderItemsContainers[$meal->id]->decrementCount();
        }

        $orderContainer = OrderContainer::build($orderItemsContainers);
        $request->session()->put('order', $orderContainer->orderItemsToArray());

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderItemsRetriever = new OrderItemsRetriever();
        $orderItemsContainers = $orderItemsRetriever->retrieve();

        unset($orderItemsContainers[$id]);

        $orderContainer = OrderContainer::build($orderItemsContainers);
        session()->put('order', $orderContainer->orderItemsToArray());

        return redirect()->route('order.index');
    }
}
