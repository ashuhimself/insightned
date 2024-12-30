document.addEventListener('DOMContentLoaded', function() {
    const textLines = document.querySelectorAll('.text-line');
    
    // Function to check if element is in viewport
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
    
    // Function to animate text lines
    function animateTextLines() {
        textLines.forEach((line, index) => {
            if (isInViewport(line)) {
                // Add delay based on index
                setTimeout(() => {
                    line.classList.add('animate');
                }, index * 200); // 200ms delay between each line
            }
        });
    }
    
    // Initial check
    animateTextLines();
    
    // Check on scroll
    window.addEventListener('scroll', animateTextLines);
    
    // Generate CSRF token
    function generateCSRFToken() {
        return Math.random().toString(36).substring(2) + Date.now().toString(36);
    }
    
    // Set CSRF token when page loads
    const token = generateCSRFToken();
    document.cookie = `csrf_token=${token}; path=/; SameSite=Strict; Secure`;
    const csrfInputs = document.querySelectorAll('input[name="csrf_token"]');
    csrfInputs.forEach(input => input.value = token);
    
    function sanitizeInput(input) {
        return input.replace(/[<>]/g, function(match) {
            return match === '<' ? '&lt;' : '&gt;';
        });
    }
    
    document.getElementById('contactForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = this.querySelector('.footer-submit-btn');
        const loadingSpinner = submitBtn.querySelector('.btn-loading');
        const successIcon = submitBtn.querySelector('.btn-success');
        const btnText = submitBtn.querySelector('.btn-text');
        
        try {
            // Show loading state
            btnText.style.display = 'none';
            loadingSpinner.style.display = 'inline-block';
            
            const formData = new FormData(this);
            
            const response = await fetch(
                window.location.pathname.includes('/services/') ? '../api/contact.php' : 'api/contact.php',
                {
                    method: 'POST',
                    body: formData
                }
            );
            
            const data = await response.json();
            
            if (data.success) {
                // Show success state
                loadingSpinner.style.display = 'none';
                successIcon.style.display = 'inline-block';
                this.reset();
                
                setTimeout(() => {
                    successIcon.style.display = 'none';
                    btnText.style.display = 'inline-block';
                }, 3000);
            } else {
                throw new Error(data.error);
            }
            
        } catch (error) {
            alert('Error: ' + error.message);
            loadingSpinner.style.display = 'none';
            btnText.style.display = 'inline-block';
        }
    });
}); 