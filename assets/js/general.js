// Get all elements with the class 'blog-card-title'
var blogCardTitles = document.querySelectorAll('.blog-card-title');

// Loop through each 'blog-card-title' element
blogCardTitles.forEach(function(title) {
  // Split the innerHTML of the title by line breaks (\n)
  var lines = title.innerHTML.split('\n');
  
  // Clear the innerHTML of the title
  title.innerHTML = '';
  
  // Loop through each line and wrap it in a span element
  lines.forEach(function(line, index) {
    // Create a new span element
    var span = document.createElement('span');
    
    // Set the innerHTML of the span to the line of text
    span.innerHTML = line;
    
    // Append the span to the title
    title.appendChild(span);
    
    // Add a line break after each line except the last one
    if (index < lines.length - 1) {
      title.appendChild(document.createElement('br'));
    }
  });
});


//CODE FOR DETERMINING DAY OF THE WEEK

window.onload = function() {
    // Create a new Date object
    const today = new Date();

    // Get the current day of the week as a number (0-6)
    const dayNumber = today.getDay();

    // Create an array of day names corresponding to the div classes
    const daysOfWeek = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

    // Get the name of the current day
    const dayName = daysOfWeek[dayNumber];

    // Check if the viewport width is less than or equal to 768px (mobile)
    if (window.innerWidth <= 768) {
        // Hide all day elements
        const allDays = document.querySelectorAll('.day');
        allDays.forEach(day => {
            day.style.display = 'none';
        });

        // Display the current day and the following two days
        for (let i = 0; i < 3; i++) {
            const nextDayIndex = (dayNumber + i) % 7;
            const nextDayName = daysOfWeek[nextDayIndex];
            const nextDayElement = document.querySelector(`.${nextDayName}`);
            if (nextDayElement) {
                nextDayElement.style.display = 'block';
            }
        }
    }
};


function toggleMenu() {
  var links = document.getElementById("navLinks");
  if (links.classList.contains("expanded")) {
      links.classList.remove("expanded");
  } else {
      links.classList.add("expanded");
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const galleryImageContainer = document.querySelector('.gallery .img:first-child'); // Select the first image's container
  const galleryImages = document.querySelectorAll('.gallery .img img');
  const lightbox = document.createElement('div'); // Create the lightbox element
  lightbox.classList.add('lightbox');
  document.body.appendChild(lightbox);

  let currentIndex = 0;

  // Add an image tag inside the lightbox to show the current image
  const lightboxImg = document.createElement('img');
  lightbox.appendChild(lightboxImg);

  // Create close button
  const closeButton = document.createElement('span');
  closeButton.classList.add('close');
  closeButton.innerHTML = '&times;';
  lightbox.appendChild(closeButton);

  // Create next and previous buttons
  const prevButton = document.createElement('span');
  prevButton.classList.add('prev');
  prevButton.innerHTML = '&#10094;';
  lightbox.appendChild(prevButton);

  const nextButton = document.createElement('span');
  nextButton.classList.add('next');
  nextButton.innerHTML = '&#10095;';
  lightbox.appendChild(nextButton);

  // Function to open the lightbox and show the image
  function openLightbox(index) {
      lightbox.style.display = 'flex';
      lightboxImg.src = galleryImages[index].src;
  }

  // Close the lightbox
  closeButton.addEventListener('click', function() {
      lightbox.style.display = 'none';
  });

  // Next and Previous buttons
  nextButton.addEventListener('click', function() {
      currentIndex = (currentIndex + 1) % galleryImages.length;
      openLightbox(currentIndex);
  });

  prevButton.addEventListener('click', function() {
      currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
      openLightbox(currentIndex);
  });

  // Trigger lightbox on clicking the entire container (image and overlay)
  galleryImageContainer.addEventListener('click', function() {
      currentIndex = 0; // First image is shown by default
      openLightbox(currentIndex);
  });

  // Apply behavior only for screens under 430px width
  if (window.innerWidth <= 430) {
      // Show only the first image in the gallery on mobile
      galleryImages[0].parentElement.style.display = 'block';

      // Hide the other images
      for (let i = 1; i < galleryImages.length; i++) {
          galleryImages[i].parentElement.style.display = 'none';
      }
  }
});

// JAVASCRIPT FOR AJAX REQUEST

let current_index = 0;

document.querySelector('.event-next').addEventListener('click', function () {
  loadEvents(current_index + 3);
});

document.querySelector('.event-prev').addEventListener('click', function () {
  if (current_index >= 3) {
      loadEvents(current_index - 3);
  }
});


function loadEvents(offset) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'load_events.php?offset=' + offset, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('events-container').innerHTML = xhr.responseText;
            current_index = offset;
        }
    };
    xhr.send();
}
