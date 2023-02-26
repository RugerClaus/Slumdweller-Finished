// Get the elements
const hasVariantsSelect = document.querySelector('select[name="hasatts"]');
const variantContainer = document.querySelector('.variants-container');
const addVariantButton = document.querySelector('.add-variant-option');

// Hide the variant container on load
variantContainer.style.display = 'none';

// Listen for changes to the "Has Variants" select
hasVariantsSelect.addEventListener('change', () => {
  const selectedValue = hasVariantsSelect.value;

  // Show/hide the variant container based on the selected value
  if (selectedValue === 'yes') {
    variantContainer.style.display = 'block';
  } else {
    variantContainer.style.display = 'none';
  }
});

// Listen for clicks on the "Add Variant Option" button
addVariantButton.addEventListener('click', () => {
  const variantCount = variantContainer.querySelectorAll('.variant-option').length;

  // Only add a new variant option if there are less than 50 options
  if (variantCount < 50) {
    const newVariantOption = document.createElement('div');
    newVariantOption.classList.add('variant-option');
    const input = document.createElement('input');
    input.type = 'text';
    input.name = `option${variantCount + 1}`;
    input.placeholder = 'Variant:';
    newVariantOption.appendChild(input);
    variantContainer.appendChild(newVariantOption);

    // Align the "Add Variant Option" button with the newest input field
    addVariantButton.classList.remove('aligned');
    setTimeout(() => {
      addVariantButton.classList.add('aligned');
      const latestInput = variantContainer.querySelector('.variant-option:last-of-type input');
      const inputRect = latestInput.getBoundingClientRect();
      const buttonRect = addVariantButton.getBoundingClientRect();
      const topOffset = inputRect.top + inputRect.height / 2 - buttonRect.height / 2;
      addVariantButton.style.top = `${topOffset}px`;
    }, 0);
  }
});
