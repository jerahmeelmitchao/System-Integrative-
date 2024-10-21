
    document.addEventListener('DOMContentLoaded', function () {
        const errorMessages = document.getElementById('error-messages');

        // Check if there are any error messages
        if (errorMessages && errorMessages.childElementCount > 0) {
            // Display the error messages
            errorMessages.style.display = 'block';

            // Set a timeout to hide the messages after 2 seconds
            setTimeout(() => {
                errorMessages.style.display = 'none';
            }, 1000);
        }

        // Add an event listener to the form to hide messages when submitting
        document.getElementById('login-form').addEventListener('submit', function() {
            if (errorMessages) {
                errorMessages.style.display = 'none'; // Hide error messages when form is submitted
            }
        });
    });
