const editName = document.getElementById('nameInput');
const editPrice = document.getElementById('priceInput');
const editDescription = document.getElementById('descriptionInput');

window.checkEditInputs = function () {
    let isValid = false;
    let validCount = 0;

    if (editName.value === '') {
        setError(editName, '* povinné pole');
    } else {
        setSuccess(editName);
        validCount++;
    }

    if (editPrice.value === '') {
        setError(editPrice, '* povinné pole');
    } else {
        setSuccess(editPrice);
        validCount++;
    }

    if (editDescription.value === '') {
        setError(editDescription, '* povinné pole');
    } else {
        setSuccess(editDescription);
        validCount++;
    }

    if (validCount === 3) {
        isValid = true;
    }

    return isValid;
}
