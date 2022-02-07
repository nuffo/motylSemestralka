@extends("layouts.master")
@section("pagecontent")
<div class="container mealmenu">
    <h1>- Menu -</h1>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @foreach($meals as $meal)
        @include("items.mealItem", compact("meal"))
    @endforeach
    {{--<a href="{{ route("menu.create") }}"><i class="fas fa-plus-circle addmeal"></i></a>--}}
    <!-- Button trigger modal -->
    @if(Auth::check())
    @if(Auth::user()->role === 'admin')
    <button type="button" class="btn btnAddMeal" data-bs-toggle="modal" data-bs-target="#addNewMealModal">
        <i class="fas fa-plus-circle addmeal"></i>
    </button>
    @endif
    @endif
</div>

@if(Auth::check())
@if(Auth::user()->role === 'admin')
    @include('includes.addNewMealModal')
    @include('includes.editMealModal')
@endif
@endif

@endsection