<?php
namespace App\Retrievers;
use App\Models\Meal;
use App\Containers\OrderItemContainer;

class OrderItemsRetriever
{

    public function retrieve(): array
    {
        $order = session()->get('order');
        $orderItemsContainers = [];
        if($order && count($order) > 0){
            foreach($order as $orderItem){
                $meal = Meal::find($orderItem['meal_id']);    
                $orderContainer = OrderItemContainer::build($meal, $orderItem['count'], $orderItem['total_price']);
                $orderItemsContainers[$meal->id] = $orderContainer;    
            }
        }

        return $orderItemsContainers;
    }
    
}
