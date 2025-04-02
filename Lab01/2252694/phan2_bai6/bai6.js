const buttonMenuMobile = document.querySelector("#menuMobile");
if(buttonMenuMobile) {
    const menu = document.querySelector(".header .menu .menuIcon");
    const overlay = menu.querySelector(".header .inner-overlay");

    buttonMenuMobile.onclick = () => {
        menu.setAttribute("show", "yes");
    }

    overlay.onclick = () => {
        menu.setAttribute("show", "");
    }
}