<div class="d-flex orderItem justify-content-around align-items-center pt-2 pb-2">
    <div>
        <span>{{ $orderItem->getMeal()->name }}</span>
    </div>
    <div class="d-flex flex-row justify-content-center orderItemCount">
        {{-- <form method="post" action="{{ route('order.update', $orderItem->getMeal()->id) }}">
            @csrf
            @method("PUT")
            <input type="hidden" name="operation" value="decrement">
            <button type="submit" class="btn minusBtn"><i class="fas fa-minus"></i></button>
        </form> --}}
        <button type="button" data-url="{{ route('order.update', $orderItem->getMeal()->id) }}" data-operation="decrement" class="btn minusBtn"><i class="fas fa-minus"></i></button>
        <span class="mealCount">{{ $orderItem->getCount() }}x</span>
        {{-- <form method="post" action="{{ route('order.update', $orderItem->getMeal()->id) }}">
            @csrf
            @method("PUT")
            <input type="hidden" name="operation" value="increment">
            <button type="submit" class="btn plusBtn"><i class="fas fa-plus"></i></button>
        </form> --}}
        <button type="button" data-url="{{ route('order.update', $orderItem->getMeal()->id) }}" data-operation="increment" class="btn plusBtn"><i class="fas fa-plus"></i></button>
    </div>
    <div>
        <span class="totalPrice">{{  number_format($orderItem->getTotalprice(), 2, ',','') }}</span>
    </div>
    <div>
        {{-- <form method="post" action="{{ route('order.destroy', $orderItem->getMeal()->id) }}">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn destroyOrderBtn"><i class="fas fa-times"></i></button>
        </form> --}}
        <button type="button" data-url="{{ route('order.destroy', $orderItem->getMeal()->id) }}" class="btn destroyOrderBtn"><i class="fas fa-times"></i></button>
    </div>
</div>