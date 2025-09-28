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
if (loginPopup && !localStorage.getItem("loginPopupShown")) {
  setTimeout(() => {
    loginPopup.classList.add("show");
    localStorage.setItem("loginPopupShown", "true");
  }, 5000);
}

document.addEventListener("DOMContentLoaded", () => {
  // Existing code...

  // Profile popup toggle
  const profileBtn = document.getElementById("profileBtn");
  const profilePopup = document.getElementById("profilePopup");
  const closeProfile = document.getElementById("closeProfile");

  if (profileBtn && profilePopup && closeProfile) {
    profileBtn.addEventListener("click", () => {
      profilePopup.classList.toggle("show");
    });

    closeProfile.addEventListener("click", () => {
      profilePopup.classList.remove("show");
    });

    // Optional: Close popup when clicking outside
    window.addEventListener("click", function (e) {
      if (!profilePopup.contains(e.target) && !profileBtn.contains(e.target)) {
        profilePopup.classList.remove("show");
      }
    });
  }
});
