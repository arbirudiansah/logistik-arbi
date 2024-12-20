document.getElementById('item_code').addEventListener('change', function() {
    let itemCode = this.value;

    if (itemCode) {
        // Mengirimkan request AJAX untuk mendapatkan item_name berdasarkan itemCode
        fetch(`/get-item-name/${itemCode}`)
            .then(response => response.json())
            .then(data => {
                // Update input item_name dengan nama barang yang sesuai
                if (data.item_name) {
                    document.getElementById('item_name').value = data.item_name;
                } else {
                    document.getElementById('item_name').value = ''; // Clear if no item found
                }
            })
            .catch(error => {
                console.error("Error fetching item name:", error);
            });
    } else {
        document.getElementById('item_name').value = ''; // Clear item name jika tidak ada kode
    }
});
