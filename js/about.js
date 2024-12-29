document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, {
        threshold: 0.1
    });

    // Observe elements
    document.querySelectorAll('.value-card, .timeline-item').forEach(el => {
        observer.observe(el);
    });

    // Initialize neural network animation
    createNeuralNetwork();
}); 