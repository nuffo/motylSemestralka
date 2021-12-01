const editButtons = document.querySelectorAll(".btnEditMeal");
const editModalLabel = document.getElementById("modalLabel");
const editForm = document.getElementById("editMealForm");
const editInputName = document.getElementById("nameInput");
const editInputPrice = document.getElementById("priceInput");
const editInputDescription = document.getElementById("descriptionInput");
for (let i = 0; i < editButtons.length; i++) {
    const button = editButtons[i];
    button.addEventListener("click", ()=>{
        changeModalValues(JSON.parse(button.dataset.meal), button.dataset.editUrl);
    })
}

function changeModalValues(meal, editUrl) {
    console.log(editInputName);
    editModalLabel.textContent = "Edit - " + meal.name;
    editForm.action = editUrl;
    editInputName.value = meal.name;
    editInputPrice.value = meal.price;
    editInputDescription.value = meal.description;
}
