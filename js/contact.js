 // Check if the URL has a success parameter
 const urlParams = new URLSearchParams(window.location.search);
 const success = urlParams.get('success');

 // If the success parameter is present, display the success message
 if (success) {
     alert("Message sent successfully!");
 }

