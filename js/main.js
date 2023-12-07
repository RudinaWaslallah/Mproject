// Function to change the T-shirt color based on user selection

function changeTshirtColor() {
  const tshirtImg = document.getElementById('tshirt-img');
  const canvasContainer = document.getElementById('canvas-container');
  const colorSelector = document.getElementById('color');

  switch (colorSelector.value) {
    case 'white':
      tshirtImg.src = 'Tshirts-images/WhiteT-shirt.png';
      break;
    case 'yellow':
      tshirtImg.src = 'Tshirts-images/YallowT-shirt.png';
      break;
    case 'pink':
      tshirtImg.src = 'Tshirts-images/PinkT-shirt.png';
      break;
    case 'blue':
      tshirtImg.src = 'Tshirts-images/BlueT-shirt.png';
      break;
    case 'baby-pink':
      tshirtImg.src = 'Tshirts-images/BabyPinkT-shirt.png';
      break;
  }

  // Change canvas container background color based on T-shirt color
  canvasContainer.style.backgroundColor = colorSelector.value === 'white' ? 'black' : 'white';
}

// Function to customize the T-shirt with user input
function customizeTshirt() {
  const textOverlay = document.getElementById('text-overlay');
  const logoOverlay = document.getElementById('logo-overlay');
  const textInput = document.getElementById('text');
  const textColorInput = document.getElementById('text-color');
  const tshirtSizeInput = document.getElementById('tshirt-size');

  // Update text overlay content and color
  textOverlay.textContent = textInput.value;
  textOverlay.style.color = textColorInput.value;

  // Update T-shirt size
  const tshirtSize = tshirtSizeInput.value;
  const tshirtImg = document.getElementById('tshirt-img');
}

// Function to load and display the selected logo
function loadLogo() {
  const logoInput = document.getElementById('logo');
  const logoOverlay = document.getElementById('logo-overlay');
  const file = logoInput.files[0];

  if (file) {
    // Read the selected logo and set it as the background image
    const reader = new FileReader();
    reader.onload = function (e) {
      logoOverlay.style.backgroundImage = `url('${e.target.result}')`;
      resizeLogo(); 
    };
    reader.readAsDataURL(file);
  }
}

// Function to resize the displayed logo based on user input
function resizeLogo() {
  const logoOverlay = document.getElementById('logo-overlay');
  const logoSizeInput = document.getElementById('logo-size');
  const logoSize = logoSizeInput.value + 'px';

  // Set the width and height of the logo overlay
  logoOverlay.style.width = logoSize;
  logoOverlay.style.height = logoSize;
}


// Function to save the design 
function saveDesign() {
  const logoInput = document.getElementById('logo').files[0];
  const logoOverlay = document.getElementById('logo-overlay');
  const tshirtImg = document.getElementById('tshirt-img');
  const formData = new FormData();

  // Append the necessary data to the FormData object
  formData.append('logoURL', logoOverlay.style.backgroundImage.slice(4, -1).replace(/['"]/g, ""));
  formData.append('tshirtImageURL', tshirtImg.src);
  formData.append('logoSize', document.getElementById('logo-size').value);
  formData.append('textContent', document.getElementById('text').value);
  formData.append('textColor', document.getElementById('text-color').value);

  // Send the data to the server (save.php) for processing
  fetch('save.php', {
    method: 'POST',
    body: formData,
  })
  .then(response => response.text())
  .then(data => {
    console.log('Success:', data);
    alert('Design saved successfully!');
  })
  .catch((error) => {
    console.error('Error:', error);
    alert('Failed to save design.');
  });
}

// Function to get file extension from file name
function getFileExtension(filename) {
  const dotIndex = filename.lastIndexOf('.');
  if (dotIndex !== -1) {
    return filename.substring(dotIndex + 1);
  }
  return '';
}
