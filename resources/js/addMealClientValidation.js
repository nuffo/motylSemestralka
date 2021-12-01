const name = document.getElementById('addNameInput');
const price = document.getElementById('addPriceInput');
const description = document.getElementById('addDescriptionInput');
const imagePath = document.getElementById('addImageInput');

window.checkAddInputs = function () {
    let isValid = false;
    let validCount = 0;

    if (name.value === '') {
        setError(name, '* povinné pole');
    } else {
        setSuccess(name);
        validCount++;
    }

    if (price.value === '') {
        setError(price, '* povinné pole');
    } else {
        setSuccess(price);
        validCount++;
    }

    if (description.value === '') {
        setError(description, '* povinné pole');
    } else {
        setSuccess(description);
        validCount++;
    }

    if (imagePath.files.length === 0) {
        setError(imagePath, '* povinné pole');
    } else {
        setSuccess(imagePath);
        validCount++;
    }

    if (validCount === 4) {
        isValid = true;
    }

    return isValid;
}

function setError(input, message) {
    const parent = input.parentElement;
    const small = parent.querySelector('small');

    small.innerText = message;
    parent.className = 'error';
}

function setSuccess(input) {
    const parent = input.parentElement;
    const small = parent.querySelector('small');
    small.innerText = '';
    parent.className = 'success';
}
