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