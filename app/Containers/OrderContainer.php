<?php

namespace App\Containers;
use App\Models\Meal;

class OrderContainer
{
    private array $orderItemContainers;
    private float $orderPrice;

    private function __construct(array $orderItemContainers)
    {
        $this->orderItemContainers = $orderItemContainers;
        $this->orderPrice = $this->calculateOrderPrice();
    }

    public static function build(array $orderItemContainers): self
    {
        return new self(
            $orderItemContainers
        );
    }

    public function getOrderItemContainers(): array
    {
        return $this->orderItemContainers;
    }

    public function getOrderPrice(): float 
    {
        return $this->orderPrice;
    }

    public function orderItemsToArray(): array
    {
        $output = [];
        foreach($this->getOrderItemContainers() as $orderItemContainer)
        {
            $output[] = $orderItemContainer->toArray();
        }

        return $output;
    }

    private function calculateOrderPrice(): float 
    {
        $price = 0;
        foreach($this->getOrderItemContainers() as $orderItemContainer) {
            $price += $orderItemContainer->getTotalPrice();
        } 

        return $price;
    }
}
