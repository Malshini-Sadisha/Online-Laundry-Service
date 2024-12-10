function validateForm() {
  // Get form field values
  var cardNumber = document.getElementsByName("cardNumber")[0].value;
  var expiryMonth = document.getElementById("Month").value;
  var expiryYear = document.getElementById("Year").value;
  var name = document.getElementById("Cardholder-name").value;
  var cvv = document.getElementById("CVV").value;

  // Perform form validation
  if (cardNumber.length !== 16 || isNaN(cardNumber)) {
    alert("Please enter a valid 16-digit card number");
    return false;
  }

  if (expiryMonth.length !== 2 || isNaN(expiryMonth)) {
    alert("Please enter a valid 2-digit expiry month");
    return false;
  }

  if (expiryYear.length !== 2 || isNaN(expiryYear)) {
    alert("Please enter a valid 2-digit expiry year");
    return false;
  }

  if (name.trim() === "") {
    alert("Please enter the cardholder name");
    return false;
  }

  if (cvv.length !== 3 || isNaN(cvv)) {
    alert("Please enter a valid 3-digit CVV");
    return false;
  }

  // Form is valid, proceed with submission
  alert("Payment successful!");
  return true;
}
