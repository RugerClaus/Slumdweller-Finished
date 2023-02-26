// Define a function to get the orders from the API
async function getOrders() {
    const response = await fetch('/api/orders');
    const data = await response.json();
    return data;
  }
  
  // Define a function to format the items data
  function formatItems(items) {
    const itemsArr = JSON.parse(items);
    let itemsStr = '';
  
    itemsArr.forEach(item => {
      itemsStr += `<tr>
                     <td>${item.price_data.product_data.name}</td>
                     <td>${item.price_data.currency} ${item.price_data.unit_amount / 100}</td>
                     <td>${item.quantity}</td>
                   </tr>`;
    });
  
    return `<table>${itemsStr}</table>`;
  }
  
  // Wait for the DOM to be loaded
  document.addEventListener('DOMContentLoaded', async () => {
    // Get the table body element
    const tbody = document.querySelector('tbody');
  
    // Get the orders from the API
    const orders = await getOrders();
  
    // Loop through the orders and create table rows
    orders.forEach(order => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${order.id}</td>
        <td>${formatItems(order.items)}</td>
        <td>${order.total_price}</td>
        <td>${order.status}</td>
        <td>${order.UserId}</td>
        <td>${order.created_at}</td>
        <td>${order.updated_at}</td>
      `;
      tbody.appendChild(tr);
    });
  });
  