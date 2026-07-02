// import 'owl.carousel/dist/assets/owl.carousel.css';
// import 'owl.carousel';

// $('.owl-carousel').owlCarousel({
//     loop:true,
//     margin:10,
//     responsiveClass:true,
//     responsive:{
//         0:{
//             items:1,
//             nav:true
//         },
//         600:{
//             items:3,
//             nav:false
//         },
//         1000:{
//             items:5,
//             nav:true,
//             loop:false
//         }
//     }
// })

jQuery(document).ready(function($) {
    var owl = $(".owl-carousel");
    owl.owlCarousel({
        loop:true,
		margin:10,
		nav:false,
		mouseDrag:true,
		items:1,
		dots:true,
		autoplay:true,
		smartSpeed:1500,
		autoplayHoverPause:true,
		center:false,
        responsive:{
            0:{
                items: 1,
                dots: false  // Hide dots on smaller screens
            },
            768:{
                items: 2,
                dots: true   // Show 2 dots on medium screens
            },
            1200:{
                items: 3,
                dots: true   // Show 2 dots on larger screens
            }
        }
    });
});

    $(".next").click(function() {
      owl.trigger("next.owl.carousel");
    });

    $(".prev").click(function() {
      owl.trigger("prev.owl.carousel");
    });

	/*====================
	Testimonial Slider
	======================*/

	jQuery(document).ready(function($) {
		var owl = $(".testimonial-slider");
		owl.owlCarousel({
			loop: true,
			margin: 0,
			nav: true,
			mouseDrag: true,
			items: 1,
			dots: false,
			autoplay: false,
			smartSpeed: 1500,
			autoplayHoverPause: true,
			center: false,
			navText: [
				"<i class='bx bx-chevrons-left'></i>",
				"<i class='bx bx-chevrons-right'></i>"
			],
			responsive:{
				0:{
					items: 1
				},
				768:{
					items: 2
				},
				992:{
					items: 3
				}
			}
		});
	});



// Function to start the counter animation
function startCounterAnimation(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const target = entry.target;
            const finalCount = parseInt(target.getAttribute('data-count'), 10);
            let currentCount = 0;

            const counter = setInterval(() => {
                currentCount += Math.ceil(finalCount / 100); // Change the divisor for a faster or slower animation
                if (currentCount >= finalCount) {
                    currentCount = finalCount;
                    clearInterval(counter);
                }
                target.textContent = currentCount;
            }, 30); // Interval in milliseconds
            observer.unobserve(target);
        }
    });
}

// Creating an Intersection Observer
const observer = new IntersectionObserver(startCounterAnimation, {
    root: null, // Use the viewport as the root
    threshold: 0.2 // Trigger when 20% of the element is visible
});

// Select all elements with the class "odometer"
const odometers = document.querySelectorAll('.odometer');

// Observe each odometer element
odometers.forEach(odometer => {
    observer.observe(odometer);
});


