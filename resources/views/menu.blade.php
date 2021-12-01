@extends("layouts.master")
@section("pagecontent")
<div class="container mealmenu">
    <h1>- Menu -</h1>
    @foreach($meals as $meal)
        @include("items.mealItem", compact("meal"))
    @endforeach
    {{--<a href="{{ route("menu.create") }}"><i class="fas fa-plus-circle addmeal"></i></a>--}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btnAddMeal" data-bs-toggle="modal" data-bs-target="#addNewMealModal">
        <i class="fas fa-plus-circle addmeal"></i>
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="addNewMealModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nové jedlo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container newMeal">
                    <form method="post" action="{{ route("menu.store") }}" enctype="multipart/form-data" id="newMealForm" onsubmit="return checkAddInputs();">
                        @csrf
                        <div class="">
                            <label for="addNameInput" class="form-label">Názov</label>
                            <input type="text" class="form-control" id="addNameInput" name="name">
                            <small></small>
                        </div>
                        <div class="">
                            <label for="addPriceInput" class="form-label">Cena</label>
                            <input type="number" step="0.01" class="form-control" id="addPriceInput" name="price">
                            <small></small>
                        </div>
                        <div class="">
                            <label for="addDescriptionInput" class="form-label">Popis</label>
                            <input type="text" class="form-control" id="addDescriptionInput" name="description">
                            <small></small>
                        </div>
                        <div class="">
                            <label for="addImageInput" class="form-label">Obrázok</label>
                            <input type="file" class="form-control" id="addImageInput" name="image">
                            <small></small>
                        </div>
                        {{--<button type="submit" class="btn btn-primary" name="submit">Submit</button>--}}
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Späť</button>
                <button type="submit" class="btn btn-success" name="submit" form="newMealForm">Pridať</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editMealModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Edit - </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container newMeal">
                    <form method="post" action="" enctype="multipart/form-data" id="editMealForm" onsubmit="return checkEditInputs();">
                        @csrf
                        @method("put")
                        <div class="">
                            <label for="nameInput" class="form-label">Názov</label>
                            <input type="text" class="form-control" id="nameInput" name="name">
                            <small></small>
                        </div>
                        <div class="">
                            <label for="priceInput" class="form-label">Cena</label>
                            <input type="number" step="0.01" class="form-control" id="priceInput" name="price">
                            <small></small>
                        </div>
                        <div class="">
                            <label for="descriptionInput" class="form-label">Popis</label>
                            <input type="text" class="form-control" id="descriptionInput" name="description">
                            <small></small>
                        </div>
                        {{--<button type="submit" class="btn btn-primary" name="submit">Submit</button>--}}
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Späť</button>
                <button type="submit" class="btn btn-success" name="submit" form="editMealForm">Upraviť</button>
            </div>
        </div>
    </div>
</div>
@endsection

