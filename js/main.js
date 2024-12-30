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
    
    // Fetch CSRF token
    fetch('api/csrf.php', {
        method: 'GET',
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
        .then(response => response.json())
        .then(data => {
            document.getElementById('csrf_token').value = data.token;
            console.log('CSRF token set:', data.token);
            document.cookie = `csrf_token=${data.token}; path=/; secure; samesite=Lax`;
        })
        .catch(error => {
            console.error('Error fetching CSRF token:', error);
        });
    
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
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
                
                const csrfToken = document.cookie.split('; ')
                    .find(row => row.startsWith('csrf_token='))
                    ?.split('=')[1];
                if (csrfToken) {
                    formData.set('csrf_token', csrfToken);
                }
                
                const response = await fetch('api/contact.php', {
                    method: 'POST',
                    body: formData,
                    credentials: 'same-origin'
                });
                
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
    }
}); 