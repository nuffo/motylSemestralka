const button = document.querySelectorAll('.btnDeleteMeal');
if (button) {
    for(let i = 0; i < button.length; i++) {
        const deleteBtn = button[i];
        const deleteUrl = deleteBtn.dataset.url;
        deleteBtn.addEventListener('click', ()=>{
            deleteMeal(deleteUrl, deleteBtn);
        });
    }
}

function deleteMeal(url, button) {
    window.axios.delete(url).then(
        (res)=>{
            console.log(res);
            if(res.data.status === 'success') {
                button.closest('.meal').remove();
            }
        });
}