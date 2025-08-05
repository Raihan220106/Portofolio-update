const toggleButton = document.getElementById("theme-toggle");
const icon = document.getElementById("theme-icon");

function setTheme(mode) {
  if (mode === "dark") {
    document.body.classList.remove("light-mode");
    document.body.classList.add("dark-mode");
    icon.textContent = "☀️";
  } else {
    document.body.classList.remove("dark-mode");
    document.body.classList.add("light-mode");
    icon.textContent = "🌙";
  }
  localStorage.setItem("theme", mode);
}

toggleButton.addEventListener("click", () => {
  const currentTheme = document.body.classList.contains("dark-mode") ? "dark" : "light";
  setTheme(currentTheme === "dark" ? "light" : "dark");
});

// Set theme on page load
const savedTheme = localStorage.getItem("theme") || "light";
setTheme(savedTheme);
