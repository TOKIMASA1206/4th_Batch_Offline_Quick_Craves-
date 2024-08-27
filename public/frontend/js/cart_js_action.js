//=============  Quantity   =============
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.quantity_btn').forEach(function(buttonsContainer) {
      const minusBtn = buttonsContainer.querySelector('[data-action="minus"]');
      const plusBtn = buttonsContainer.querySelector('[data-action="plus"]');
      const quantityInput = buttonsContainer.querySelector('input[type="text"]');
      
      minusBtn.addEventListener('click', function() {
          let currentValue = parseInt(quantityInput.value);
          if (currentValue > 1) {
              quantityInput.value = currentValue - 1;
          }
      });

      plusBtn.addEventListener('click', function() {
          let currentValue = parseInt(quantityInput.value);
          quantityInput.value = currentValue + 1;
      });
  });
});

