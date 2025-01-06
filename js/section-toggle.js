// const track = document.querySelector('.slider-track');
// const prevBtn = document.getElementById('prev-btn');
// const nextBtn = document.getElementById('next-btn');

// // Calculate the width of the container (to show 3 slides at a time)
// const containerWidth = document.querySelector('.tech-stack').offsetWidth;
// const slideWidth = document.querySelector('.tech-item').offsetWidth + 40; // Include gap for each slide (20px here, adjust as needed)

// // The number of slides that can be displayed at once
// const visibleSlides = 5; 

// // Calculate the max number of slides that can be moved
// const maxIndex = Math.floor(track.children.length / visibleSlides);

// // Set the initial index
// let currentIndex = 0;

// // Update the track position based on the current index
// function updateSliderPosition() {
//     track.style.transform = `translateX(-${currentIndex * (slideWidth * visibleSlides)}px)`;
// }

// // Event listener for "next" button
// nextBtn.addEventListener('click', () => {
//     console.log("next button clicked");
//     if (currentIndex < maxIndex) {
//         currentIndex += 1;
//         updateSliderPosition();
//     }
// });

// // Event listener for "previous" button
// prevBtn.addEventListener('click', () => {
//     console.log("prev button clicked");
//     if (currentIndex > 0) {
//         currentIndex -= 1;
//         updateSliderPosition();
//     }
// });