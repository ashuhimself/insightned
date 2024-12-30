class NeuralMesh {
    constructor() {
        this.canvas = document.getElementById('networkCanvas');
        this.ctx = this.canvas.getContext('2d');
        this.nodes = document.querySelectorAll('.mesh-node');
        this.nodePositions = [];
        this.connections = [];
        this.activeNodeIndex = 0;

        this.init();
    }

    init() {
        this.resizeCanvas();
        window.addEventListener('resize', () => this.resizeCanvas());
        this.positionNodes();
        this.createConnections();
        this.animate();
        this.startNodeAnimation();
    }

    resizeCanvas() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
    }

    positionNodes() {
        const centerX = this.canvas.width / 2;
        const centerY = this.canvas.height / 2;
        const radius = Math.min(this.canvas.width, this.canvas.height) * 0.3;
        this.nodePositions = [];

        this.nodes.forEach((node, i) => {
            const angle = ((i / this.nodes.length) * Math.PI * 2) - Math.PI / 2;
            const x = centerX + Math.cos(angle) * radius;
            const y = centerY + Math.sin(angle) * radius;
            
            node.style.left = `${x}px`;
            node.style.top = `${y}px`;
            this.nodePositions.push({ x, y });
        });
    }

    createConnections() {
        for (let i = 0; i < this.nodePositions.length; i++) {
            for (let j = i + 1; j < this.nodePositions.length; j++) {
                this.connections.push({
                    start: this.nodePositions[i],
                    end: this.nodePositions[j],
                    progress: 0,
                    speed: 0.5 + Math.random() * 0.5
                });
            }
        }
    }

    drawConnections() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);

        this.connections.forEach(conn => {
            this.ctx.beginPath();
            this.ctx.strokeStyle = `rgba(0, 196, 204, ${0.15 + Math.sin(conn.progress) * 0.1})`;
            this.ctx.lineWidth = 2;
            this.ctx.shadowBlur = 10;
            this.ctx.shadowColor = 'rgba(0, 196, 204, 0.5)';
            this.ctx.moveTo(conn.start.x, conn.start.y);
            this.ctx.lineTo(conn.end.x, conn.end.y);
            this.ctx.stroke();
            this.ctx.shadowBlur = 0;

            // Animated particle
            const particlePos = {
                x: conn.start.x + (conn.end.x - conn.start.x) * (Math.sin(conn.progress) + 1) / 2,
                y: conn.start.y + (conn.end.y - conn.start.y) * (Math.sin(conn.progress) + 1) / 2
            };

            this.ctx.beginPath();
            this.ctx.fillStyle = 'rgba(0, 196, 204, 1)';
            this.ctx.shadowBlur = 15;
            this.ctx.shadowColor = 'rgba(0, 196, 204, 0.8)';
            this.ctx.arc(particlePos.x, particlePos.y, 2, 0, Math.PI * 2);
            this.ctx.fill();
            this.ctx.shadowBlur = 0;

            conn.progress += 0.01 * conn.speed;
        });
    }

    animate() {
        this.drawConnections();
        requestAnimationFrame(() => this.animate());
    }

    startNodeAnimation() {
        setInterval(() => {
            this.nodes[this.activeNodeIndex].classList.remove('active');
            this.activeNodeIndex = (this.activeNodeIndex + 1) % this.nodes.length;
            this.nodes[this.activeNodeIndex].classList.add('active');
        }, 3000);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new NeuralMesh();
}); 