const navLinkEls = document.querySelectorAll('.nav_link');
const windowPathname = window.location.pathname;

navLinkEls.forEach(navLinkEl => {
    const navLinkPathname = new URL(navLinkEl.href).pathname;

    if((windowPathname === navLinkPathname) || (windowPathname== route('admin.dashboard') && navLinkPathname == route('/'))){
        navLinkEls.classList.add('active');
    }
});