import * as THREE from 'three';

export function initTravelBusScene(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;

    let width = container.clientWidth || 550;
    let height = container.clientHeight || 550;

    // 1. Scene, Camera, Renderer
    const scene = new THREE.Scene();

    const camera = new THREE.PerspectiveCamera(38, width / height, 0.1, 100);
    camera.position.set(5.8, 4.4, 7.8);
    camera.lookAt(0, 0.6, 0);

    const renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true,
        powerPreference: 'high-performance',
    });
    renderer.setSize(width, height);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.shadowMap.enabled = true;
    renderer.shadowMap.type = THREE.PCFSoftShadowMap;
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.15;
    container.appendChild(renderer.domElement);

    // Main World Group for turntable rotation
    const worldGroup = new THREE.Group();
    scene.add(worldGroup);

    // 2. Lighting Setup
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.9);
    scene.add(ambientLight);

    const hemiLight = new THREE.HemisphereLight(0xbae6fd, 0x0f172a, 1.1);
    scene.add(hemiLight);

    const sunLight = new THREE.DirectionalLight(0xfffbeb, 2.4);
    sunLight.position.set(7, 12, 6);
    sunLight.castShadow = true;
    sunLight.shadow.mapSize.width = 1024;
    sunLight.shadow.mapSize.height = 1024;
    sunLight.shadow.bias = -0.0008;
    scene.add(sunLight);

    const rimLight = new THREE.DirectionalLight(0x38bdf8, 0.9);
    rimLight.position.set(-6, 5, -5);
    scene.add(rimLight);

    // 3. Helper: Generate Canvas Texture for Wooden Signboard
    function createSignboardTexture() {
        const canvas = document.createElement('canvas');
        canvas.width = 512;
        canvas.height = 256;
        const ctx = canvas.getContext('2d');

        // Wooden board gradient
        const woodGrad = ctx.createLinearGradient(0, 0, 0, 256);
        woodGrad.addColorStop(0, '#f59e0b');
        woodGrad.addColorStop(0.3, '#d97706');
        woodGrad.addColorStop(0.7, '#b45309');
        woodGrad.addColorStop(1, '#78350f');
        ctx.fillStyle = woodGrad;

        // Rounded board with wood plank outline
        if (ctx.roundRect) {
            ctx.roundRect(12, 12, 488, 232, 20);
        } else {
            ctx.rect(12, 12, 488, 232);
        }
        ctx.fill();

        // Dark carved wood border
        ctx.lineWidth = 12;
        ctx.strokeStyle = '#451a03';
        ctx.stroke();

        // Plank division line
        ctx.beginPath();
        ctx.moveTo(16, 126);
        ctx.lineTo(496, 126);
        ctx.strokeStyle = 'rgba(69, 26, 3, 0.45)';
        ctx.lineWidth = 4;
        ctx.stroke();

        // Corner bolt rivets
        const bolts = [[38, 38], [474, 38], [38, 218], [474, 218]];
        bolts.forEach(([bx, by]) => {
            ctx.beginPath();
            ctx.arc(bx, by, 9, 0, Math.PI * 2);
            ctx.fillStyle = '#334155';
            ctx.fill();
            ctx.beginPath();
            ctx.arc(bx - 2, by - 2, 4, 0, Math.PI * 2);
            ctx.fillStyle = '#94a3b8';
            ctx.fill();
        });

        // Embossed 3D Lettering "Nirwana"
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';

        // Drop shadow for carved wood 3D look
        ctx.shadowColor = 'rgba(0, 0, 0, 0.7)';
        ctx.shadowBlur = 10;
        ctx.shadowOffsetY = 5;

        ctx.font = 'bold 66px "Trebuchet MS", "Arial Rounded MT Bold", sans-serif';
        ctx.fillStyle = '#3b1202';
        ctx.fillText('Nirwana', 256, 76);

        // Subtitle "Tour Travel"
        ctx.font = 'bold 54px "Trebuchet MS", "Arial Rounded MT Bold", sans-serif';
        ctx.fillStyle = '#3b1202';
        ctx.fillText('Tour Travel', 256, 172);

        const tex = new THREE.CanvasTexture(canvas);
        tex.needsUpdate = true;
        return tex;
    }

    // 4. Helper: Generate Logo Badge for the Location Pin
    function createLogoBadgeTexture() {
        const canvas = document.createElement('canvas');
        canvas.width = 256;
        canvas.height = 256;
        const ctx = canvas.getContext('2d');

        // White circle background
        ctx.fillStyle = '#ffffff';
        ctx.beginPath();
        ctx.arc(128, 128, 122, 0, Math.PI * 2);
        ctx.fill();

        // Outer golden rim
        ctx.lineWidth = 8;
        ctx.strokeStyle = '#f59e0b';
        ctx.stroke();

        // Procedural Lotus & Sun (Instant sharp fallback)
        // 1. Golden Sun
        ctx.fillStyle = '#fbbf24';
        ctx.beginPath();
        ctx.arc(128, 86, 26, 0, Math.PI * 2);
        ctx.fill();

        for (let i = 0; i < 12; i++) {
            const ang = (i / 12) * Math.PI * 2;
            const x1 = 128 + Math.cos(ang) * 30;
            const y1 = 86 + Math.sin(ang) * 30;
            const x2 = 128 + Math.cos(ang) * 42;
            const y2 = 86 + Math.sin(ang) * 42;
            ctx.beginPath();
            ctx.moveTo(x1, y1);
            ctx.lineTo(x2, y2);
            ctx.strokeStyle = '#f59e0b';
            ctx.lineWidth = 4;
            ctx.stroke();
        }

        // 2. Blooming Lotus Petals (Pink/Magenta)
        ctx.fillStyle = '#ec4899';
        ctx.beginPath();
        ctx.ellipse(128, 138, 18, 34, 0, 0, Math.PI * 2);
        ctx.fill();

        ctx.fillStyle = '#db2777';
        ctx.beginPath();
        ctx.ellipse(106, 144, 15, 30, -0.4, 0, Math.PI * 2);
        ctx.fill();
        ctx.beginPath();
        ctx.ellipse(150, 144, 15, 30, 0.4, 0, Math.PI * 2);
        ctx.fill();

        // 3. Cyan Waves at base
        ctx.strokeStyle = '#06b6d4';
        ctx.lineWidth = 5;
        ctx.beginPath();
        ctx.arc(128, 180, 46, 0.25 * Math.PI, 0.75 * Math.PI, false);
        ctx.stroke();

        const tex = new THREE.CanvasTexture(canvas);

        // Overlay the official transparent logo once loaded
        const img = new Image();
        img.crossOrigin = 'anonymous';
        img.src = '/images/logo-nirwana.png';
        img.onload = () => {
            ctx.clearRect(0, 0, 256, 256);
            ctx.fillStyle = '#ffffff';
            ctx.beginPath();
            ctx.arc(128, 128, 122, 0, Math.PI * 2);
            ctx.fill();
            ctx.lineWidth = 8;
            ctx.strokeStyle = '#f59e0b';
            ctx.stroke();
            ctx.drawImage(img, 24, 24, 208, 208);
            tex.needsUpdate = true;
        };

        return tex;
    }

    // 5. Materials Palette
    const signTexture = createSignboardTexture();
    const pinBadgeTexture = createLogoBadgeTexture();

    const mats = {
        busRed: new THREE.MeshStandardMaterial({ color: 0xef4444, roughness: 0.2, metalness: 0.15 }),
        busDarkRed: new THREE.MeshStandardMaterial({ color: 0x991b1b, roughness: 0.35 }),
        busWhite: new THREE.MeshStandardMaterial({ color: 0xf8fafc, roughness: 0.25 }),
        busBlackFascia: new THREE.MeshStandardMaterial({ color: 0x0f172a, roughness: 0.4 }),
        glass: new THREE.MeshPhysicalMaterial({
            color: 0x0f172a,
            roughness: 0.08,
            transmission: 0.65,
            thickness: 0.4,
            transparent: true,
            opacity: 0.88,
        }),
        rubber: new THREE.MeshStandardMaterial({ color: 0x1e293b, roughness: 0.9 }),
        rim: new THREE.MeshStandardMaterial({ color: 0xe2e8f0, roughness: 0.2, metalness: 0.85 }),
        headlight: new THREE.MeshStandardMaterial({ color: 0xfef08a, emissive: 0xfef08a, emissiveIntensity: 2.5 }),
        foglight: new THREE.MeshStandardMaterial({ color: 0xf59e0b, emissive: 0xf59e0b, emissiveIntensity: 1.8 }),
        taillight: new THREE.MeshStandardMaterial({ color: 0xf43f5e, emissive: 0xf43f5e, emissiveIntensity: 1.5 }),
        road: new THREE.MeshStandardMaterial({ color: 0x1e293b, roughness: 0.85 }),
        roadMarking: new THREE.MeshBasicMaterial({ color: 0xffffff }),
        curb: new THREE.MeshStandardMaterial({ color: 0x94a3b8, roughness: 0.7 }),
        grass: new THREE.MeshStandardMaterial({ color: 0x22c55e, roughness: 0.8 }),
        islandBase: new THREE.MeshStandardMaterial({ color: 0x0f172a, roughness: 0.95 }),
        treeFoliage: new THREE.MeshStandardMaterial({ color: 0x15803d, roughness: 0.7 }),
        treeFoliageLight: new THREE.MeshStandardMaterial({ color: 0x16a34a, roughness: 0.7 }),
        treeTrunk: new THREE.MeshStandardMaterial({ color: 0x78350f, roughness: 0.9 }),
        stone: new THREE.MeshStandardMaterial({ color: 0x475569, roughness: 0.8 }),
        monasWhite: new THREE.MeshStandardMaterial({ color: 0xf8fafc, roughness: 0.25 }),
        goldFlame: new THREE.MeshStandardMaterial({ color: 0xf59e0b, emissive: 0xf59e0b, emissiveIntensity: 1.5, roughness: 0.2 }),
        wood: new THREE.MeshStandardMaterial({ color: 0x78350f, roughness: 0.8 }),
        signFace: new THREE.MeshStandardMaterial({ map: signTexture, roughness: 0.4 }),
        pinRed: new THREE.MeshStandardMaterial({ color: 0xdc2626, roughness: 0.25, metalness: 0.1 }),
        pinBadge: new THREE.MeshStandardMaterial({ map: pinBadgeTexture, roughness: 0.2 }),
        cloud: new THREE.MeshStandardMaterial({ color: 0xffffff, roughness: 0.2, transparent: true, opacity: 0.92 }),
    };

    // 6. Island Diorama Floating Base
    const islandGeo = new THREE.CylinderGeometry(4.3, 4.6, 0.45, 40);
    const islandMesh = new THREE.Mesh(islandGeo, mats.islandBase);
    islandMesh.position.y = -0.22;
    islandMesh.receiveShadow = true;
    worldGroup.add(islandMesh);

    const grassGeo = new THREE.CylinderGeometry(4.28, 4.28, 0.08, 40);
    const grassMesh = new THREE.Mesh(grassGeo, mats.grass);
    grassMesh.position.y = 0.04;
    grassMesh.receiveShadow = true;
    worldGroup.add(grassMesh);

    // 7. Curved Asphalt Highway Road
    const roadShape = new THREE.Shape();
    const roadInnerR = 2.3;
    const roadOuterR = 3.85;
    roadShape.absarc(0, 0, roadOuterR, -Math.PI * 0.88, Math.PI * 0.38, false);
    roadShape.absarc(0, 0, roadInnerR, Math.PI * 0.38, -Math.PI * 0.88, true);

    const roadGeo = new THREE.ShapeGeometry(roadShape, 36);
    const roadMesh = new THREE.Mesh(roadGeo, mats.road);
    roadMesh.rotation.x = -Math.PI / 2;
    roadMesh.position.y = 0.09;
    roadMesh.receiveShadow = true;
    worldGroup.add(roadMesh);

    // Road Outer Concrete Curb
    const curbCurve = new THREE.EllipseCurve(0, 0, roadOuterR + 0.05, roadOuterR + 0.05, -Math.PI * 0.88, Math.PI * 0.38, false, 0);
    const curbPts = curbCurve.getPoints(40);
    const curbShape = new THREE.Shape();
    curbShape.absarc(0, 0, roadOuterR + 0.14, -Math.PI * 0.88, Math.PI * 0.38, false);
    curbShape.absarc(0, 0, roadOuterR - 0.02, Math.PI * 0.38, -Math.PI * 0.88, true);
    const curbGeo = new THREE.ShapeGeometry(curbShape, 40);
    const curbMesh = new THREE.Mesh(curbGeo, mats.curb);
    curbMesh.rotation.x = -Math.PI / 2;
    curbMesh.position.y = 0.11;
    worldGroup.add(curbMesh);

    // Moving White Dashed Stripes (Highway illusion)
    const stripeCount = 14;
    const stripeMeshes = [];
    const stripeR = (roadInnerR + roadOuterR) / 2;

    for (let i = 0; i < stripeCount; i++) {
        const segGeo = new THREE.PlaneGeometry(0.38, 0.075);
        const segMesh = new THREE.Mesh(segGeo, mats.roadMarking);
        segMesh.rotation.x = -Math.PI / 2;
        segMesh.position.y = 0.105;
        worldGroup.add(segMesh);
        stripeMeshes.push({ mesh: segMesh, angleOffset: (i / stripeCount) * (Math.PI * 1.26) - Math.PI * 0.88 });
    }

    // 8. 3D EXECUTIVE TOUR BUS (Modeled exactly like bus.png)
    const busGroup = new THREE.Group();
    worldGroup.add(busGroup);

    // Position bus along the curved road
    const busAngle = -0.22;
    const busDistance = (roadInnerR + roadOuterR) / 2;
    busGroup.position.set(Math.cos(busAngle) * busDistance, 0.44, Math.sin(busAngle) * busDistance);
    busGroup.rotation.y = -busAngle + Math.PI / 2 + 0.12;

    // Bus Main Lower Body (Glossy Red)
    const bodyLowerGeo = new THREE.BoxGeometry(1.32, 0.78, 3.3);
    const bodyLower = new THREE.Mesh(bodyLowerGeo, mats.busRed);
    bodyLower.position.y = 0.46;
    bodyLower.castShadow = true;
    bodyLower.receiveShadow = true;
    busGroup.add(bodyLower);

    // Lower Skirting (Dark Red accent line)
    const skirtingGeo = new THREE.BoxGeometry(1.34, 0.14, 3.28);
    const skirting = new THREE.Mesh(skirtingGeo, mats.busDarkRed);
    skirting.position.y = 0.12;
    busGroup.add(skirting);

    // Front Aerodynamic Curved Nose (Jetbus SHD hood)
    const noseGeo = new THREE.CylinderGeometry(0.66, 0.66, 1.32, 20, 1, false, 0, Math.PI);
    const noseMesh = new THREE.Mesh(noseGeo, mats.busRed);
    noseMesh.rotation.z = Math.PI / 2;
    noseMesh.position.set(0, 0.68, 1.55);
    busGroup.add(noseMesh);

    // Front Black Fascia / Grille Mask
    const fasciaGeo = new THREE.BoxGeometry(1.33, 0.42, 0.28);
    const fasciaMesh = new THREE.Mesh(fasciaGeo, mats.busBlackFascia);
    fasciaMesh.position.set(0, 0.32, 1.58);
    busGroup.add(fasciaMesh);

    // Front Bumper Lower Lip
    const bumperGeo = new THREE.BoxGeometry(1.34, 0.16, 0.22);
    const bumperMesh = new THREE.Mesh(bumperGeo, mats.rubber);
    bumperMesh.position.set(0, 0.12, 1.62);
    busGroup.add(bumperMesh);

    // Double-Glass Windshield ("Bando" divider beam)
    // Lower Windshield
    const windshieldLowerGeo = new THREE.BoxGeometry(1.28, 0.36, 0.2);
    const windshieldLower = new THREE.Mesh(windshieldLowerGeo, mats.glass);
    windshieldLower.position.set(0, 0.64, 1.56);
    windshieldLower.rotation.x = -0.16;
    busGroup.add(windshieldLower);

    // Red Divider Beam ("Bando Jetbus")
    const bandoGeo = new THREE.BoxGeometry(1.32, 0.08, 0.22);
    const bandoMesh = new THREE.Mesh(bandoGeo, mats.busRed);
    bandoMesh.position.set(0, 0.82, 1.52);
    bandoMesh.rotation.x = -0.16;
    busGroup.add(bandoMesh);

    // Upper Windshield (Panoramic view)
    const windshieldUpperGeo = new THREE.BoxGeometry(1.28, 0.24, 0.2);
    const windshieldUpper = new THREE.Mesh(windshieldUpperGeo, mats.glass);
    windshieldUpper.position.set(0, 0.98, 1.48);
    windshieldUpper.rotation.x = -0.22;
    busGroup.add(windshieldUpper);

    // Side Panoramic Windows (Dark tinted glass with passenger view)
    const sideWindowGeo = new THREE.BoxGeometry(1.34, 0.46, 2.3);
    const sideWindows = new THREE.Mesh(sideWindowGeo, mats.glass);
    sideWindows.position.set(0, 0.74, -0.12);
    busGroup.add(sideWindows);

    // Window Pillars (Separators)
    [-0.8, -0.2, 0.4].forEach((zPos) => {
        const pillarGeo = new THREE.BoxGeometry(1.35, 0.47, 0.06);
        const pillar = new THREE.Mesh(pillarGeo, mats.busRed);
        pillar.position.set(0, 0.74, zPos);
        busGroup.add(pillar);
    });

    // Bus Roof & AC Unit (White/Silver)
    const roofGeo = new THREE.BoxGeometry(1.3, 0.12, 3.2);
    const roofMesh = new THREE.Mesh(roofGeo, mats.busWhite);
    roofMesh.position.y = 1.02;
    roofMesh.castShadow = true;
    busGroup.add(roofMesh);

    const acGeo = new THREE.BoxGeometry(0.72, 0.14, 0.95);
    const acMesh = new THREE.Mesh(acGeo, mats.busWhite);
    acMesh.position.set(0, 1.13, -0.3);
    busGroup.add(acMesh);

    // ICONIC INDONESIAN "SPION TANDUK" (Red Curved Elephant-Ear Mirrors from bus.png)
    function createSpionTanduk(isRight) {
        const spionGroup = new THREE.Group();
        const s = isRight ? 1 : -1;

        // Curved mirror tube arm
        const curve = new THREE.CatmullRomCurve3([
            new THREE.Vector3(s * 0.62, 1.05, 1.45),
            new THREE.Vector3(s * 0.88, 1.18, 1.58),
            new THREE.Vector3(s * 0.92, 0.82, 1.62),
            new THREE.Vector3(s * 0.88, 0.55, 1.56),
        ]);
        const tubeGeo = new THREE.TubeGeometry(curve, 18, 0.038, 8, false);
        const tubeMesh = new THREE.Mesh(tubeGeo, mats.busRed);
        tubeMesh.castShadow = true;
        spionGroup.add(tubeMesh);

        // Mirror casing housing
        const mirrorHousingGeo = new THREE.BoxGeometry(0.12, 0.28, 0.08);
        const mirrorHousing = new THREE.Mesh(mirrorHousingGeo, mats.busRed);
        mirrorHousing.position.set(s * 0.88, 0.72, 1.6);
        spionGroup.add(mirrorHousing);

        // Mirror reflective glass facing rearwards
        const mirrorGlassGeo = new THREE.PlaneGeometry(0.09, 0.24);
        const mirrorGlass = new THREE.Mesh(mirrorGlassGeo, mats.rim);
        mirrorGlass.position.set(s * 0.88, 0.72, 1.55);
        mirrorGlass.rotation.y = Math.PI;
        spionGroup.add(mirrorGlass);

        return spionGroup;
    }

    busGroup.add(createSpionTanduk(false)); // Left mirror
    busGroup.add(createSpionTanduk(true));  // Right mirror

    // Headlights (4 round glowing projector bulbs matching bus.png)
    const hlGeo = new THREE.SphereGeometry(0.075, 14, 14);

    // Left Headlights (upper & lower)
    const hlLeftUp = new THREE.Mesh(hlGeo, mats.headlight);
    hlLeftUp.position.set(-0.46, 0.38, 1.71);
    busGroup.add(hlLeftUp);

    const hlLeftDown = new THREE.Mesh(hlGeo, mats.headlight);
    hlLeftDown.position.set(-0.46, 0.24, 1.71);
    busGroup.add(hlLeftDown);

    // Right Headlights (upper & lower)
    const hlRightUp = new THREE.Mesh(hlGeo, mats.headlight);
    hlRightUp.position.set(0.46, 0.38, 1.71);
    busGroup.add(hlRightUp);

    const hlRightDown = new THREE.Mesh(hlGeo, mats.headlight);
    hlRightDown.position.set(0.46, 0.24, 1.71);
    busGroup.add(hlRightDown);

    // Amber Turn / Fog Lights
    const fogGeo = new THREE.BoxGeometry(0.18, 0.08, 0.06);
    const fogLeft = new THREE.Mesh(fogGeo, mats.foglight);
    fogLeft.position.set(-0.56, 0.18, 1.68);
    busGroup.add(fogLeft);

    const fogRight = new THREE.Mesh(fogGeo, mats.foglight);
    fogRight.position.set(0.56, 0.18, 1.68);
    busGroup.add(fogRight);

    // Dual Forward Projector Spotlights
    const spotLeft = new THREE.SpotLight(0xfef08a, 4.5, 9, Math.PI / 7, 0.6, 1);
    spotLeft.position.set(-0.46, 0.3, 1.75);
    const spotTarget = new THREE.Object3D();
    spotTarget.position.set(0, 0, 5.5);
    busGroup.add(spotTarget);
    spotLeft.target = spotTarget;
    busGroup.add(spotLeft);

    const spotRight = new THREE.SpotLight(0xfef08a, 4.5, 9, Math.PI / 7, 0.6, 1);
    spotRight.position.set(0.46, 0.3, 1.75);
    spotRight.target = spotTarget;
    busGroup.add(spotRight);

    // Taillights
    const tlGeo = new THREE.BoxGeometry(0.22, 0.09, 0.05);
    const tlLeft = new THREE.Mesh(tlGeo, mats.taillight);
    tlLeft.position.set(-0.52, 0.48, -1.66);
    busGroup.add(tlLeft);

    const tlRight = new THREE.Mesh(tlGeo, mats.taillight);
    tlRight.position.set(0.52, 0.48, -1.66);
    busGroup.add(tlRight);

    // 4 Realistic Rotating Wheels with Alloy Rims
    const wheels = [];
    const wheelPositions = [
        { x: -0.69, y: 0, z: 0.98 },
        { x: 0.69, y: 0, z: 0.98 },
        { x: -0.69, y: 0, z: -0.92 },
        { x: 0.69, y: 0, z: -0.92 },
    ];

    wheelPositions.forEach((pos) => {
        const wheelGroup = new THREE.Group();
        wheelGroup.position.set(pos.x, pos.y, pos.z);

        // Rubber Tire
        const tireGeo = new THREE.CylinderGeometry(0.28, 0.28, 0.18, 24);
        const tire = new THREE.Mesh(tireGeo, mats.rubber);
        tire.rotation.z = Math.PI / 2;
        tire.castShadow = true;
        wheelGroup.add(tire);

        // Silver Alloy Rim
        const rimGeo = new THREE.CylinderGeometry(0.18, 0.18, 0.19, 20);
        const rimMesh = new THREE.Mesh(rimGeo, mats.rim);
        rimMesh.rotation.z = Math.PI / 2;
        wheelGroup.add(rimMesh);

        // Hubcap center & 5 Spokes
        const hubGeo = new THREE.CylinderGeometry(0.07, 0.07, 0.20, 12);
        const hubMesh = new THREE.Mesh(hubGeo, mats.busRed);
        hubMesh.rotation.z = Math.PI / 2;
        wheelGroup.add(hubMesh);

        for (let s = 0; s < 5; s++) {
            const spokeGeo = new THREE.BoxGeometry(0.035, 0.24, 0.195);
            const spoke = new THREE.Mesh(spokeGeo, mats.rim);
            spoke.rotation.x = (s / 5) * Math.PI;
            wheelGroup.add(spoke);
        }

        busGroup.add(wheelGroup);
        wheels.push(wheelGroup);
    });

    // 9. GIANT 3D LOCATION PIN WITH NIRWANA LOGO BADGE (From bus.png)
    const pinGroup = new THREE.Group();
    pinGroup.position.set(0, 1.85, 0.2);
    busGroup.add(pinGroup);

    // Pin Bulb (Sphere)
    const pinHeadGeo = new THREE.SphereGeometry(0.46, 28, 28);
    const pinHead = new THREE.Mesh(pinHeadGeo, mats.pinRed);
    pinHead.castShadow = true;
    pinGroup.add(pinHead);

    // Pin Pointed Tip (Cone pointing downwards)
    const pinTipGeo = new THREE.ConeGeometry(0.46, 0.66, 28);
    const pinTip = new THREE.Mesh(pinTipGeo, mats.pinRed);
    pinTip.rotation.x = Math.PI;
    pinTip.position.y = -0.34;
    pinTip.castShadow = true;
    pinGroup.add(pinTip);

    // Circular Logo Badge on Pin Face (Front)
    const badgeGeo = new THREE.CylinderGeometry(0.28, 0.28, 0.06, 28);
    const badgeFront = new THREE.Mesh(badgeGeo, mats.pinBadge);
    badgeFront.rotation.x = Math.PI / 2;
    badgeFront.position.z = 0.42;
    pinGroup.add(badgeFront);

    // Circular Logo Badge on Pin Face (Back)
    const badgeBack = new THREE.Mesh(badgeGeo, mats.pinBadge);
    badgeBack.rotation.x = -Math.PI / 2;
    badgeBack.position.z = -0.42;
    pinGroup.add(badgeBack);

    // 10. WOODEN SIGNBOARD IN FOREGROUND (From bus.png)
    const signGroup = new THREE.Group();
    signGroup.position.set(-2.45, 0.08, 1.55);
    signGroup.rotation.y = 0.32;
    worldGroup.add(signGroup);

    // Two Wooden Timber Posts with Beveled Tops
    [-0.38, 0.38].forEach((x) => {
        const postGeo = new THREE.CylinderGeometry(0.065, 0.07, 1.15, 10);
        const post = new THREE.Mesh(postGeo, mats.wood);
        post.position.set(x, 0.58, 0);
        post.castShadow = true;
        signGroup.add(post);
    });

    // Carved Wood Board with High-Res Texture
    const boardGeo = new THREE.BoxGeometry(1.36, 0.68, 0.1);
    const board = new THREE.Mesh(boardGeo, mats.signFace);
    board.position.set(0, 0.85, 0.05);
    board.castShadow = true;
    signGroup.add(board);

    // Natural Flowers & River Stones at the base of the sign (From bus.png)
    function createDaisy(scale = 1) {
        const flower = new THREE.Group();
        flower.scale.setScalar(scale);

        // Center yellow pistil
        const pistilGeo = new THREE.SphereGeometry(0.045, 10, 10);
        const pistilMat = new THREE.MeshStandardMaterial({ color: 0xfacc15, roughness: 0.4 });
        flower.add(new THREE.Mesh(pistilGeo, pistilMat));

        // 6 White petals
        const petalGeo = new THREE.ConeGeometry(0.035, 0.1, 8);
        petalGeo.rotateX(Math.PI / 2);
        const petalMat = new THREE.MeshStandardMaterial({ color: 0xffffff, roughness: 0.3 });
        for (let p = 0; p < 6; p++) {
            const petal = new THREE.Mesh(petalGeo, petalMat);
            petal.rotation.y = (p / 6) * Math.PI * 2;
            petal.position.x = Math.cos(petal.rotation.y) * 0.045;
            petal.position.z = Math.sin(petal.rotation.y) * 0.045;
            flower.add(petal);
        }
        return flower;
    }

    // River Stones
    const stoneGeo1 = new THREE.DodecahedronGeometry(0.14);
    const stone1 = new THREE.Mesh(stoneGeo1, mats.stone);
    stone1.position.set(-0.48, 0.08, 0.22);
    stone1.scale.set(1.2, 0.7, 1.0);
    signGroup.add(stone1);

    const stone2 = new THREE.Mesh(stoneGeo1, mats.stone);
    stone2.position.set(0.42, 0.08, 0.24);
    stone2.scale.set(1.4, 0.8, 1.1);
    signGroup.add(stone2);

    // Little white daisies around the sign
    const flower1 = createDaisy(1.1);
    flower1.position.set(-0.35, 0.12, 0.3);
    flower1.rotation.x = 0.2;
    signGroup.add(flower1);

    const flower2 = createDaisy(0.9);
    flower2.position.set(0.2, 0.1, 0.32);
    flower2.rotation.x = 0.15;
    signGroup.add(flower2);

    const flower3 = createDaisy(1.2);
    flower3.position.set(0.55, 0.11, 0.2);
    flower3.rotation.x = -0.1;
    signGroup.add(flower3);

    // Shrub / Grass blades clump around sign
    for (let g = 0; g < 8; g++) {
        const bladeGeo = new THREE.ConeGeometry(0.03, 0.22, 5);
        const blade = new THREE.Mesh(bladeGeo, mats.treeFoliageLight);
        blade.position.set(-0.3 + g * 0.08, 0.11, 0.15 + (g % 2) * 0.08);
        blade.rotation.z = (Math.random() - 0.5) * 0.4;
        blade.rotation.x = (Math.random() - 0.5) * 0.4;
        signGroup.add(blade);
    }

    // 11. ICONIC INDONESIAN LANDMARKS IN BACKGROUND (From bus.png)

    // A. Monas (Monumen Nasional Jakarta)
    const monasGroup = new THREE.Group();
    monasGroup.position.set(-1.85, 0.08, -1.35);
    worldGroup.add(monasGroup);

    // Square Base Plinth 1
    const monasBase1 = new THREE.Mesh(new THREE.BoxGeometry(1.3, 0.15, 1.3), mats.monasWhite);
    monasBase1.position.y = 0.075;
    monasBase1.castShadow = true;
    monasGroup.add(monasBase1);

    // Square Base Plinth 2
    const monasBase2 = new THREE.Mesh(new THREE.BoxGeometry(1.0, 0.18, 1.0), mats.monasWhite);
    monasBase2.position.y = 0.24;
    monasBase2.castShadow = true;
    monasGroup.add(monasBase2);

    // Quadrangular Saucer Cup (Cawan Monas)
    const cawanGeo = new THREE.CylinderGeometry(0.65, 0.45, 0.28, 4);
    const cawanMesh = new THREE.Mesh(cawanGeo, mats.monasWhite);
    cawanMesh.position.y = 0.46;
    cawanMesh.rotation.y = Math.PI / 4;
    monasGroup.add(cawanMesh);

    // Tapering Obelisk Shaft
    const shaftGeo = new THREE.CylinderGeometry(0.09, 0.18, 2.5, 4);
    const shaftMesh = new THREE.Mesh(shaftGeo, mats.monasWhite);
    shaftMesh.position.y = 1.8;
    shaftMesh.rotation.y = Math.PI / 4;
    shaftMesh.castShadow = true;
    monasGroup.add(shaftMesh);

    // Observation Deck
    const deckGeo = new THREE.CylinderGeometry(0.18, 0.12, 0.09, 16);
    const deckMesh = new THREE.Mesh(deckGeo, mats.monasWhite);
    deckMesh.position.y = 3.08;
    monasGroup.add(deckMesh);

    // Flaming Golden Torch (Lidah Api Kemerdekaan)
    const flameGeo = new THREE.ConeGeometry(0.13, 0.38, 16);
    const flameMesh = new THREE.Mesh(flameGeo, mats.goldFlame);
    flameMesh.position.y = 3.32;
    monasGroup.add(flameMesh);

    const flameLight = new THREE.PointLight(0xf59e0b, 1.8, 3.5);
    flameLight.position.y = 3.32;
    monasGroup.add(flameLight);

    // B. Candi Borobudur (Central Great Stupa + Surrounding Bell Stupas)
    const stupaGroup = new THREE.Group();
    stupaGroup.position.set(0.65, 0.08, -1.85);
    worldGroup.add(stupaGroup);

    // Stepped Platform 1 & 2
    const stupaPlinth1 = new THREE.Mesh(new THREE.CylinderGeometry(1.4, 1.5, 0.22, 24), mats.stone);
    stupaPlinth1.position.y = 0.11;
    stupaPlinth1.castShadow = true;
    stupaGroup.add(stupaPlinth1);

    const stupaPlinth2 = new THREE.Mesh(new THREE.CylinderGeometry(1.05, 1.2, 0.24, 24), mats.stone);
    stupaPlinth2.position.y = 0.34;
    stupaGroup.add(stupaPlinth2);

    // Central Grand Stupa (Stupa Induk)
    const mainDomeGeo = new THREE.SphereGeometry(0.72, 24, 24, 0, Math.PI * 2, 0, Math.PI * 0.58);
    const mainDome = new THREE.Mesh(mainDomeGeo, mats.stone);
    mainDome.position.y = 0.46;
    mainDome.castShadow = true;
    stupaGroup.add(mainDome);

    // Crowning Spire (Yasti)
    const spireGeo = new THREE.CylinderGeometry(0.06, 0.14, 0.72, 14);
    const spire = new THREE.Mesh(spireGeo, mats.stone);
    spire.position.y = 1.15;
    spire.castShadow = true;
    stupaGroup.add(spire);

    // 4 Flanking Bell Stupas around Borobudur terrace
    const bellAngles = [0.35, 1.15, 2.0, 2.8];
    bellAngles.forEach((ang) => {
        const rad = 0.82;
        const bx = Math.cos(ang) * rad;
        const bz = Math.sin(ang) * rad;

        const bellGeo = new THREE.ConeGeometry(0.22, 0.42, 14);
        const bell = new THREE.Mesh(bellGeo, mats.stone);
        bell.position.set(bx, 0.55, bz);
        stupaGroup.add(bell);

        const bellSpire = new THREE.Mesh(new THREE.CylinderGeometry(0.03, 0.04, 0.22, 8), mats.stone);
        bellSpire.position.set(bx, 0.82, bz);
        stupaGroup.add(bellSpire);
    });

    // C. Lush Pine Trees (Cartoon Style from bus.png)
    function createPineTree(x, z, scale = 1) {
        const treeGroup = new THREE.Group();
        treeGroup.position.set(x, 0.08, z);
        treeGroup.scale.setScalar(scale);

        // Trunk
        const trunkGeo = new THREE.CylinderGeometry(0.08, 0.11, 0.45, 8);
        const trunk = new THREE.Mesh(trunkGeo, mats.treeTrunk);
        trunk.position.y = 0.22;
        treeGroup.add(trunk);

        // 3 Tiers of conical pine foliage
        const tiers = [
            { y: 0.52, r: 0.58, h: 0.55 },
            { y: 0.86, r: 0.45, h: 0.48 },
            { y: 1.18, r: 0.32, h: 0.42 },
        ];
        tiers.forEach((t, idx) => {
            const coneGeo = new THREE.ConeGeometry(t.r, t.h, 10);
            const cone = new THREE.Mesh(coneGeo, idx === 1 ? mats.treeFoliageLight : mats.treeFoliage);
            cone.position.y = t.y;
            cone.castShadow = true;
            treeGroup.add(cone);
        });

        worldGroup.add(treeGroup);
    }

    createPineTree(-3.2, -0.6, 1.25);
    createPineTree(-2.8, -1.7, 1.05);
    createPineTree(-0.9, -2.2, 0.95);
    createPineTree(2.2, -1.6, 1.15);
    createPineTree(3.1, -0.2, 1.05);

    // Rounded Green Shrubs framing the background
    const shrubGeo = new THREE.SphereGeometry(0.35, 12, 12);
    [
        { x: -1.2, z: -1.6, s: 0.9 },
        { x: -0.4, z: -2.0, s: 1.1 },
        { x: 1.5, z: -1.8, s: 1.0 },
        { x: 2.7, z: -0.9, s: 0.85 },
    ].forEach((sh) => {
        const shrub = new THREE.Mesh(shrubGeo, mats.treeFoliageLight);
        shrub.position.set(sh.x, 0.25, sh.z);
        shrub.scale.set(sh.s, sh.s * 0.8, sh.s);
        worldGroup.add(shrub);
    });

    // D. Soft Floating 3D Clouds in the Sky
    const clouds = [];
    function createCloud(x, y, z, scale = 1) {
        const cloudGroup = new THREE.Group();
        cloudGroup.position.set(x, y, z);
        cloudGroup.scale.setScalar(scale);

        const puffs = [
            { x: 0, y: 0, z: 0, r: 0.38 },
            { x: -0.32, y: -0.06, z: 0, r: 0.28 },
            { x: 0.34, y: -0.05, z: 0, r: 0.30 },
            { x: 0.12, y: 0.20, z: 0, r: 0.24 },
        ];

        puffs.forEach((p) => {
            const puff = new THREE.Mesh(new THREE.SphereGeometry(p.r, 14, 14), mats.cloud);
            puff.position.set(p.x, p.y, p.z);
            cloudGroup.add(puff);
        });

        worldGroup.add(cloudGroup);
        clouds.push({ group: cloudGroup, initialX: x });
    }

    createCloud(-2.4, 3.4, -1.6, 1.2);
    createCloud(1.8, 3.6, -2.3, 1.35);
    createCloud(3.2, 2.7, 0.4, 0.95);

    // 12. Interactive Mouse Drag / Touch Parallax
    let isDragging = false;
    let prevPointerX = 0;
    let targetOrbitY = 0;
    let targetCameraY = 4.4;

    const onPointerDown = (e) => {
        isDragging = true;
        prevPointerX = e.clientX || (e.touches && e.touches[0].clientX) || 0;
    };

    const onPointerMove = (e) => {
        const clientX = e.clientX || (e.touches && e.touches[0].clientX) || 0;

        if (isDragging) {
            const delta = clientX - prevPointerX;
            targetOrbitY += delta * 0.008;
            prevPointerX = clientX;
        } else {
            const rect = container.getBoundingClientRect();
            const normX = (e.clientX - rect.left) / width - 0.5;
            const normY = (e.clientY - rect.top) / height - 0.5;
            targetOrbitY += normX * 0.0006;
            targetCameraY = 4.4 - normY * 0.6;
        }
    };

    const onPointerUp = () => {
        isDragging = false;
    };

    container.addEventListener('mousedown', onPointerDown);
    window.addEventListener('mousemove', onPointerMove, { passive: true });
    window.addEventListener('mouseup', onPointerUp);

    container.addEventListener('touchstart', onPointerDown, { passive: true });
    window.addEventListener('touchmove', onPointerMove, { passive: true });
    window.addEventListener('touchend', onPointerUp);

    // Click: Cheerful Bus Honk Jump & Flash!
    let flashTimer = 0;
    container.addEventListener('click', () => {
        flashTimer = 1.0;
        busGroup.position.y = 0.58; // Cute horn bounce
    });

    // Resize Handler
    const handleResize = () => {
        if (!container) return;
        width = container.clientWidth || 550;
        height = container.clientHeight || 550;
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer.setSize(width, height);
    };
    window.addEventListener('resize', handleResize);

    // 13. Animation Loop
    const clock = new THREE.Clock();
    let animId;

    const animate = () => {
        animId = requestAnimationFrame(animate);
        const elapsedTime = clock.getElapsedTime();

        // 1. Bus Suspension & Engine Vibration
        const idleBounce = Math.sin(elapsedTime * 12) * 0.016 + Math.sin(elapsedTime * 24) * 0.006;
        if (busGroup.position.y > 0.45) {
            busGroup.position.y += (0.44 + idleBounce - busGroup.position.y) * 0.12;
        } else {
            busGroup.position.y = 0.44 + idleBounce;
        }

        // Slight rolling body tilt on turns
        busGroup.rotation.z = Math.sin(elapsedTime * 5.5) * 0.012;

        // 2. Wheel Rotation (Continual Driving Motion)
        wheels.forEach((w) => {
            w.children.forEach((c) => {
                c.rotation.x += 0.18;
            });
        });

        // 3. Moving Road Stripes (Dashed lines moving backwards)
        const stripeSpeed = 0.016;
        stripeMeshes.forEach((item) => {
            item.angleOffset -= stripeSpeed;
            if (item.angleOffset < -Math.PI * 0.88) {
                item.angleOffset += Math.PI * 1.26;
            }
            item.mesh.position.x = Math.cos(item.angleOffset) * stripeR;
            item.mesh.position.z = Math.sin(item.angleOffset) * stripeR;
            item.mesh.rotation.z = -item.angleOffset + Math.PI / 2;
        });

        // 4. Floating Location Pin Bobbing & Rotating above Bus
        pinGroup.position.y = 1.85 + Math.sin(elapsedTime * 3.5) * 0.14;
        pinGroup.rotation.y = Math.sin(elapsedTime * 2) * 0.22;

        // 5. Monas Flame Flickering Glow
        mats.goldFlame.emissiveIntensity = 1.4 + Math.sin(elapsedTime * 9) * 0.45;
        flameLight.intensity = 1.8 + Math.sin(elapsedTime * 9) * 0.6;

        // 6. Gentle Cloud Drifting
        clouds.forEach((c, idx) => {
            c.group.position.x = c.initialX + Math.sin(elapsedTime * 0.4 + idx) * 0.28;
        });

        // 7. Headlight Flash on click
        if (flashTimer > 0) {
            flashTimer -= 0.05;
            spotLeft.intensity = 4.5 + flashTimer * 16;
            spotRight.intensity = 4.5 + flashTimer * 16;
        } else {
            spotLeft.intensity = 4.5 + Math.sin(elapsedTime * 4) * 0.5;
            spotRight.intensity = 4.5 + Math.sin(elapsedTime * 4) * 0.5;
        }

        // 8. Turntable Orbit & Camera Soft Damping
        if (!isDragging) {
            targetOrbitY += 0.0012; // Slow graceful turntable orbit
        }
        worldGroup.rotation.y += (targetOrbitY - worldGroup.rotation.y) * 0.05;
        camera.position.y += (targetCameraY - camera.position.y) * 0.05;
        camera.lookAt(0, 0.65, 0);

        renderer.render(scene, camera);
    };

    animate();

    return () => {
        cancelAnimationFrame(animId);
        window.removeEventListener('resize', handleResize);
        window.removeEventListener('mousemove', onPointerMove);
        container.removeEventListener('mousedown', onPointerDown);
        renderer.dispose();
    };
}
