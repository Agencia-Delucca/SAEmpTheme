window.addEventListener("load", function () {
  document.body.classList.add("loaded");
});

// Ancoragem com scroll suave
function scrollToId(id) {
  const element = document.getElementById(id);
  if (element) {
    element.scrollIntoView({ behavior: 'smooth' });
  }
}

scrollToId();