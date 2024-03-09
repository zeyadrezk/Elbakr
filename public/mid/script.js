const bar = document.getElementById("bar");
const close1 = document.getElementById("close");
const nav = document.getElementById("navbar");
const SearchBox = document.querySelector(".search-Toggle");

if (bar) {
  bar.addEventListener("click", () => {
    nav.classList.add("active");
  });
}
if (close1) {
  close1.addEventListener("click", () => {
    nav.classList.remove("active");
  });
}
const scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};

SearchBox.addEventListener("click", () => {
  SearchBox.classList.toggle("active");
});
ScrollReveal().reveal(".text-who-are-we img", scrollRevealOption);

ScrollReveal().reveal(".text-who-are-we p", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".text-who-are-we button", {
  ...scrollRevealOption,
  delay: 800,
});
ScrollReveal().reveal(".text-I-liste h2", scrollRevealOption);

ScrollReveal().reveal(".text-I-liste p", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".image-I-liste", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".oneDevs-Products", {
  ...scrollRevealOption,
  delay: 400,
});
ScrollReveal().reveal(".TwoDevs-Products", {
  ...scrollRevealOption,
  delay: 800,
});
ScrollReveal().reveal(".onedivs-Our-branches", {
  ...scrollRevealOption,
  interval: 400,
});
ScrollReveal().reveal(".ONEDEVS-OUR-PROJECTS", {
  ...scrollRevealOption,
  delay: 700,
});
ScrollReveal().reveal(".THreeDevs-Products", {
  ...scrollRevealOption,
  delay: 1200,
});
ScrollReveal().reveal(".FourDevs-Products", {
  ...scrollRevealOption,
  delay: 1400,
});
ScrollReveal().reveal(".FiveDevs-Products", {
  ...scrollRevealOption,
  delay: 1600,
});
ScrollReveal().reveal(".EndDevs-Products", {
  ...scrollRevealOption,
  delay: 1800,
});
ScrollReveal().reveal(".ICOS1", {
  ...scrollRevealOption,
  delay: 400,
});
ScrollReveal().reveal(".ICOS2", {
  ...scrollRevealOption,
  delay: 800,
});
ScrollReveal().reveal(".ICOS3", {
  ...scrollRevealOption,
  delay: 1200,
});
ScrollReveal().reveal(".ICOS4", {
  ...scrollRevealOption,
  delay: 1400,
});
ScrollReveal().reveal(".ICOS5", {
  ...scrollRevealOption,
  delay: 1600,
});
var MainImg = document.getElementById("MainImg");
var smallimg = document.getElementsByClassName("small-img");

smallimg[0].onclick = function () {
  MainImg.src = smallimg[0].src;
};
smallimg[1].onclick = function () {
  MainImg.src = smallimg[1].src;
};
smallimg[2].onclick = function () {
  MainImg.src = smallimg[2].src;
};
smallimg[3].onclick = function () {
  MainImg.src = smallimg[3].src;
};
