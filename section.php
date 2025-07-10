<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="./css/header.css" />
</head>
<body>
     
    <section>
        <img src="hotelRoom.jpg" class="img">
        <div class="inner-text">
        <h1 class="tagline">Welcome to DreamStay Hotel</h1>
        <h1 class="tagline">Live The Luxury</h1>
        <button class="hero-btn">Book Now</button>
        <button class="hero-btn">About us</button>
        </div>
    </section>

    <form class="search-container" id="hotelForm">

  <div class="field">
    <label for="checkin">Check-In Date</label>
    <input type="date" id="checkin" required value="2025-07-10">
  </div>

  <!-- Check-Out -->
  <div class="field">
    <label for="checkout">Check-Out Date</label>
    <input type="date" id="checkout" required value="2025-07-11">
  </div>

  <!-- Guests -->
  <div class="field">
    <label for="guests">Rooms & Guests</label>
    <select id="guests" required>
      <option value="1 Room, 2 Adults">1 Room, 2 Adults</option>
      <option value="1 Room, 1 Adult">1 Room, 1 Adult</option>
      <option value="2 Rooms, 4 Adults">2 Rooms, 4 Adults</option>
    </select>
  </div>

  <!-- Price -->
  <div class="field">
    <label for="price">Price Per Night</label>
    <select id="price" required>
      <option value="0-1500">₹0 - ₹1500</option>
      <option value="1500-2500">₹1500 - ₹2500</option>
      <option value="2500-4000">₹2500 - ₹4000</option>
      <option value="4000+">₹4000+</option>
    </select>
  </div>

  <!-- Search Button -->
  <button type="submit" class="search-btn">Book Now</button>

</body>
</html>