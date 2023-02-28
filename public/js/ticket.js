const form = document.querySelector('.ticket');
const select = document.querySelector('.selector');

form.addEventListener('submit', (e) => {
    e.preventDefault(); // add this line
    if (select.value === 'selector') {
        alert('Please select an option from the dropdown menu');
    }
    else {
        form.submit();
    }
});
