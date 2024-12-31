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
        
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        
        try {
            const response = await fetch('api/contact.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            });
            
            const result = await response.json();
            
            if (result.success) {
                // Show success state
                btnLoading.style.display = 'none';
                btnSuccess.style.display = 'inline-block';
                form.reset();
                
                // Reset button state after 3 seconds
                setTimeout(() => {
                    btnSuccess.style.display = 'none';
                    btnText.style.display = 'inline-block';
                }, 3000);
            } else {
                throw new Error(result.message || 'Error submitting form');
            }
        } catch (error) {
            // Reset button state
            btnLoading.style.display = 'none';
            btnText.style.display = 'inline-block';
            
            // Show error message
            alert('There was an error submitting your message. Please try again.');
            console.error('Form submission error:', error);
        }
    });
});