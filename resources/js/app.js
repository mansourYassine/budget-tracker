import { startOfISOWeek, endOfISOWeek } from 'date-fns';
window.startOfISOWeek = startOfISOWeek;
window.endOfISOWeek = endOfISOWeek;

let sidebar = document.querySelector("aside");
let sidebarToggleBtn = document.querySelector("li.sidebar-toggle");
let sidebarToggleBtnArrowIcon = document.querySelector("li.sidebar-toggle i");
let textLogo = document.querySelector("aside .text-logo");
let logo = document.querySelector("aside .logo");
let navLinksSpans = document.querySelectorAll("aside ul > li span");
let rightPageSide = document.querySelector(".right-page");

sidebarToggleBtn.addEventListener("click", (e) => {
    e.preventDefault();
    if (!sidebar.hasAttribute("collapsed")) {
        // Collapse the sidebar
        textLogo.classList.add("hidden");
        logo.classList.replace("hidden", "inline-block");
        sidebar.classList.replace("w-60", "w-16");
        navLinksSpans.forEach((ele) => ele.classList.add('invisible'));
        sidebar.setAttribute("collapsed", "");
        sidebarToggleBtnArrowIcon.classList.toggle("rotate-180");
        if (window.innerWidth >= 768) {
            rightPageSide.classList.replace("md:ml-60", "md:ml-16");
        }
    } else {
        // Extend the sidebar
        sidebar.removeAttribute("collapsed");
        textLogo.classList.remove("hidden");
        logo.classList.replace("inline-block", "hidden");
        sidebar.classList.replace("w-16", "w-60");
        navLinksSpans.forEach((ele) => ele.classList.remove('invisible'));
        sidebarToggleBtnArrowIcon.classList.toggle("rotate-180");
        if (window.innerWidth >= 768) {
            rightPageSide.classList.replace("md:ml-16", "md:ml-60");
        }
    }
});