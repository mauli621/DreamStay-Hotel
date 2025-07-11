document.addEventListener("DOMContentLoaded", function () {
  const loginBtn = document.getElementById("loginBtn");
  const wrapper = document.querySelector(".wrapper");
  const closeBtn = document.querySelector(".close-btn");

  loginBtn.addEventListener("click", function () {
    wrapper.style.display = "block";
  });

  closeBtn.addEventListener("click", function () {
    wrapper.style.display = "none";
  });
});
