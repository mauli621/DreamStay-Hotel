document.addEventListener("DOMContentLoaded", () => {
  const loginPopup = document.getElementById("loginPopup");
  const signupPopup = document.getElementById("signupPopup");
  const showSignup = document.getElementById("showSignup");
  const showLogin = document.getElementById("showLogin");
  const closeBtns = document.querySelectorAll(".close-btn");
  const loginTrigger = document.getElementById("loginBtn");
  // from header
  const dropdownBtn = document.getElementById("servicesDropdownBtn");
  const dropdownContent = document.getElementById("servicesDropdownContent");

  // Show login modal
  loginTrigger.addEventListener("click", () => {
    loginPopup.style.display = "block";
    signupPopup.style.display = "none";
  });

  // Show signup modal
  showSignup.addEventListener("click", (e) => {
    e.preventDefault();
    loginPopup.style.display = "none";
    signupPopup.style.display = "block";
  });


  
  // Switch back to login
  showLogin.addEventListener("click", (e) => {
    e.preventDefault();
    signupPopup.style.display = "none";
    loginPopup.style.display = "block";
  });

  // Close both popups
  closeBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      loginPopup.style.display = "none";
      signupPopup.style.display = "none";
    });
  });
  //dropdown menu
  dropdownBtn.addEventListener("click", function (e) {
    e.preventDefault();
    dropdownContent.classList.toggle("show");
  });

  // Close dropdown when clicking outside
  window.addEventListener("click", function (e) {
    if (
      !dropdownBtn.contains(e.target) &&
      !dropdownContent.contains(e.target)
    ) {
      dropdownContent.classList.remove("show");
    }
  });
});
