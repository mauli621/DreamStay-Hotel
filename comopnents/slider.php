<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

<style>
  .swiper {
    width: 90%;
    max-width: 1200px;
    overflow: hidden;
    margin: 0 auto;
  }

  .swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
    transition: transform 0.4s ease, filter 0.4s ease;
  }

  .swiper-slide img {
    width: 400px;
    height: 350px;
    border-radius: 6px;
    transition: all 0.4s ease;
  }

  .swiper-slide:not(.swiper-slide-active) img {
    filter: blur(3px) brightness(0.7);
    transform: scale(0.85);
  }

  .swiper-slide-active img {
    filter: none;
    transform: scale(1);
    border: 3px solid #f3cfcf;
    box-shadow: 0 0 0 10px rgba(243, 207, 207, 0.3);
  }

  .room-heading {
  font-size: 40px;
  width: 310px;
  padding: 10px;
  margin: 50px auto;
  color: #003580;
  text-align: center;
  transition: all 0.3s ease;
}
.room-heading:hover {
  cursor: pointer;
  border-bottom: 3px solid #003580;
  transform: scale(1.05);
}
</style>

 <h1 class="room-heading">Our Rooms</h1>
<div class="swiper mySwiper">
  <div class="swiper-wrapper">    
    <div class="swiper-slide"><img src="./assets/11_honeymoon_suite.jpg" alt=""></div>
    <div class="swiper-slide"><img src="./assets/10-family_room.jpg" alt=""></div>
    <div class="swiper-slide"><img src="./assets/8-superior_room.jpg" alt=""></div>
    <div class="swiper-slide"><img src="./assets/7-studio_room.jpeg" alt=""></div>
    <div class="swiper-slide"><img src="./assets/6-economy_double_room.jpg" alt=""></div>
    <div class="swiper-slide"><img src="./assets/5-tripple_room.jpg" alt=""></div>
    <div class="swiper-slide"><img src="./assets/4-delux_double_room.jpg" alt=""></div>
    <div class="swiper-slide"><img src="./assets/3-comfort_double_room.jpg" alt=""></div>
    <div class="swiper-slide"><img src="./assets/2-standard_twin_room.jpg" alt=""></div>
    <div class="swiper-slide"><img src="./assets/1-standard_queen_room.jpg" alt=""></div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  });
</script>