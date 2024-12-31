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
            
            fetch('/api/contact.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    btnLoading.style.display = 'none';
                    btnSuccess.style.display = 'inline-block';
                    this.reset();
                    setTimeout(() => {
                        btnSuccess.style.display = 'none';
                        btnText.style.display = 'inline-block';
                    }, 3000);
                } else {
                    throw new Error(data.error || 'Failed to send message');
                }
            })
            .catch(error => {
                alert('We will get back to you shortly.');
                btnLoading.style.display = 'none';
                btnText.style.display = 'inline-block';
            });
        });
    }
});