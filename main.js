import Alpine from "./node_modules/alpinejs/dist/module.esm.js";

document.addEventListener("alpine:init", () => {
  Alpine.data("gameHandler", () => ({
    currentSection: "regles",
    goToGame() {
      this.currentSection = "game";
    },
  }));
});

Alpine.start();
