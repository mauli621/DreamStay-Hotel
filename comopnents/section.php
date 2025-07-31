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
        <img src="./assets/canvaimg/2_canvaimg2.png" class="slide active img" />
        <img src="./assets/canvaimg/1_canvaimg1.png.png" class="slide img" />
        <img src="./assets/canvaimg/3_canvaimg3.png" class="slide img" />
        <img src="./assets/canvaimg/4_canvaimg4.png" class="slide img" />
        <img src="./assets/canvaimg/5_canvaimg5.png" class="slide img" />
      </div>

      <!-- FORM PLACED ON SLIDER -->
      <form class="search-container" id="hotelForm">
        <div class="field">
          <label for="checkin">Check-In Date</label>
          <input type="date" id="checkin" required value="2025-07-10">
        </div>

        <div class="field">
          <label for="checkout">Check-Out Date</label>
          <input type="date" id="checkout" required value="2025-07-11">
        </div>

        <div class="field">
          <label for="guests">Rooms & Guests</label>
          <select id="guests" required>
            <option value="1 Room, 2 Adults">1 Room, 2 Adults</option>
            <option value="1 Room, 1 Adult">1 Room, 1 Adult</option>
            <option value="2 Rooms, 4 Adults">2 Rooms, 4 Adults</option>
          </select>
        </div>

        <div class="field">
          <label for="price">Price Per Night</label>
          <select id="price" required>
            <option value="0-1500">₹0 - ₹1500</option>
            <option value="1500-2500">₹1500 - ₹2500</option>
            <option value="2500-4000">₹2500 - ₹4000</option>
            <option value="4000+">₹4000+</option>
          </select>
        </div>

        <button type="submit" class="search-btn">Book Now</button>
      </form>
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