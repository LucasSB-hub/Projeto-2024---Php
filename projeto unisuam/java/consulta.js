document.addEventListener('DOMContentLoaded', function() {
    const itemList = document.getElementById('item-list');

    // Sample data
    const items = [
        { id: 1, name: 'Item 1' },
        { id: 2, name: 'Item 2' },
        { id: 3, name: 'Item 3' }
    ];

    // Function to render items
    function renderItems() {
        itemList.innerHTML = '';
        items.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.id}</td>
                <td>${item.name}</td>
                <td><button onclick="deleteItem(${item.id})">Delete</button></td>
            `;
            itemList.appendChild(row);
        });
    }

    // Function to delete item
    window.deleteItem = function(id) {
        const index = items.findIndex(item => item.id === id);
        if (index !== -1) {
            items.splice(index, 1);
            renderItems();
        }
    }

    // Initial render
    renderItems();
});
