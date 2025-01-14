<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="icon" href="{{ asset('asset/kulinerinLogo.png') }}" type="image/png">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

</head>
<!-- <style>
    .logo{
        width: 300px;
        height: 200px;
    }
</style> -->


<body>
    @extends('master.masterGuest')
    @section ('content')
    <main class="main-content">
        <!-- <div class="greeting">Hello, user</div> -->

        <!-- Updated Advertisement Section -->
        <div class="ad-container">
            <div class="ad-slide active">
                <img src="{{ asset('asset/testAd1.png') }}" 
                     alt="Special Offer" 
                     class="ad-image">
            </div>
            <div class="ad-slide">
                <img src="{{ asset('asset/testAd2.png') }}" 
                     alt="New Restaurant" 
                     class="ad-image">
            </div>
            <div class="ad-slide">
                <img src="{{ asset('asset/testAd3.png') }}" 
                     alt="Free Delivery" 
                     class="ad-image">
            </div>

            <!-- Navigation Arrows -->
            <button class="slide-nav prev-slide" onclick="changeSlide(-1)">❮</button>
            <button class="slide-nav next-slide" onclick="changeSlide(1)">❯</button>

            <!-- Dot indicators -->
            <div class="slide-controls">
                <button class="slide-dot active" onclick="goToSlide(0)"></button>
                <button class="slide-dot" onclick="goToSlide(1)"></button>
                <button class="slide-dot" onclick="goToSlide(2)"></button>
            </div>
        </div>

        <section>
            <h2 class="section-title">Recomendation Restaurant For You</h2>
            <div class="restaurant-grid">
                <div class="restaurant-card">
                    <div class="restaurant-image"></div>
                    <div class="restaurant-info">
                        <div class="restaurant-name">Lawry's The Prime Rib Jakarta</div>
                        <div class="restaurant-location">Kebayoran baru</div>
                    </div>
                </div>
                <div class="restaurant-card">
                    <div class="restaurant-image"></div>
                    <div class="restaurant-info">
                        <div class="restaurant-name">Lawry's The Prime Rib Jakarta</div>
                        <div class="restaurant-location">Kebayoran baru</div>
                    </div>
                </div>
                <div class="restaurant-card">
                    <div class="restaurant-image"></div>
                    <div class="restaurant-info">
                        <div class="restaurant-name">Lawry's The Prime Rib Jakarta</div>
                        <div class="restaurant-location">Kebayoran baru</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h2 class="section-title">Dine, Save & Reserve</h2>
            <div class="restaurant-grid">
                <div class="restaurant-card">
                    <div class="restaurant-image"></div>
                    <div class="restaurant-info">
                        <div class="restaurant-name">Lawry's The Prime Rib Jakarta</div>
                        <div class="restaurant-location">Kebayoran baru</div>
                    </div>
                </div>
                <div class="restaurant-card">
                    <div class="restaurant-image"></div>
                    <div class="restaurant-info">
                        <div class="restaurant-name">Lawry's The Prime Rib Jakarta</div>
                        <div class="restaurant-location">Kebayoran baru</div>
                    </div>
                </div>
                <div class="restaurant-card">
                    <div class="restaurant-image"></div>
                    <div class="restaurant-info">
                        <div class="restaurant-name">Lawry's The Prime Rib Jakarta</div>
                        <div class="restaurant-location">Kebayoran baru</div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h2 class="section-title">Holiday Dinner</h2>
            <div class="restaurant-grid">
                <div class="restaurant-card">
                    <div class="restaurant-image"></div>
                    <div class="restaurant-info">
                        <div class="restaurant-name">Lawry's The Prime Rib Jakarta</div>
                        <div class="restaurant-location">Kebayoran baru</div>
                    </div>
                </div>
                <div class="restaurant-card">
                    <div class="restaurant-image"></div>
                    <div class="restaurant-info">
                        <div class="restaurant-name">Lawry's The Prime Rib Jakarta</div>
                        <div class="restaurant-location">Kebayoran baru</div>
                    </div>
                </div>
                <div class="restaurant-card">
                    <div class="restaurant-image"></div>
                    <div class="restaurant-info">
                        <div class="restaurant-name">Lawry's The Prime Rib Jakarta</div>
                        <div class="restaurant-location">Kebayoran baru</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.ad-slide');
        const dots = document.querySelectorAll('.slide-dot');
        let slideInterval = setInterval(nextSlide, 3000); // Change slide in seconds

        function showSlide(n) {
            // Remove active class from all slides and dots
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            // Update current slide index
            currentSlide = (n + slides.length) % slides.length;

            // Add active class to current slide and dot
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        function changeSlide(direction) {
            clearInterval(slideInterval); // Reset timer when manually changed
            showSlide(currentSlide + direction);
            slideInterval = setInterval(nextSlide, 5000); // Restart timer
        }

        function goToSlide(n) {
            clearInterval(slideInterval);
            showSlide(n);
            slideInterval = setInterval(nextSlide, 5000);
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        // Pause slideshow when hovering over container
        document.querySelector('.ad-container').addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });

        document.querySelector('.ad-container').addEventListener('mouseleave', () => {
            slideInterval = setInterval(nextSlide, 5000);
        });
    </script>
    @endsection
</body>

</html>
