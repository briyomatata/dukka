<?php

include('connection.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Lontana Farm</title>
</head>
<body>

<?php

include 'header.php';

?>
  
   

   <section class="main">
    <div class="hero-container">
            <div class="content">
               <div class="title">
                 <h1 class="pt-5">Farm Fresh Goat, Beef <br> and Chicken</h1>
               </div>
                <div class="sub-title">
                    <p >Order 24/7 and schedule your </p>
                <p >convinient delivery time.</p>
                </div>
                <div class="shop-btn">
                    <button class="btn-shop"><a href="shop.php">Enter the Shop</a></button>
                </div>
            </div>
        
    </div>
   </section>

   <sections class="cards">
    <div class="card-container ">
      <div class="price">
        <div class="card1">
          <div class="details">
          <p>529 ksh/pcs <br><span>Broiler</span> <br> 1.2 - 1.3 kg <br> chilled</p>
          </div>
        </div>
      </div>
      <div class="place">
        <div class="card2">
          <div class="details">
            <p><span>Free <br> Delivery</span> <br> in Nairobi</p>
          </div>
        </div>
      </div>
    </div>
   </sections>

   <section class="testimonial">
    <div class="container mx-auto px-4 text-center pt-3 mb-2">
      <h4 >Our Customers Say:</h4>
       <div  id="comments-container">
            <p class="text-muted text-center pt-2" id="loading-message"> <q></q></p>
        </div>
    </div>
   </section>

   <section class="footer">
      <div class="footer">
         <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0 text-center text-md-start">
                    <p class="footer-email-text pt-2">hello@nyamaonline.com</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="social-icons pt-2">
                      <p>|</p>
                        <a href="#" class="text-white"><i class="fa-brands fa-whatsapp text-2xl"></i></a>
                        <a href="#" class="text-white"><i class="fa-brands fa-facebook text-2xl"></i></a>
                        <a href="#" class="text-white"><i class="fa-brands fa-twitter text-2xl"></i></a>
                        <a href="#" class="text-white"><i class="fa-brands fa-instagram text-2xl"></i></a>
                    </div>
                </div>
            </div>

        </div>
      
   </section>

    <script>
        // Ensure the script runs after the DOM is fully loaded
        window.onload = function() {
            const commentsContainer = document.getElementById('comments-container');
            const loadingMessage = document.getElementById('loading-message');

            // Array of 5 dummy comments
            const comments = [
                "Aaaw I love the packaging and meat quality.",
                "The meat was soft and fresh and the packaging as great.",
                "Got my mbuzi. Can't wait to turn it into something scrumptions.",
                "Just got the delivery now,the meat is soo fresh.",
            ];

            const initialDelay = 3000; // 3 seconds before the very first comment sequence starts
            const commentDisplayInterval = 4000; // 2 seconds between each comment appearing
            const commentVisibilityDuration = 2500; // Each comment stays visible for 2.5 seconds
            const fadeTransitionDuration = 500; // Matches the CSS transition duration (0.5s)

            // Calculate the total duration for one complete cycle of all comments
            // This is the time from the appearance of the first comment to the full disappearance of the last comment.
            const lastCommentAppearanceTime = (comments.length - 1) * commentDisplayInterval;
            const totalCycleDuration = lastCommentAppearanceTime + commentVisibilityDuration + fadeTransitionDuration;

            // Function to display comments sequentially and then hide them
            function displayCommentsSequentiallyAndFade() {
                // Hide the loading message if it's still present (only relevant for the very first run)
                if (loadingMessage) {
                    loadingMessage.remove();
                }

                comments.forEach((commentText, index) => {
                    // Schedule the appearance of each comment relative to the start of *this* cycle
                    const appearanceScheduleTime = index * commentDisplayInterval;

                    setTimeout(() => {
                        const commentCard = document.createElement('div');
                        commentCard.className = 'comment-card'; // Base class for styling and transition
                        commentCard.innerHTML = `
                            <p class="text-base leading-relaxed">${commentText}</p>
                        `;
                        commentsContainer.appendChild(commentCard);

                        // Trigger fade-in after a very small delay to ensure rendering
                        setTimeout(() => {
                            commentCard.classList.add('show');
                        }, 50); // Small delay for fade-in

                        // Schedule the disappearance of the comment relative to its appearance time
                        const disappearanceScheduleTime = commentVisibilityDuration;

                        setTimeout(() => {
                            commentCard.classList.remove('show'); // Start fade-out
                            commentCard.classList.add('hide'); // Ensure opacity becomes 0

                            // Remove the element from the DOM after the transition completes
                            // This prevents accumulation of hidden elements
                            setTimeout(() => {
                                commentCard.remove();
                            }, fadeTransitionDuration); // Use the actual CSS transition duration
                        }, disappearanceScheduleTime);

                    }, appearanceScheduleTime); // This is the main delay for sequential appearance within a cycle
                });
            }

            // Set an initial timeout to start the very first sequence of comments
            setTimeout(() => {
                displayCommentsSequentiallyAndFade(); // Run the first sequence

                // Then, set an interval to continuously repeat the sequence
                // The interval duration is calculated to allow the last comment to fully disappear before the next cycle starts
                setInterval(displayCommentsSequentiallyAndFade, totalCycleDuration);
            }, initialDelay);
        };
    </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="js/script.js"></script>
</body>
</html>