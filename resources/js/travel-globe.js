import * as THREE from 'three';

export function initTravelGlobe(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;

    // Dimensions
    let width = container.clientWidth || 500;
    let height = container.clientHeight || 500;

    // Scene, Camera, Renderer
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 1000);
    camera.position.z = 12.5;

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, powerPreference: 'high-performance' });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    container.appendChild(renderer.domElement);

    // Group for globe rotation
    const globeGroup = new THREE.Group();
    scene.add(globeGroup);

    // Radius of Globe
    const radius = 4.2;

    // 1. Atmosphere / Outer Soft Glow Sphere
    const atmosGeo = new THREE.SphereGeometry(radius * 1.05, 32, 32);
    const atmosMat = new THREE.MeshBasicMaterial({
        color: 0x0284c7,
        wireframe: false,
        transparent: true,
        opacity: 0.05,
    });
    const atmosMesh = new THREE.Mesh(atmosGeo, atmosMat);
    globeGroup.add(atmosMesh);

    // 2. Wireframe Sphere Grid
    const wireGeo = new THREE.SphereGeometry(radius, 28, 28);
    const wireMat = new THREE.MeshBasicMaterial({
        color: 0x0ea5e9,
        wireframe: true,
        transparent: true,
        opacity: 0.18,
    });
    const wireMesh = new THREE.Mesh(wireGeo, wireMat);
    globeGroup.add(wireMesh);

    // 3. Coordinate conversion helper (Lat, Lon to 3D Cartesian)
    function latLonToVector3(lat, lon, r = radius) {
        const phi = (90 - lat) * (Math.PI / 180);
        const theta = (lon + 180) * (Math.PI / 180);
        const x = -(r * Math.sin(phi) * Math.cos(theta));
        const z = r * Math.sin(phi) * Math.sin(theta);
        const y = r * Math.cos(phi);
        return new THREE.Vector3(x, y, z);
    }

    // 4. Dot Matrix on Globe Surface (Random world dots + dense points)
    const dotCount = 1200;
    const dotPositions = new Float32Array(dotCount * 3);
    const dotColors = new Float32Array(dotCount * 3);
    const colorCyan = new THREE.Color(0x38bdf8);
    const colorNavy = new THREE.Color(0x1e3a8a);

    for (let i = 0; i < dotCount; i++) {
        const lat = (Math.random() - 0.5) * 160;
        const lon = (Math.random() - 0.5) * 360;
        const pos = latLonToVector3(lat, lon, radius * 1.002);
        dotPositions[i * 3] = pos.x;
        dotPositions[i * 3 + 1] = pos.y;
        dotPositions[i * 3 + 2] = pos.z;

        const color = Math.random() > 0.4 ? colorCyan : colorNavy;
        dotColors[i * 3] = color.r;
        dotColors[i * 3 + 1] = color.g;
        dotColors[i * 3 + 2] = color.b;
    }

    const dotGeo = new THREE.BufferGeometry();
    dotGeo.setAttribute('position', new THREE.BufferAttribute(dotPositions, 3));
    dotGeo.setAttribute('color', new THREE.BufferAttribute(dotColors, 3));
    const dotMat = new THREE.PointsMaterial({
        size: 0.07,
        vertexColors: true,
        transparent: true,
        opacity: 0.75,
    });
    const dotPoints = new THREE.Points(dotGeo, dotMat);
    globeGroup.add(dotPoints);

    // 5. Tourism Destinations (Indonesia focus)
    const destinations = [
        { name: 'Bandar Lampung (Pusat Hub)', lat: -5.4, lon: 105.2, isHub: true },
        { name: 'Pulau Pahawang', lat: -5.6, lon: 105.1 },
        { name: 'Teluk Kiluan', lat: -5.8, lon: 105.0 },
        { name: 'Krui Pesisir Barat', lat: -5.2, lon: 103.9 },
        { name: 'Bandung', lat: -6.9, lon: 107.6 },
        { name: 'Yogyakarta', lat: -7.8, lon: 110.3 },
        { name: 'Gunung Bromo', lat: -7.9, lon: 112.9 },
        { name: 'Bali', lat: -8.4, lon: 115.1 },
        { name: 'Labuan Bajo', lat: -8.5, lon: 119.8 },
    ];

    const hubPos = latLonToVector3(destinations[0].lat, destinations[0].lon, radius * 1.01);

    // Add glowing pin for each destination
    destinations.forEach((dest) => {
        const pos = latLonToVector3(dest.lat, dest.lon, radius * 1.01);

        // Pin point
        const pinGeo = new THREE.SphereGeometry(dest.isHub ? 0.14 : 0.08, 16, 16);
        const pinMat = new THREE.MeshBasicMaterial({
            color: dest.isHub ? 0xf59e0b : 0x38bdf8,
        });
        const pinMesh = new THREE.Mesh(pinGeo, pinMat);
        pinMesh.position.copy(pos);
        globeGroup.add(pinMesh);

        // Pulsing ring for hub
        if (dest.isHub) {
            const ringGeo = new THREE.RingGeometry(0.18, 0.28, 32);
            const ringMat = new THREE.MeshBasicMaterial({
                color: 0xfbbf24,
                side: THREE.DoubleSide,
                transparent: true,
                opacity: 0.8,
            });
            const ringMesh = new THREE.Mesh(ringGeo, ringMat);
            ringMesh.position.copy(pos);
            ringMesh.lookAt(new THREE.Vector3(0, 0, 0));
            globeGroup.add(ringMesh);
        }
    });

    // 6. Draw 3D Curved Travel Route Arcs from Lampung to Destinations
    const arcsGroup = new THREE.Group();
    globeGroup.add(arcsGroup);

    destinations.slice(3).forEach((dest) => {
        const endPos = latLonToVector3(dest.lat, dest.lon, radius * 1.01);

        // Calculate midpoint elevated outward
        const midPos = new THREE.Vector3().addVectors(hubPos, endPos).multiplyScalar(0.5);
        const distance = hubPos.distanceTo(endPos);
        midPos.normalize().multiplyScalar(radius + distance * 0.35);

        const curve = new THREE.QuadraticBezierCurve3(hubPos, midPos, endPos);
        const points = curve.getPoints(40);
        const arcGeo = new THREE.BufferGeometry().setFromPoints(points);

        const arcMat = new THREE.LineBasicMaterial({
            color: 0x38bdf8,
            transparent: true,
            opacity: 0.55,
            linewidth: 1,
        });
        const arcLine = new THREE.Line(arcGeo, arcMat);
        arcsGroup.add(arcLine);
    });

    // Initial Globe Orientation facing Indonesia / Southeast Asia
    globeGroup.rotation.y = -1.95;
    globeGroup.rotation.x = 0.25;

    // 7. Interactive Drag & Parallax
    let isDragging = false;
    let prevMouseX = 0;
    let prevMouseY = 0;
    let targetRotationY = globeGroup.rotation.y;
    let targetRotationX = globeGroup.rotation.x;

    const onPointerDown = (e) => {
        isDragging = true;
        prevMouseX = e.clientX || (e.touches && e.touches[0].clientX) || 0;
        prevMouseY = e.clientY || (e.touches && e.touches[0].clientY) || 0;
    };

    const onPointerMove = (e) => {
        if (!isDragging) {
            // Subtle hover tilt
            const rect = container.getBoundingClientRect();
            const clientX = e.clientX - rect.left - width / 2;
            const clientY = e.clientY - rect.top - height / 2;
            targetRotationY += clientX * 0.00003;
            targetRotationX += clientY * 0.00003;
            return;
        }

        const clientX = e.clientX || (e.touches && e.touches[0].clientX) || 0;
        const clientY = e.clientY || (e.touches && e.touches[0].clientY) || 0;
        const deltaX = clientX - prevMouseX;
        const deltaY = clientY - prevMouseY;

        targetRotationY += deltaX * 0.005;
        targetRotationX += deltaY * 0.005;

        prevMouseX = clientX;
        prevMouseY = clientY;
    };

    const onPointerUp = () => {
        isDragging = false;
    };

    container.addEventListener('mousedown', onPointerDown);
    window.addEventListener('mousemove', onPointerMove);
    window.addEventListener('mouseup', onPointerUp);

    container.addEventListener('touchstart', onPointerDown, { passive: true });
    window.addEventListener('touchmove', onPointerMove, { passive: true });
    window.addEventListener('touchend', onPointerUp);

    // 8. Resize Handler
    const handleResize = () => {
        if (!container) return;
        width = container.clientWidth || 500;
        height = container.clientHeight || 500;
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    };
    window.addEventListener('resize', handleResize);

    // 9. Animation Loop
    let animationFrameId;
    let clock = new THREE.Clock();

    const animate = () => {
        animationFrameId = requestAnimationFrame(animate);

        const delta = clock.getDelta();

        // Slow auto-rotate when not dragging
        if (!isDragging) {
            targetRotationY += 0.0018;
        }

        // Smooth damping interpolation
        globeGroup.rotation.y += (targetRotationY - globeGroup.rotation.y) * 0.05;
        globeGroup.rotation.x += (targetRotationX - globeGroup.rotation.x) * 0.05;

        // Clamp vertical tilt
        globeGroup.rotation.x = Math.max(-0.6, Math.min(0.6, globeGroup.rotation.x));

        // Gentle pulse on atmosphere
        const time = clock.getElapsedTime();
        atmosMesh.scale.setScalar(1 + Math.sin(time * 2) * 0.008);

        renderer.render(scene, camera);
    };

    animate();

    return () => {
        cancelAnimationFrame(animationFrameId);
        window.removeEventListener('resize', handleResize);
        container.removeEventListener('mousedown', onPointerDown);
        window.removeEventListener('mousemove', onPointerMove);
        window.removeEventListener('mouseup', onPointerUp);
        renderer.dispose();
    };
}
