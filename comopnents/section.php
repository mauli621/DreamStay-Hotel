<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DreamStay - Rest Relax Repeat</title>
  <link rel="stylesheet" href="./css/section.css" />
</head>

<body>
  <section class="hero-section">
    <div class="slider-container">
      <div class="slider slider1">
        <img src="./assets/1-standard_queen_room.jpg" class="slide img" />
        <img src="./assets/2-standard_twin_room.jpg" class="slide img" />
        <img src="./assets/3-comfort_double_room.jpg" class="slide img" />
        <img src="./assets/4-delux_double_room.jpg" class="slide img" />
        <img src="./assets/5-tripple_room.jpg" class="slide img" />
        <img src="./assets/6-economy_double_room.jpg" class="slide img" />
        <img src="./assets/7-studio_room.jpeg" class="slide img" />
        <img src="./assets/8-superior_room.jpg" class="slide img" />
        <img src="./assets/10-family_room.jpg" class="slide img" />
        <img src="./assets/11_honeymoon_suite.jpg" class="slide active img" />
      </div>

      <div class="hero-content">
        <h1>DreamStay Hotel</h1>
        <h2>Where Every Stay Tells a Story</h2>
        <div class="btn-group">
          <a href="./about.php" class="btn-link">About Us</a>
          <a href="./rooms.php" class="btn-link">Book Now</a>
        </div>

      </div>
    </div>
  </section>

  <script>
    const slides1 = document.querySelectorAll(".slider1 .slide");
    let current1 = 0;

    function showSlide1(index) {
      slides1.forEach((slide, i) => {
        slide.classList.remove("active");
        if (i === index) slide.classList.add("active");
      });
    }

    function nextSlide1() {
      current1 = (current1 + 1) % slides1.length;
      showSlide1(current1);
    }
    setInterval(nextSlide1, 3000);
  </script>
</body>

</html>