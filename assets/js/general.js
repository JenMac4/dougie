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

