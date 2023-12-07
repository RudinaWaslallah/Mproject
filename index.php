<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T-shirt Design Maker</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
<body>
    <div id="app">
        <h1>T-shirt Design Maker</h1>
        <div id="tshirt-container">
            <div id="text-overlay" class="overlay"></div>
            <div id="logo-overlay" class="overlay"></div>
            <img id="tshirt-img" src="Tshirts-images\WhiteT-shirt1.png" alt="T-shirt">
            <div id="canvas-container"></div>
        </div>
        <div id="color-selector">
            <label for="color">T-shirt Color:</label>
            <select id="color" onchange="changeTshirtColor()">
                <option value="white">White</option>
                <option value="yellow">Yellow</option>
                <option value="pink">Pink</option>
                <option value="blue">Blue</option>
                <option value="baby-pink">Baby Pink</option>
            </select>
        </div>
        <div id="size-input">
            <label for="tshirt-size">T-shirt Size:</label>
            <select id="tshirt-size">
                <option value="s">Small</option>
                <option value="m">Medium</option>
                <option value="l">Large</option>
                <option value="xl">X-Large</option>
            </select>
        </div>
        <div id="text-input">
            <label for="text">Add Text:</label>
            <input type="text" id="text" placeholder="Enter text">
        </div>
        <div id="color-input">
            <label for="text-color">Text Color:</label>
            <input type="color" id="text-color" value="#ffffff">
        </div>
        <div id="logo-input">
            <label for="logo">Add Logo:</label>
            <input type="file" id="logo" accept="image/*" onchange="loadLogo()">
        </div>
        <div id="logo-size-input">
            <label for="logo-size">Logo Size:</label>
            <input type="number" id="logo-size" value="90" min="85" max="100" step="1" onchange="resizeLogo()">
        </div>
        <!-- إضافة أزرار الأسهم -->
       
<div id="arrow-buttons">
    <button id="up-arrow" onclick="moveLogo('up')">↑</button>
    <button id="down-arrow" onclick="moveLogo('down')">↓</button>
    <button id="left-arrow" onclick="moveLogo('left')">←</button>
    <button id="right-arrow" onclick="moveLogo('right')">→</button>
</div>
        <div id="buttons-container">
            <button class="button-design" onclick="customizeTshirt()">Create design</button>
            <button class="button-design" onclick="saveDesign()">Save Design</button>
            <button class="button-design" onclick="addToCart()">Add To Cart</button>
            <button class="button-design" onclick="viewSavedDesigns()">Previous Designs</button>
        </div>

        <div class="drawing-area">
            <div class="canvas-container">
                <canvas id="tshirt-canvas" width="200" height="400"></canvas>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>
