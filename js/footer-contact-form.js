document.addEventListener('DOMContentLoaded', function() {
    const footerForm = document.querySelector('.footer-contact-form');
    
    if (footerForm) {
        footerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const btnText = this.querySelector('.btn-text');
            const btnLoading = this.querySelector('.btn-loading');
            const btnSuccess = this.querySelector('.btn-success');
            
            // Show loading state
            btnText.style.display = 'none';
            btnLoading.style.display = 'inline-block';
            
            const formData = {
                name: this.querySelector('#name').value,
                email: this.querySelector('#email').value,
                phone: this.querySelector('#phone').value,
                message: this.querySelector('#message').value
            };
            
            fetch('api/contact.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                // Hide loading state
                btnLoading.style.display = 'none';
                
                if (data.success) {
                    // Show success state
                    btnSuccess.textContent = "We will connect with you shortly";
                    btnSuccess.style.display = 'inline-block';
                    
                    // Reset form
                    footerForm.reset();
                    
                    // Reset button state after 5 seconds
                    setTimeout(() => {
                        btnSuccess.style.display = 'none';
                        btnText.style.display = 'inline-block';
                    }, 5000);
                } else {
                    throw new Error(data.message || 'An error occurred');
                }
            })
            .catch(error => {
                // Hide loading state
                btnLoading.style.display = 'none';
                btnText.style.display = 'inline-block';
                
                alert('Error: ' + error.message);
            });
        });
    }
});