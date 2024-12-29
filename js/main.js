document.addEventListener('DOMContentLoaded', function() {
    const techContent = document.querySelector('.tech-content');
    const industriesContent = document.querySelector('.industries-content');
    const techHeader = document.querySelector('[data-section="tech"]');
    const industriesHeader = document.querySelector('[data-section="industries"]');

    function toggleSections() {
        techContent.style.transition = 'all 0.3s ease-in-out';
        industriesContent.style.transition = 'all 0.3s ease-in-out';

        techContent.classList.toggle('active');
        industriesContent.classList.toggle('active');
        techHeader.classList.toggle('active');
        industriesHeader.classList.toggle('active');

        setTimeout(() => {
            techContent.style.transition = '';
            industriesContent.style.transition = '';
        }, 300);
    }

    let autoSwitchInterval = setInterval(toggleSections, 3000);

    const techIndustriesSection = document.querySelector('#tech-industries');
    techIndustriesSection.addEventListener('mouseenter', function() {
        clearInterval(autoSwitchInterval);
    });

    techIndustriesSection.addEventListener('mouseleave', function() {
        autoSwitchInterval = setInterval(toggleSections, 3000);
    });

    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            clearInterval(autoSwitchInterval);
        } else {
            autoSwitchInterval = setInterval(toggleSections, 3000);
        }
    });
});

function createDigitalRain() {
    const container = document.querySelector('.digital-rain');
    const characters = '01アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲン';
    const columns = Math.floor(window.innerWidth / 20);

    for (let i = 0; i < columns; i++) {
        const column = document.createElement('div');
        column.className = 'rain-column';
        column.style.left = `${i * 20}px`;
        column.style.animationDelay = `${Math.random() * 8}s`;

        let rainText = '';
        const length = 20 + Math.floor(Math.random() * 30);
        for (let j = 0; j < length; j++) {
            rainText += characters[Math.floor(Math.random() * characters.length)];
        }
        column.textContent = rainText;
        container.appendChild(column);
    }
}

function createNeuralNetwork() {
    const container = document.querySelector('.neural-network');
    const nodeCount = 40;
    const nodes = [];

    // Create nodes
    for (let i = 0; i < nodeCount; i++) {
        const node = document.createElement('div');
        node.className = 'node';
        const x = Math.random() * 100;
        const y = Math.random() * 100;
        node.style.left = `${x}%`;
        node.style.top = `${y}%`;
        node.style.animationDelay = `${Math.random() * 1.5}s`;
        container.appendChild(node);
        nodes.push({ element: node, x, y });
    }

    // Create SVG connections
    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg.style.width = '100%';
    svg.style.height = '100%';
    svg.style.position = 'absolute';
    svg.style.top = '0';
    svg.style.left = '0';
    svg.style.opacity = '0.3';
    container.appendChild(svg);

    // Connect nearby nodes
    nodes.forEach((node1, i) => {
        nodes.slice(i + 1).forEach(node2 => {
            const dx = node1.x - node2.x;
            const dy = node1.y - node2.y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < 25) {
                const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                line.setAttribute('x1', `${node1.x}%`);
                line.setAttribute('y1', `${node1.y}%`);
                line.setAttribute('x2', `${node2.x}%`);
                line.setAttribute('y2', `${node2.y}%`);
                line.setAttribute('stroke', 'var(--accent-color)');
                line.setAttribute('stroke-width', '0.5');
                line.setAttribute('stroke-opacity', '0.6');
                line.setAttribute('filter', 'url(#glow)');
                svg.appendChild(line);
            }
        });
    });

    // Add glow filter
    const defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');
    const filter = document.createElementNS('http://www.w3.org/2000/svg', 'filter');
    filter.setAttribute('id', 'glow');
    filter.innerHTML = `
        <feGaussianBlur stdDeviation="1" result="coloredBlur"/>
        <feMerge>
            <feMergeNode in="coloredBlur"/>
            <feMergeNode in="SourceGraphic"/>
        </feMerge>
    `;
    defs.appendChild(filter);
    svg.insertBefore(defs, svg.firstChild);
}

function createDataMesh() {
    const container = document.querySelector('.data-mesh');
    const nodeCount = 30;
    const nodes = [];
    const connections = [];

    // Create nodes
    for (let i = 0; i < nodeCount; i++) {
        const node = document.createElement('div');
        node.className = 'mesh-node';
        const x = Math.random() * 100;
        const y = Math.random() * 100;
        node.style.left = `${x}%`;
        node.style.top = `${y}%`;
        container.appendChild(node);
        nodes.push({ element: node, x, y });
    }

    // Create SVG for connections
    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg.style.width = '100%';
    svg.style.height = '100%';
    svg.style.position = 'absolute';
    svg.style.top = '0';
    svg.style.left = '0';
    container.appendChild(svg);

    // Add gradient definitions
    const defs = document.createElementNS('http://www.w3.org/2000/svg', 'defs');
    svg.appendChild(defs);

    // Create gradient for data flow
    const gradient = document.createElementNS('http://www.w3.org/2000/svg', 'linearGradient');
    gradient.setAttribute('id', 'dataFlowGradient');
    gradient.innerHTML = `
        <stop offset="0%" style="stop-color: rgba(0, 196, 204, 0.1)"/>
        <stop offset="50%" style="stop-color: rgba(0, 196, 204, 0.6)"/>
        <stop offset="100%" style="stop-color: rgba(0, 196, 204, 0.1)"/>
    `;
    defs.appendChild(gradient);

    // Connect nodes
    nodes.forEach((node1, i) => {
        nodes.slice(i + 1).forEach(node2 => {
            const dx = node1.x - node2.x;
            const dy = node1.y - node2.y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < 30) {
                const connection = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                const controlPoint1X = node1.x + (node2.x - node1.x) * 0.3;
                const controlPoint1Y = node1.y + (node2.y - node1.y) * 0.1;
                const controlPoint2X = node1.x + (node2.x - node1.x) * 0.7;
                const controlPoint2Y = node1.y + (node2.y - node1.y) * 0.9;
                
                const pathData = `M ${node1.x}% ${node1.y}% C ${controlPoint1X}% ${controlPoint1Y}%, ${controlPoint2X}% ${controlPoint2Y}%, ${node2.x}% ${node2.y}%`;
                
                connection.setAttribute('d', pathData);
                connection.setAttribute('stroke', 'url(#dataFlowGradient)');
                connection.setAttribute('stroke-width', '2');
                connection.setAttribute('fill', 'none');
                connection.classList.add('mesh-connection');
                
                svg.appendChild(connection);
                connections.push(connection);
            }
        });
    });

    // Add data particles
    connections.forEach(connection => {
        const particle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
        particle.setAttribute('r', '3');
        particle.setAttribute('fill', 'rgba(0, 196, 204, 0.8)');
        particle.classList.add('mesh-particle');
        
        const animateMotion = document.createElementNS('http://www.w3.org/2000/svg', 'animateMotion');
        animateMotion.setAttribute('dur', '3s');
        animateMotion.setAttribute('repeatCount', 'indefinite');
        animateMotion.setAttribute('path', connection.getAttribute('d'));
        
        particle.appendChild(animateMotion);
        svg.appendChild(particle);
    });
}

// Initialize animations
document.addEventListener('DOMContentLoaded', function() {
    createDigitalRain();
    createNeuralNetwork();
    createDataMesh();
});

// Form handling
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', handleFormSubmit);
    }
});

// Generate CSRF token
function generateCSRFToken() {
    return Math.random().toString(36).substring(2) + Date.now().toString(36);
}

// Set CSRF token when page loads
document.addEventListener('DOMContentLoaded', function() {
    const csrfToken = generateCSRFToken();
    localStorage.setItem('csrf_token', csrfToken);
    
    // Set token in all forms
    document.querySelectorAll('#csrf_token').forEach(input => {
        input.value = csrfToken;
    });
});

async function handleFormSubmit(e) {
    e.preventDefault();
    
    const form = e.target;
    const submitBtn = form.querySelector('.footer-submit-btn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoading = submitBtn.querySelector('.btn-loading');
    const btnSuccess = submitBtn.querySelector('.btn-success');

    // Show loading state
    btnText.style.display = 'none';
    btnLoading.style.display = 'inline-block';
    submitBtn.disabled = true;

    // Get form data
    const formData = {
        name: form.name.value,
        email: form.email.value,
        phone: form.phone.value,
        message: form.message.value,
        csrf_token: localStorage.getItem('csrf_token')
    };

    try {
        const response = await fetch('/api/contact.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData)
        });

        const result = await response.json();

        if (response.ok) {
            // Show success state
            btnLoading.style.display = 'none';
            btnSuccess.style.display = 'inline-block';
            form.reset();

            // Reset button after 3 seconds
            setTimeout(() => {
                btnSuccess.style.display = 'none';
                btnText.style.display = 'inline-block';
                submitBtn.disabled = false;
            }, 3000);
        } else {
            throw new Error(result.error || 'Failed to send message');
        }
    } catch (error) {
        console.error('Error:', error);
        // Show error state
        btnLoading.style.display = 'none';
        btnText.style.display = 'inline-block';
        btnText.textContent = 'Error! Try Again';
        submitBtn.disabled = false;

        // Reset button text after 3 seconds
        setTimeout(() => {
            btnText.textContent = 'Send Message';
        }, 3000);
    }
}

// Smooth scroll for all internal links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        if (targetId === '#top') {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        } else {
            document.querySelector(targetId).scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Sanitize data before displaying
function sanitizeHTML(str) {
    const div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
}

// Use when handling responses
const result = await response.json();
if (result.error) {
    const safeErrorMessage = sanitizeHTML(result.error);
    // Use safeErrorMessage in UI
} 