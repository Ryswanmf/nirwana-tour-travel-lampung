import * as THREE from 'three';

export function initTravelBusScene(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;

    // Dimensions
    let width = container.clientWidth || 550;
    let height = container.clientHeight || 550;

    // Scene, Camera, Renderer
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 100);
    camera.position.set(0, 0, 7.5);

    const renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true,
        powerPreference: 'high-performance'
    });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    container.appendChild(renderer.domElement);

    // Parent group for overall 3D parallax tilt
    const sceneGroup = new THREE.Group();
    scene.add(sceneGroup);

    // Ambient & Directional Lighting
    const ambientLight = new THREE.AmbientLight(0xffffff, 1.2);
    scene.add(ambientLight);

    const sunLight = new THREE.DirectionalLight(0xfff3d1, 2.0);
    sunLight.position.set(5, 8, 6);
    scene.add(sunLight);

    const rimLight = new THREE.DirectionalLight(0x38bdf8, 1.5);
    rimLight.position.set(-6, -2, -2);
    scene.add(rimLight);

    // 1. Bus 3D Plane with High-Res Texture
    const textureLoader = new THREE.TextureLoader();
    const busTexture = textureLoader.load('/images/bus.png');
    busTexture.colorSpace = THREE.SRGBColorSpace;

    // Bus Aspect ratio: 1312 / 1199 = 1.094
    const busWidth = 5.2;
    const busHeight = busWidth / 1.094;
    const busGeo = new THREE.PlaneGeometry(busWidth, busHeight);
    const busMat = new THREE.MeshStandardMaterial({
        map: busTexture,
        transparent: true,
        alphaTest: 0.05,
        roughness: 0.35,
        metalness: 0.1,
    });
    const busMesh = new THREE.Mesh(busGeo, busMat);
    busMesh.position.set(0.1, 0.2, 0.2);
    sceneGroup.add(busMesh);

    // 2. Soft Shadow Plane Beneath Bus
    const shadowGeo = new THREE.PlaneGeometry(4.8, 1.6);
    const shadowMat = new THREE.MeshBasicMaterial({
        color: 0x050c18,
        transparent: true,
        opacity: 0.45,
    });
    const shadowMesh = new THREE.Mesh(shadowGeo, shadowMat);
    shadowMesh.rotation.x = -Math.PI / 2.2;
    shadowMesh.position.set(0.2, -1.95, -0.1);
    sceneGroup.add(shadowMesh);

    // 3. Animated Road Lines Beneath Bus (Simulating Highway Movement)
    const roadGroup = new THREE.Group();
    roadGroup.position.set(0.2, -2.05, 0.1);
    roadGroup.rotation.x = -Math.PI / 2.3;
    roadGroup.rotation.z = -0.12; // Matching the curve angle of the road in the illustration
    sceneGroup.add(roadGroup);

    // Create 8 dashed road stripe segments that scroll continuously
    const stripeCount = 10;
    const stripes = [];
    const stripeGeo = new THREE.PlaneGeometry(0.55, 0.08);
    const stripeMat = new THREE.MeshBasicMaterial({
        color: 0xfef08a, // Soft warm highway yellow
        transparent: true,
        opacity: 0.7,
    });

    for (let i = 0; i < stripeCount; i++) {
        const stripe = new THREE.Mesh(stripeGeo, stripeMat);
        stripe.position.x = (i - stripeCount / 2) * 0.9;
        stripe.position.y = 0;
        roadGroup.add(stripe);
        stripes.push(stripe);
    }

    // 4. Animated Speed Lines / Wind Particles (Simulating Forward Travel)
    const particleCount = 80;
    const particleGeo = new THREE.BufferGeometry();
    const particlePositions = new Float32Array(particleCount * 3);
    const particleSpeeds = [];

    for (let i = 0; i < particleCount; i++) {
        particlePositions[i * 3] = (Math.random() - 0.5) * 8;
        particlePositions[i * 3 + 1] = (Math.random() - 0.5) * 4.5;
        particlePositions[i * 3 + 2] = (Math.random() - 0.5) * 4;
        particleSpeeds.push(0.04 + Math.random() * 0.06);
    }

    particleGeo.setAttribute('position', new THREE.BufferAttribute(particlePositions, 3));
    const particleMat = new THREE.PointsMaterial({
        color: 0x7dd3fc,
        size: 0.06,
        transparent: true,
        opacity: 0.6,
        blending: THREE.AdditiveBlending,
    });
    const particleSystem = new THREE.Points(particleGeo, particleMat);
    sceneGroup.add(particleSystem);

    // 5. Headlight Glow Beams (Volumetric-like soft light cones)
    const headlightGeo = new THREE.ConeGeometry(0.8, 3.2, 16, 1, true);
    const headlightMat = new THREE.MeshBasicMaterial({
        color: 0xfef08a,
        transparent: true,
        opacity: 0.12,
        side: THREE.DoubleSide,
        depthWrite: false,
    });

    const headlightLeft = new THREE.Mesh(headlightGeo, headlightMat);
    headlightLeft.rotation.z = Math.PI / 2.3;
    headlightLeft.rotation.y = -0.3;
    headlightLeft.position.set(1.8, -0.9, 0.4);
    sceneGroup.add(headlightLeft);

    const headlightRight = new THREE.Mesh(headlightGeo, headlightMat);
    headlightRight.rotation.z = Math.PI / 2.3;
    headlightRight.rotation.y = -0.2;
    headlightRight.position.set(1.9, -1.2, 0.6);
    sceneGroup.add(headlightRight);

    // 6. Interactive Mouse / Touch Parallax Tracking
    let targetRotationX = 0;
    let targetRotationY = 0;
    let targetCameraX = 0;
    let targetCameraY = 0;

    const onPointerMove = (e) => {
        const rect = container.getBoundingClientRect();
        const x = (e.clientX - rect.left) / width - 0.5;
        const y = (e.clientY - rect.top) / height - 0.5;

        // Smooth 3D tilt angles
        targetRotationY = x * 0.35;
        targetRotationX = -y * 0.25;

        targetCameraX = x * 0.6;
        targetCameraY = -y * 0.4;
    };

    window.addEventListener('mousemove', onPointerMove, { passive: true });

    // Interactive Click: Horn and Headlight Flash Effect
    let flashIntensity = 0;
    container.addEventListener('click', () => {
        flashIntensity = 1.0;
        // Optional subtle bounce pulse
        busMesh.position.y += 0.12;
    });

    // 7. Window Resize
    const handleResize = () => {
        if (!container) return;
        width = container.clientWidth || 550;
        height = container.clientHeight || 550;
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    };
    window.addEventListener('resize', handleResize);

    // 8. Animation Loop
    let clock = new THREE.Clock();
    let animationId;

    const animate = () => {
        animationId = requestAnimationFrame(animate);

        const elapsedTime = clock.getElapsedTime();

        // A. Bus Suspension Physics (Engine Idle & Highway Bumping)
        const bounce = Math.sin(elapsedTime * 9) * 0.025 + Math.sin(elapsedTime * 18) * 0.01;
        busMesh.position.y = 0.2 + bounce;

        // Subtle chassis rocking / banking
        busMesh.rotation.z = Math.sin(elapsedTime * 4.5) * 0.008;
        busMesh.rotation.x = Math.sin(elapsedTime * 6.5) * 0.005;

        // Shadow scales with bounce
        shadowMesh.scale.set(1 + bounce * 0.8, 1 + bounce * 0.8, 1);

        // B. Animate Road Dashed Stripes (Continuous Driving Illusion)
        for (let i = 0; i < stripes.length; i++) {
            stripes[i].position.x -= 0.045; // Highway speed
            if (stripes[i].position.x < -stripeCount * 0.45) {
                stripes[i].position.x += stripeCount * 0.9;
            }
        }

        // C. Animate Wind / Speed Particles
        const positions = particleGeo.attributes.position.array;
        for (let i = 0; i < particleCount; i++) {
            positions[i * 3] -= particleSpeeds[i] * 1.5; // Flowing backwards past the bus
            if (positions[i * 3] < -5) {
                positions[i * 3] = 5;
                positions[i * 3 + 1] = (Math.random() - 0.5) * 4.5;
            }
        }
        particleGeo.attributes.position.needsUpdate = true;

        // D. Headlight Intensity Pulsing & Click Flash
        if (flashIntensity > 0) {
            flashIntensity -= 0.04;
            headlightMat.opacity = 0.12 + Math.max(0, flashIntensity) * 0.6;
        } else {
            headlightMat.opacity = 0.12 + Math.sin(elapsedTime * 3) * 0.02;
        }

        // E. Smooth Parallax Damping (Lerp)
        sceneGroup.rotation.y += (targetRotationY - sceneGroup.rotation.y) * 0.06;
        sceneGroup.rotation.x += (targetRotationX - sceneGroup.rotation.x) * 0.06;

        camera.position.x += (targetCameraX - camera.position.x) * 0.05;
        camera.position.y += (targetCameraY - camera.position.y) * 0.05;
        camera.lookAt(0, 0, 0);

        renderer.render(scene, camera);
    };

    animate();

    return () => {
        cancelAnimationFrame(animationId);
        window.removeEventListener('mousemove', onPointerMove);
        window.removeEventListener('resize', handleResize);
        renderer.dispose();
    };
}
