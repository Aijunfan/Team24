function uploadProducts() {
    const input = document.getElementById('productsFile');
    if (!input.files[0]) {
        alert('请先选择一个文件。');
        return;
    }
    const file = input.files[0];
    const formData = new FormData();
    formData.append('productsFile', file);
    console.log(formData.get('productsFile'));
    fetch('upload_products.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
