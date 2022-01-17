<div class="row meal">
    <img src="{{ asset("images/".$meal->imagePath) }}" alt="Meal" class="img-thumbnail" />
    <div class="description">
        <h3 class="title">{{ $meal->name }}</h3>
        <p class="ingredients">{{ $meal->description }}</p>
    </div>
    <p class="price">{{ number_format($meal->price, 2, ',','') }}€</p>
    @if(Auth::check())
    @if(Auth::user()->role === 'admin')
        <div class="buttons">
            <button type="button" data-meal="{{ $meal->toJson() }}" data-edit-url="{{ route('menu.update', $meal->id) }}" class="btn btnEditMeal" data-bs-toggle="modal" data-bs-target="#editMealModal">
                <i class="far fa-edit edit"></i>
            </button>
            {{--<a href="{{ route('menu.update', $meal->id) }}"><i class="far fa-edit edit"></i></a>--}}
            <form action="{{ route('menu.destroy', $meal->id) }}" method="post">
                @csrf
                @method("delete")
                <button class="btn btnDeleteMeal" type="submit"><i class="far fa-trash-alt delete"></i></button>
            </form>
        </div>
    @else
    <div class="addToOrder">
        <form method="post" action="{{ route('order.store') }}">
            @csrf
            <input type="hidden" name="meal_id" value="{{ $meal->id }}">
            <button type="submit" class="btn"><i class="fas fa-plus"></i></button>
        </form>
    </div>
    @endif
    @endif
    
    
</div>
