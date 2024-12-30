document.addEventListener('DOMContentLoaded', function() {
    // Create floating particles
    const particlesContainer = document.querySelector('.floating-particles');
    
    function createParticle() {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        // Random size between 2 and 6 pixels
        const size = Math.random() * 4 + 2;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // Random starting position
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        
        // Add animation
        particle.style.animation = `float ${Math.random() * 3 + 4}s linear infinite`;
        
        particlesContainer.appendChild(particle);
        
        // Remove particle after animation
        setTimeout(() => {
            particle.remove();
        }, 7000);
    }
    
    // Create particles periodically
    setInterval(createParticle, 300);
    
    // Form handling
    const contactForm = document.getElementById('contactForm');
    const submitBtn = contactForm.querySelector('.submit-btn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');
    const btnSuccess = submitBtn.querySelector('.btn-success');

    contactForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Show loading state
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline-block';
        submitBtn.disabled = true;

        try {
            const formData = new FormData(contactForm);
            const response = await fetch('/api/contact.php', {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                // Show success state
                btnLoading.style.display = 'none';
                btnSuccess.style.display = 'inline-block';
                contactForm.reset();
                
                // Reset button after 3 seconds
                setTimeout(() => {
                    btnSuccess.style.display = 'none';
                    btnText.style.display = 'inline-block';
                    submitBtn.disabled = false;
                }, 3000);
            } else {
                throw new Error('Form submission failed');
            }
        } catch (error) {
            console.error('Error:', error);
            // Reset button state on error
            btnLoading.style.display = 'none';
            btnText.style.display = 'inline-block';
            submitBtn.disabled = false;
            alert('There was an error sending your message. Please try again.');
        }
    });

    // Form input effects
    const formInputs = document.querySelectorAll('.contact-form input, .contact-form textarea');
    
    formInputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.style.borderColor = 'var(--accent-color)';
            input.style.boxShadow = '0 0 10px rgba(0, 196, 204, 0.2)';
        });
        
        input.addEventListener('blur', () => {
            if (!input.value) {
                input.style.borderColor = 'rgba(255, 255, 255, 0.2)';
                input.style.boxShadow = 'none';
            }
        });
    });
}); 