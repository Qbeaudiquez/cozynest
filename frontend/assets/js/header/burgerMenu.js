const toggleClass = (selectors, className) => {
    selectors.forEach(selector => {
        const elements = document.querySelectorAll(selector);
        elements.forEach(element => element.classList.toggle(className));
    });
};

const burgerMenuContainer = document.getElementById("burgerMenuContainer");

burgerMenuContainer.addEventListener("click", () => {
    
    toggleClass(["#burgerMenu", "#navSocialContainer", "#navbar", ".navLink", ".socialLink"], "active");
});
