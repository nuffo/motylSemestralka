<?php

namespace App\Containers;
use App\Models\Meal;

class OrderItemContainer
{

    private Meal $meal;
    private int $count;
    private float $total_price;

    private function __construct(Meal $meal, int $count, float $total_price)
    {
        $this->meal = $meal;
        $this->count = $count;
        $this->total_price = $total_price;
    }

    public static function build(Meal $meal, int $count, float $total_price): self
    {
        return new self(
            $meal,
            $count,
            $total_price
        );
    }

    public function incrementCount(): void
    {
        $this->count++;
        $this->recalculateTotalPrice();
    }

    public function decrementCount(): void
    {
        if ($this->getCount() > 1)
        {
            $this->count--;
            $this->recalculateTotalPrice();
        }
    }

    public function getMeal(): Meal
    {
        return $this->meal;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getTotalPrice(): float
    {
        return $this->total_price;
    }

    private function recalculateTotalPrice(): void
    {
        $this->total_price = $this->getMeal()->price * $this->getCount();
    }

    public function toArray(): array
    {
        return [
            'meal_id' => $this->getMeal()->id,
            'count' => $this->getCount(),
            'total_price' => $this->getTotalPrice()
        ];
    }

}
