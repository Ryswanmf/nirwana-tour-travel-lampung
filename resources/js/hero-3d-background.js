import * as THREE from 'three';

export function initHero3DBackground(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;

    let width = container.clientWidth || window.innerWidth;
    let height = container.clientHeight || 700;

    // 1. Scene, Camera, Renderer
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(50, width / height, 0.1, 100);
    camera.position.set(0, 0, 10);

    const renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true,
        powerPreference: 'high-performance',
    });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5));
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.1;
    container.appendChild(renderer.domElement);

    // 2. Ambient & Directional Lighting
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
    scene.add(ambientLight);

    const sunLight = new THREE.PointLight(0xfbbf24, 2.5, 30);
    sunLight.position.set(5, 5, 2);
    scene.add(sunLight);

    const skyLight = new THREE.PointLight(0x38bdf8, 2.0, 30);
    skyLight.position.set(-6, -3, 2);
    scene.add(skyLight);

    // 3. 3D Floating Clouds (Soft Procedural Cloud Clusters in Background)
    const cloudGroup = new THREE.Group();
    scene.add(cloudGroup);

    const cloudMat = new THREE.MeshStandardMaterial({
        color: 0xffffff,
        roughness: 0.3,
        transparent: true,
        opacity: 0.65,
    });

    const clouds = [];
    function createCloudCluster(x, y, z, scale = 1, speed = 0.002) {
        const group = new THREE.Group();
        group.position.set(x, y, z);
        group.scale.setScalar(scale);

        const puffs = [
            { x: 0, y: 0, z: 0, r: 0.9 },
            { x: -0.7, y: -0.1, z: 0, r: 0.65 },
            { x: 0.75, y: -0.08, z: 0, r: 0.7 },
            { x: 0.25, y: 0.45, z: 0, r: 0.55 },
            { x: -0.3, y: 0.35, z: 0, r: 0.5 },
        ];

        puffs.forEach((p) => {
            const puffGeo = new THREE.SphereGeometry(p.r, 12, 12);
            const puff = new THREE.Mesh(puffGeo, cloudMat);
            puff.position.set(p.x, p.y, p.z);
            group.add(puff);
        });

        cloudGroup.add(group);
        clouds.push({ group, speed, initialY: y });
    }

    // Spawn 5 soft floating clouds in background behind diorama
    createCloudCluster(-7, 2.5, -4, 1.4, 0.003);
    createCloudCluster(6, 3.2, -5, 1.6, 0.0025);
    createCloudCluster(1, -2.8, -3.5, 1.2, 0.0035);
    createCloudCluster(-5, -1.8, -4.5, 1.3, 0.002);
    createCloudCluster(8, -0.5, -6, 1.8, 0.0018);

    // 4. 3D Sparkling Travel Particles / Sunlight Motes
    const particleCount = 180;
    const particleGeo = new THREE.BufferGeometry();
    const positions = new Float32Array(particleCount * 3);
    const colors = new Float32Array(particleCount * 3);

    for (let i = 0; i < particleCount; i++) {
        positions[i * 3] = (Math.random() - 0.5) * 24;
        positions[i * 3 + 1] = (Math.random() - 0.5) * 16;
        positions[i * 3 + 2] = (Math.random() - 0.5) * 12 - 2;

        // Warm gold and sky blue color blend
        if (Math.random() > 0.4) {
            colors[i * 3] = 0.98;     // R
            colors[i * 3 + 1] = 0.85; // G
            colors[i * 3 + 2] = 0.35; // B (Golden sun mote)
        } else {
            colors[i * 3] = 0.35;     // R
            colors[i * 3 + 1] = 0.75; // G
            colors[i * 3 + 2] = 0.98; // B (Sky blue sparkle)
        }
    }

    particleGeo.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    particleGeo.setAttribute('color', new THREE.BufferAttribute(colors, 3));

    // Particle texture canvas (soft glow circular particle)
    const particleCanvas = document.createElement('canvas');
    particleCanvas.width = 32;
    particleCanvas.height = 32;
    const pCtx = particleCanvas.getContext('2d');
    const grad = pCtx.createRadialGradient(16, 16, 0, 16, 16, 16);
    grad.addColorStop(0, 'rgba(255, 255, 255, 1)');
    grad.addColorStop(0.3, 'rgba(255, 255, 255, 0.7)');
    grad.addColorStop(0.7, 'rgba(255, 255, 255, 0.15)');
    grad.addColorStop(1, 'rgba(255, 255, 255, 0)');
    pCtx.fillStyle = grad;
    pCtx.beginPath();
    pCtx.arc(16, 16, 16, 0, Math.PI * 2);
    pCtx.fill();
    const particleTexture = new THREE.CanvasTexture(particleCanvas);

    const particleMat = new THREE.PointsMaterial({
        size: 0.45,
        vertexColors: true,
        map: particleTexture,
        transparent: true,
        opacity: 0.75,
        blending: THREE.AdditiveBlending,
        depthWrite: false,
    });

    const particleSystem = new THREE.Points(particleGeo, particleMat);
    scene.add(particleSystem);

    // 5. 3D Floating Compass / Geometric Latitude Depth Rings
    const ringGroup = new THREE.Group();
    ringGroup.position.set(4.5, 0, -3.5);
    scene.add(ringGroup);

    const ringMat = new THREE.MeshBasicMaterial({
        color: 0x0284c7,
        transparent: true,
        opacity: 0.18,
        wireframe: true,
    });
    const ring1 = new THREE.Mesh(new THREE.TorusGeometry(3.5, 0.02, 8, 48), ringMat);
    const ring2 = new THREE.Mesh(new THREE.TorusGeometry(2.6, 0.02, 8, 48), ringMat);
    ring2.rotation.x = Math.PI / 4;
    ringGroup.add(ring1);
    ringGroup.add(ring2);

    // 6. Interactive Mouse Parallax
    let mouseX = 0;
    let mouseY = 0;
    let targetCameraX = 0;
    let targetCameraY = 0;

    const onMouseMove = (e) => {
        const normX = (e.clientX / window.innerWidth) - 0.5;
        const normY = (e.clientY / window.innerHeight) - 0.5;
        mouseX = normX * 1.5;
        mouseY = -normY * 1.2;
    };
    window.addEventListener('mousemove', onMouseMove, { passive: true });

    // Resize Handler
    const handleResize = () => {
        if (!container) return;
        width = container.clientWidth || window.innerWidth;
        height = container.clientHeight || 700;
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    };
    window.addEventListener('resize', handleResize);

    // 7. Animation Loop
    let animId;
    const clock = new THREE.Clock();

    const animate = () => {
        animId = requestAnimationFrame(animate);
        const elapsedTime = clock.getElapsedTime();

        // 1. Clouds drifting smoothly
        clouds.forEach((c) => {
            c.group.position.x += c.speed;
            if (c.group.position.x > 14) {
                c.group.position.x = -14;
            }
            c.group.position.y = c.initialY + Math.sin(elapsedTime * 0.5 + c.group.position.x) * 0.15;
        });

        // 2. Particles floating gently
        const posArr = particleGeo.attributes.position.array;
        for (let i = 0; i < particleCount; i++) {
            posArr[i * 3 + 1] += Math.sin(elapsedTime * 0.8 + i) * 0.003;
            posArr[i * 3] += Math.cos(elapsedTime * 0.5 + i) * 0.002;
        }
        particleGeo.attributes.position.needsUpdate = true;
        particleSystem.rotation.y = elapsedTime * 0.015;

        // 3. Compass rings rotating
        ringGroup.rotation.z = elapsedTime * 0.04;
        ringGroup.rotation.y = elapsedTime * 0.03;

        // 4. Camera gentle damping parallax
        targetCameraX += (mouseX - targetCameraX) * 0.04;
        targetCameraY += (mouseY - targetCameraY) * 0.04;
        camera.position.x = targetCameraX;
        camera.position.y = targetCameraY;
        camera.lookAt(0, 0, 0);

        renderer.render(scene, camera);
    };

    animate();

    return () => {
        cancelAnimationFrame(animId);
        window.removeEventListener('mousemove', onMouseMove);
        window.removeEventListener('resize', handleResize);
        renderer.dispose();
    };
}
