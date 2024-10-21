const correctKey = "123$%^"; // Hidden admin key
let attempts = 0;
const maxAttempts = 3;

document.getElementById('proceedButton').addEventListener('click', function() {
    const userInput = document.getElementById('adminKeyInput').value;

    if (userInput === correctKey) {
        // Redirect to admin register page
        window.location.href = "{{ route('auth.adminregister') }}";
    } else {
        attempts++;
        document.getElementById('errorMessage').style.display = 'block';
        setTimeout(() => {
            document.getElementById('errorMessage').style.display = 'none';
        }, 1000); // Hide the error message after 1 second
        
        // Clear the input field
        document.getElementById('adminKeyInput').value = '';

        if (attempts >= maxAttempts) {
            // Disable the proceed button and register admin button
            document.getElementById('proceedButton').disabled = true;
            document.querySelector('.btn-success.w-100.fs-6[data-bs-toggle="modal"]').disabled = true; // Disable "Register as Admin" button
            
            // Show access denied modal
            const accessDeniedModal = new bootstrap.Modal(document.getElementById('accessDeniedModal'));
            accessDeniedModal.show();
        }
    }
});
