const button = document.querySelectorAll('.destroyOrderBtn');
if (button) {
    for(let i = 0; i < button.length; i++) {
        const btn = button[i];
        const url = btn.dataset.url;
        btn.addEventListener('click', ()=>{
            deleteOrderItem(url, btn);
        });
    }
}

function deleteOrderItem(url, button) {
    window.axios.delete(url).then(
        (res)=>{
            console.log(res);
            if(res.data.status === 'success') {
                button.closest('.orderItem').remove();
                document.getElementById('order-price').querySelector('.number').textContent = Math.round(res.data.orderPrice * 100) / 100;
            }
        });
}