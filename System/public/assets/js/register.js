
// Hide error messages after 2 seconds
document.addEventListener('DOMContentLoaded', function () {
    const errorMessages = document.getElementById('error-messages');

    // Check if there are any error messages
    if (errorMessages && errorMessages.childElementCount > 0) {
        // Display the error messages
        errorMessages.style.display = 'block';

        // Set a timeout to hide the messages after 2 seconds
        setTimeout(() => {
            errorMessages.style.display = 'none';
        }, 2000);
    }

    // Add an event listener to the form to hide messages when submitting
    document.getElementById('registration-form').addEventListener('submit', function() {
        errorMessages.style.display = 'none'; // Hide error messages when form is submitted
    });
});
