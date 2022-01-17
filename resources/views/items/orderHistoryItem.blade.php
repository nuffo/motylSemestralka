<div class="d-flex order align-items-center justify-content-around pt-2 pb-2">
    <div>
        <span>{{ $order->created_at }}</span>
    </div>
    <div class="meals">
        @foreach ($ordersItems as $orderItem)
        @if ($orderItem->order_id == $order->id)
        <div class="d-flex flex-row justify-content-between align-items-center">
            <div class="">
                <span>{{ $orderItem->count }}x</span>
            </div>
            <div class="">
                <span>{{ $orderItem->name }}</span>
            </div>
            <div class="">
                <span>{{ number_format($orderItem->price, 2, ',','') }}€</span>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <div>
        <span class="orderPrice">{{ number_format($order->order_price, 2, ',','') }}€</span>
    </div>
</div>