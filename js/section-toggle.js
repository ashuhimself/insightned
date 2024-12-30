document.addEventListener('DOMContentLoaded', function() {
    const industriesSection = document.getElementById('industries');
    const techStackSection = document.getElementById('tech-stack');
    
    // Start with Industries section
    industriesSection.classList.add('active');
    techStackSection.classList.remove('active');
    
    // Toggle sections every 5 seconds
    setInterval(() => {
        // Fade out current section
        if (industriesSection.classList.contains('active')) {
            industriesSection.classList.remove('active');
            setTimeout(() => {
                techStackSection.classList.add('active');
            }, 400); // Half of the transition time
        } else {
            techStackSection.classList.remove('active');
            setTimeout(() => {
                industriesSection.classList.add('active');
            }, 400); // Half of the transition time
        }
    }, 3000);  // 5000ms = 5 seconds
}); 