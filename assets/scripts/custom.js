// Loader
window.addEventListener("load", function () {
  document.body.classList.add("loaded");
});

// Barra de navegação
document.addEventListener("DOMContentLoaded", function () {
  let lastScrollTop = 0;
  const navbar = document.querySelector(".navbar__header");

  window.addEventListener("scroll", function () {
    const currentScroll =
      window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll > lastScrollTop && currentScroll > 71) {
      navbar.style.top = "-72px";
    } else {
      navbar.style.top = "0";
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
  });

  const navbarBlankLinks = document.querySelector(".navbar__header");
  if (!navbarBlankLinks) return;

  navbarBlankLinks
    .querySelectorAll('a[href=""], a[href="#"], a:not([href])')
    .forEach(function (link) {
      const div = document.createElement("div");

      div.innerHTML = link.innerHTML;
      div.className = link.className;

      link.parentNode.replaceChild(div, link);
    });
});

// Ancoragem com scroll suave
function scrollToId(id) {
  const element = document.getElementById(id);
  if (element) {
    element.scrollIntoView({ behavior: "smooth" });
  }
}

scrollToId();

// Swipers
const topoBannerHome = new Swiper("#home .topo", {
  loop: true,
  autoplay: {
    delay: 7000,
    disableOnInteraction: false,
  },
  effect: "fade",
  pagination: {
    el: "#home .swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      return (
        '<span class="' + className + '">' + bulletLabels[index] + "</span>"
      );
    },
  },
  on: {
    autoplayTimeLeft(s, time, progress) {
      const bullets = document.querySelectorAll(
        "#home .topo .swiper-pagination-bullet"
      );
      bullets.forEach((bullet, index) => {
        if (index === s.realIndex) {
          bullet.style.background = `linear-gradient(to left, rgba(50, 50, 50, 0.5) ${
            progress * 100
          }%, rgba(0, 0, 0, 0.8) ${progress * 100}%)`;
        } else {
          bullet.style.background = "rgba(50, 50, 50, 0.5)";
        }
      });
    },
  },
});
