document.addEventListener('DOMContentLoaded', function () {
    // Select all input fields
    const inputs = document.querySelectorAll('input');

    // Add event listeners to each input field
    inputs.forEach(input => {
        input.addEventListener('focus', function () {
            // Remove error messages when the user starts typing
            const errorMessages = document.querySelector('.alert-danger');
            if (errorMessages) {
                errorMessages.remove();
            }
        });
    });
});
