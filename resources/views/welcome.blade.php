@extends('layouts.public')
@section('content')
    <section class="hero-section text-white d-flex align-items-center justify-content-center" style="background: #0F0F0F; height: 100vh; position: relative; overflow: hidden;">
        <!-- Background animation behind text -->
        <div class="animated-bg position-absolute top-0 start-0 w-100 h-100 z-0">
            <canvas id="animatedCanvas" style="width:100%; height:100%; pointer-events: none;"></canvas>
            <div id="svgIcons" style="position:absolute; top:0; left:0; width:100%; height:100%; pointer-events: auto;"></div>
        </div>
        <!-- Blur overlay over the shapes -->
        <div class="overlay-blur position-absolute top-0 start-0 w-100 h-100 z-1" style="backdrop-filter: blur(6px); background-color: rgba(15, 15, 15, 0.4);"></div>

        <div class="container text-center position-relative z-2">
            <h1 class="display-3 fw-bold animate__animated animate__fadeInDown">Code. Compete. Conquer.</h1>
            <p class="lead mt-3 animate__animated animate__fadeInUp animate__delay-1s">Join the ultimate coding arena. Solve real-world challenges by language and level, track your rank, and grow with every submission.</p>
            <a href="#" class="site-btn mt-4 animate__animated animate__fadeInUp animate__delay-2s">Join Now <img src="img/icons/double-arrow.png" alt="#"/></a>
        </div>
    </section>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- JavaScript for animated SVG icons -->
    <script>
        window.addEventListener('load', () => {
            const container = document.getElementById('svgIcons');
            const icons = [
                { class: 'fa-brands fa-js', label: 'JavaScript' },
                { class: 'fa-brands fa-php', label: 'PHP' },
                { class: 'fa-brands fa-python', label: 'Python' },
                { class: 'fa-brands fa-java', label: 'Java' },
                { class: 'fa-brands fa-laravel', label: 'Laravel' },
                { class: 'fa-brands fa-golang', label: 'Go' },
                { class: 'fa-brands fa-node', label: 'Node.js' },
                { class: 'fa-brands fa-react', label: 'React' },
            ];

            const shapes = [];

            for (let i = 0; i < icons.length; i++) {
                const wrapper = document.createElement('div');
                wrapper.style.position = 'absolute';
                wrapper.style.clipPath = 'polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%)';
                wrapper.style.background = 'linear-gradient(145deg, rgba(175,18,167,0.4), rgba(175,18,167,0.2))';
                wrapper.style.backdropFilter = 'blur(4px)';
                wrapper.style.width = '100px';
                wrapper.style.height = '100px';
                wrapper.style.display = 'flex';
                wrapper.style.alignItems = 'center';
                wrapper.style.justifyContent = 'center';
                wrapper.style.transition = 'transform 0.6s ease, box-shadow 0.6s ease';
                wrapper.style.left = Math.random() * 100 + '%';
                wrapper.style.top = Math.random() * 100 + '%';
                wrapper.style.transformStyle = 'preserve-3d';
                wrapper.dataset.dx = (Math.random() - 0.5) * 0.4;
                wrapper.dataset.dy = (Math.random() - 0.5) * 0.4;
                wrapper.title = icons[i].label;

                const icon = document.createElement('i');
                icon.className = icons[i].class;
                icon.style.color = '#fff';
                icon.style.fontSize = '40px';

                wrapper.appendChild(icon);

                wrapper.addEventListener('mouseenter', () => {
                    wrapper.style.transform = 'scale(1.2) rotateY(360deg)';
                    wrapper.style.boxShadow = '0 0 25px rgba(255,255,255,0.5)';
                });
                wrapper.addEventListener('mouseleave', () => {
                    wrapper.style.transform = 'scale(1)';
                    wrapper.style.boxShadow = 'none';
                });

                container.appendChild(wrapper);
                shapes.push(wrapper);
            }

            function animate() {
                shapes.forEach(el => {
                    let x = parseFloat(el.style.left);
                    let y = parseFloat(el.style.top);
                    let dx = parseFloat(el.dataset.dx);
                    let dy = parseFloat(el.dataset.dy);

                    x += dx;
                    y += dy;

                    if (x < 0 || x > 100) el.dataset.dx *= -1;
                    if (y < 0 || y > 100) el.dataset.dy *= -1;

                    el.style.left = x + '%';
                    el.style.top = y + '%';
                });
                requestAnimationFrame(animate);
            }

            animate();
        });
    </script>
    <!-- Intro section -->
    <section class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="intro-text-box text-box text-white">
                        <div class="top-meta">24.03.25 / in <a href="">Challenges</a></div>
                        <h3>Pick your favorite language</h3>
                        <p>Select from PHP, JS, Python and more. Each challenge is organized by topic, difficulty, and language so you can practice what you love.</p>
                        <a href="#" class="read-more">Read More <img src="img/icons/double-arrow.png" alt="#"/></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="intro-text-box text-box text-white">
                        <div class="top-meta">24.03.25 / in <a href="">Ranking</a></div>
                        <h3>Climb the leaderboard</h3>
                        <p>Earn points for every challenge you solve and climb the ranks. Compete with developers from around the world.</p>
                        <a href="#" class="read-more">Read More <img src="img/icons/double-arrow.png" alt="#"/></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="intro-text-box text-box text-white">
                        <div class="top-meta">24.03.25 / in <a href="">Progress</a></div>
                        <h3>Track your journey</h3>
                        <p>See your progress in each programming category. Gain mastery and unlock new challenge levels as you grow.</p>
                        <a href="#" class="read-more">Read More <img src="img/icons/double-arrow.png" alt="#"/></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog section -->
    <section class="blog-section spad">
        <div class="container">
            <div class="section-title text-white">
                <h2>Latest Challenges & Tips</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="blog-item">
                        <div class="blog-thumb">
                            <img src="img/blog/1.jpg" alt="">
                        </div>
                        <div class="blog-text text-box text-white">
                            <div class="top-meta">24.03.25 / in <a href="#">JavaScript</a></div>
                            <h3>Mastering Loops in JS</h3>
                            <p>Explore different loop structures in JavaScript to optimize your code and solve real-world problems efficiently.</p>
                            <a href="#" class="read-more">Solve Challenge <img src="img/icons/double-arrow.png" alt="#"/></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-item">
                        <div class="blog-thumb">
                            <img src="img/blog/2.jpg" alt="">
                        </div>
                        <div class="blog-text text-box text-white">
                            <div class="top-meta">24.03.25 / in <a href="#">PHP</a></div>
                            <h3>Laravel Blade Tips</h3>
                            <p>Learn how to make your Laravel Blade templates clean and reusable to enhance your productivity in backend development.</p>
                            <a href="#" class="read-more">Solve Challenge <img src="img/icons/double-arrow.png" alt="#"/></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-item">
                        <div class="blog-thumb">
                            <img src="img/blog/3.jpg" alt="">
                        </div>
                        <div class="blog-text text-box text-white">
                            <div class="top-meta">24.03.25 / in <a href="#">Python</a></div>
                            <h3>Python for Data Lovers</h3>
                            <p>Dive into Python’s data structures and understand how lists, dicts, and sets help in tackling complex logic challenges.</p>
                            <a href="#" class="read-more">Solve Challenge <img src="img/icons/double-arrow.png" alt="#"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro video section -->
    <section class="intro-video-section set-bg d-flex align-items-end" data-setbg="./img/promo-bg.jpg">
        <a href="https://www.youtube.com/watch?v=uFsGy5x_fyQ" class="video-play-btn video-popup">
            <img src="img/icons/solid-right-arrow.png" alt="#">
        </a>
        <div class="container">
            <div class="video-text">
                <h2>Inside the Challenge Engine</h2>
                <p>Watch how challenges are created and submitted in our smart grading system.</p>
            </div>
        </div>
    </section>

    <!-- Featured section -->
    <section class="featured-section">
        <div class="featured-bg set-bg" data-setbg="img/featured-bg.jpg"></div>
        <div class="featured-box">
            <div class="text-box">
                <div class="top-meta">Featured / in Real Projects</div>
                <h3>Real-World Coding Tasks</h3>
                <p>Practice by solving challenges derived from real-world coding tasks and job interview questions. Push your skills to the next level and build a strong portfolio through competition and learning.</p>
                <a href="#" class="read-more">Start Practicing <img src="img/icons/double-arrow.png" alt="#"/></a>
            </div>
        </div>
    </section>

    <!-- Newsletter section -->
    <section class="newsletter-section">
        <div class="container">
            <h2>Get weekly coding challenges in your inbox</h2>
            <form class="newsletter-form">
                <input type="text" placeholder="ENTER YOUR E-MAIL">
                <button class="site-btn">subscribe <img src="img/icons/double-arrow.png" alt="#"/></button>
            </form>
        </div>
    </section>
@endsection
