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

