@extends("layouts.master")
@section("pagecontent")
<div class="container text-center">
    <h1>- Objednávka -</h1>
    @if (empty($orderItems))
        <p class="mt-5 noOrder">Zatial si si nič nevybral. Jedlá si môžeš vyberať z nášho <a href="{{ route('menu.index') }}">menu</a>.</p>
    @else
        <div class="d-flex orderTable mt-4 justify-content-around">
            <div>
                <h4>Názov jedla</h4>
            </div>
            <div>
                <h4>Počet</h4>
            </div>
            <div>
                <h4>Cena (€)</h4>
            </div>
            <div>
                
            </div>
        </div>
        <div class="orderItems">
            @foreach($orderItems as $orderItem)
            @include("items.orderItem", compact("orderItem"))
            @endforeach
        </div>
        <h4 class="mt-4 orderPrice mb-4"><span>Celková cena objednávky: </span>{{ number_format($orderPrice, 2, ',','') }} €</h4>
        <form method="post" action="{{ route('order-history.store') }}">
            @csrf
            <button type="submit" class="btn btn-success">Objednať</button>
        </form>
    @endif
</div>
@endsection