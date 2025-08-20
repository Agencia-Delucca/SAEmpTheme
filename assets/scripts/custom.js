// Loader
window.addEventListener("load", function () {
  document.body.classList.add("loaded");
});

// Ancoragem com scroll suave
function scrollToId(id) {
  const element = document.getElementById(id);
  if (element) {
    element.scrollIntoView({ behavior: "smooth" });
  }
}

scrollToId();

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

  function ajustarMarginLeft() {
    const logo = document.querySelector(".navbar__header .logo");
    const megaMenuContents = document.querySelectorAll(
      ".megamenu-content .megamenu-left"
    );

    if (logo && megaMenuContents.length > 0) {
      const logoWidth = logo.offsetWidth;
      const margemTotal = logoWidth + 48;

      megaMenuContents.forEach((menu) => {
        menu.style.marginLeft = `${margemTotal}px`;
      });
    }
  }
  ajustarMarginLeft();
  window.addEventListener("resize", ajustarMarginLeft);

  // Menu mobile
  const menu = document.querySelector(".navbar__header .menu-mobile");
  const wrapper = document.querySelector(".navbar__header .wrapper-mobile");
  const body = document.querySelector("body");
  const btnToggle = document.querySelector(".navbar__header .navbar__mobile .mobile");
  const btnClose = document.querySelector(".navbar__header .close-btn");
  const links = document.querySelectorAll(".navbar__header .menu-mobile a");

  // Abrir/fechar menu
  function toggleMenuMobile() {
    menu.classList.toggle("active");
    wrapper.classList.toggle("active");
    body.classList.toggle("active");
  }

  // Fechar menu
  function closeMenuMobile() {
    menu.classList.remove("active");
    wrapper.classList.remove("active");
    body.classList.remove("active");
  }

  // Abrir com botão de menu
  btnToggle?.addEventListener("click", function (event) {
    event.stopPropagation();
    toggleMenuMobile();
  });

  // Fechar com botão X
  btnClose?.addEventListener("click", function (event) {
    event.stopPropagation();
    closeMenuMobile();
  });

  // Fechar ao clicar fora do menu
  menu?.addEventListener("click", function (event) {
    if (!wrapper.contains(event.target)) {
      closeMenuMobile();
    }
  });

  // Fechar ao clicar em qualquer link
  links.forEach((link) => {
    link.addEventListener("click", () => {
      closeMenuMobile();
    });
  });
});

// Swipers
document.addEventListener("DOMContentLoaded", function () {
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

  const galeriaSlider = new Swiper("#single-empreendimento #galeria .swiper", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 32,
    effect: "fade",
    navigation: {
      nextEl: "#single-empreendimento #galeria .swiper-button-next",
      prevEl: "#single-empreendimento #galeria .swiper-button-prev",
    }
  });
});

// Fancybox
Fancybox.bind("[data-fancybox]", {
  animated: true,
  zoom: true,
  Image: {
    zoom: true,
  },
});
