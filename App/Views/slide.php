<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider d'Images Simple</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        .slider-container {
            max-width: 1000px;
            margin: 30px auto;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .slides {
            width: 100%;
            height: 500px;
            position: relative;
        }

        .slide {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.6s ease-in-out;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .slider-nav {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 10;
        }

        .slider-nav label {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .slider-nav label:hover {
            background-color: rgba(255, 255, 255, 0.8);
            transform: scale(1.2);
        }

        input[type="radio"] {
            display: none;
        }

        #slide1:checked ~ .slides .slide:nth-child(1),
        #slide2:checked ~ .slides .slide:nth-child(2),
        #slide3:checked ~ .slides .slide:nth-child(3),
        #slide4:checked ~ .slides .slide:nth-child(4),
        #slide5:checked ~ .slides .slide:nth-child(5) {
            opacity: 1;
        }

        #slide1:checked ~ .slider-nav label:nth-child(1),
        #slide2:checked ~ .slider-nav label:nth-child(2),
        #slide3:checked ~ .slider-nav label:nth-child(3),
        #slide4:checked ~ .slider-nav label:nth-child(4),
        #slide5:checked ~ .slider-nav label:nth-child(5) {
            background-color: white;
            transform: scale(1.2);
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.8);
        }

        /* Auto-slide animation */
        @keyframes slide {
            0%, 16% { opacity: 0; }
            20%, 36% { opacity: 1; }
            40%, 100% { opacity: 0; }
        }

        .auto-slide .slide:nth-child(1) { animation: slide 25s infinite 0s; }
        .auto-slide .slide:nth-child(2) { animation: slide 25s infinite 5s; }
        .auto-slide .slide:nth-child(3) { animation: slide 25s infinite 10s; }
        .auto-slide .slide:nth-child(4) { animation: slide 25s infinite 15s; }
        .auto-slide .slide:nth-child(5) { animation: slide 25s infinite 20s; }

        /* Responsive styles */
        @media (max-width: 768px) {
            .slider-container {
                margin: 20px auto;
            }

            .slides {
                height: 400px;
            }
        }

        @media (max-width: 480px) {
            .slides {
                height: 300px;
            }

            .slider-nav {
                bottom: 15px;
            }
            
            .slider-nav label {
                width: 10px;
                height: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="slider-container">
        <input type="radio" name="slider" id="slide1" checked>
        <input type="radio" name="slider" id="slide2">
        <input type="radio" name="slider" id="slide3">
        <input type="radio" name="slider" id="slide4">
        <input type="radio" name="slider" id="slide5">

        <div class="slider-nav">
            <label for="slide1"></label>
            <label for="slide2"></label>
            <label for="slide3"></label>
            <label for="slide4"></label>
            <label for="slide5"></label>
        </div>

        <div class="slides auto-slide">
            <div class="slide">
                <img src="https://avatar.iran.liara.run/public/28" alt="Image 1">
            </div>
            <div class="slide">
                <img src="https://avatar.iran.liara.run/public/34" alt="Image 2">
            </div>
            <div class="slide">
                <img src="https://avatar.iran.liara.run/public/18" alt="Image 3">
            </div>
            <div class="slide">
                <img src="https://avatar.iran.liara.run/public/2" alt="Image 4">
            </div>
            <div class="slide">
                <img src="https://avatar.iran.liara.run/public/41" alt="Image 5">
            </div>
        </div>
    </div>
</body>
</html>