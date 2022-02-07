const button = document.querySelectorAll('.plusBtn, .minusBtn');
if (button) {
    for(let i = 0; i < button.length; i++) {
        const incBtn = button[i];
        const url = incBtn.dataset.url;
        const operation = incBtn.dataset.operation;
        incBtn.addEventListener('click', ()=>{
            changeCount(url, operation, incBtn);
        });
    }
}

function changeCount(url, operation, button) {
    window.axios.put(url, {
        operation: operation
    }).then(
        (res)=>{
            console.log(res);
            button.closest('.orderItemCount').querySelector('.mealCount').textContent = res.data.count + 'x';
            const parent = button.closest('.orderItem');
            parent.querySelector('.totalPrice').textContent = Math.round(res.data.totalPrice * 100) / 100;
            
            document.getElementById('order-price').querySelector('.number').textContent = Math.round(res.data.orderPrice * 100) / 100;
        });
}