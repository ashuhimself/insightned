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
    
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('.submit-btn, .footer-submit-btn');
            const loadingSpinner = submitBtn.querySelector('.btn-loading');
            const successIcon = submitBtn.querySelector('.btn-success');
            const btnText = submitBtn.querySelector('.btn-text');
            
            try {
                btnText.style.display = 'none';
                loadingSpinner.style.display = 'inline-block';
                
                const formData = new FormData(this);
                const jsonData = {};
                formData.forEach((value, key) => {
                    jsonData[key] = value;
                });
                const response = await fetch('/api/contact.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(jsonData)
                });
                
                const data = await response.json();
                
                if (data.success) {
                    loadingSpinner.style.display = 'none';
                    successIcon.style.display = 'inline-block';
                    alert(data.message || 'Message sent successfully');
                    this.reset();
                    
                    setTimeout(() => {
                        successIcon.style.display = 'none';
                        btnText.style.display = 'inline-block';
                    }, 3000);
                } else {
                    throw new Error(data.error || 'Failed to send message');
                }
            } catch (error) {
                alert('We will get back to you shortly.');
                loadingSpinner.style.display = 'none';
                btnText.style.display = 'inline-block';
            }
        });
    }

    // Tech stack slider
    const slider = document.querySelector('.slider');
    const sliderTrack = document.querySelector('.slider-track');
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
    });

    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
    });

    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 3; //scroll-fast
        slider.scrollLeft = scrollLeft - walk;
    });
});