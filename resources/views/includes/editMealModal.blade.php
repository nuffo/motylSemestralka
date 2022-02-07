<div class="modal fade" id="editMealModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Edit - </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container newMeal">
                    <form method="post" enctype="multipart/form-data" id="editMealForm" onsubmit="return checkEditInputs();">
                        @csrf
                        @method("put")
                        <div>
                            <label for="nameInput" class="form-label">Názov</label>
                            <input type="text" class="form-control" id="nameInput" name="name">
                            <small></small>
                        </div>
                        <div>
                            <label for="priceInput" class="form-label">Cena</label>
                            <input type="number" step="0.01" class="form-control" id="priceInput" name="price">
                            <small></small>
                        </div>
                        <div>
                            <label for="descriptionInput" class="form-label">Popis</label>
                            <input type="text" class="form-control" id="descriptionInput" name="description">
                            <small></small>
                        </div>
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