//=============  Quantity   =============

document.addEventListener('DOMContentLoaded', function() {
  const minusBtn = document.getElementById('minus-btn');
  const plusBtn = document.getElementById('plus-btn');
  const quantityInput = document.getElementById('quantity-input');

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
