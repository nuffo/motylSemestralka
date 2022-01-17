@extends("layouts.master")
@section("pagecontent")
<div class="container text-center">
    <h1>- História objednávok -</h1>
    @if (empty($orders))
        <p class="mt-5 noOrder">Zatiaľ si si nič neobjednal.</p>
    @else
    <div class="orders">
        @foreach($orders as $order)
        @include("items.orderHistoryItem", compact("order"))
        @endforeach
    </div>
    @endif
</div>
@endsection