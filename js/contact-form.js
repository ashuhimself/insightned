document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const submitBtn = form.querySelector('.submit-btn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');
    const btnSuccess = submitBtn.querySelector('.btn-success');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Show loading state
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline-block';
        
        const data = {
            name: form.querySelector('#name').value.trim(),
            email: form.querySelector('#email').value.trim(),
            message: form.querySelector('#message').value.trim(),
            phone: form.querySelector('#phone').value.trim()
        };
        
        // Validate form data
        if (!data.name || !data.email || !data.message) {
            const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message';
                errorDiv.textContent = 'Please fill in all required fields.';
                form.insertBefore(errorDiv, form.firstChild);
                setTimeout(() => errorDiv.remove(), 5000);
            btnLoading.style.display = 'none';
            btnText.style.display = 'inline-block';
            return;
        }
        
        try {
            const response = await fetch('api/contact.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            });
            
            const result = await response.json();
            
            if (!response.ok) {
                throw new Error(`Server error (${response.status})`);
            }
            if (!result.success) {
                throw new Error(result.message || 'Form submission failed');
            }
            
            // Show success state
                btnLoading.style.display = 'none';
                btnSuccess.style.display = 'inline-block';
                form.reset();
                
                // Reset button state after 3 seconds
                setTimeout(() => {
                    btnSuccess.style.display = 'none';
                    btnText.style.display = 'inline-block';
                }, 3000);
        } catch (error) {
            // Reset button state
            btnLoading.style.display = 'none';
            btnText.style.display = 'inline-block';
            
            // Show error message
            const errorDiv = document.createElement('div');
            errorDiv.className = 'error-message';
            errorDiv.textContent = error.message || 'There was an error submitting your message. Please try again.';
            form.insertBefore(errorDiv, form.firstChild);
            setTimeout(() => errorDiv.remove(), 5000);
            console.error('Form submission error:', error);
        }
    });
});