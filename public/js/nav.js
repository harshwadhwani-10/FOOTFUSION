const menubtn = document.querySelector(".menu");
const menuitem = document.querySelector(".links-container");
const menuopt = document.querySelectorAll(".menu-opt");
const drop = document.querySelectorAll(".drop");


menubtn.onclick = function () {
    menuitem.classList.toggle("visible");
    console.log("Menu button clicked");
    console.log("link-container class list:", menuitem.classList);
};
// if(screen.width <= 1068){

//     for(let i=0;i<menuopt.length;i++){
//         menuopt[i].onclick = function () {
//             // menuopt[i].classList.toggle("list-style");
//             drop[i].classList.toggle("visible");
//             console.log("button clicked");
//             console.log("link class list:", menuopt[i].classList);
//         };
//     };
// };
// const createNav = () => {
//     // ... (your existing code remains unchanged)
// }

// createNav();

// const menubtn = document.querySelector(".menu");
// const menuitem = document.querySelector(".links-container");
// const menuopt = document.querySelectorAll(".menu-opt");
// const drop = document.querySelectorAll(".drop");

menubtn.onclick = function () {
    menuitem.classList.toggle("visible");
    console.log("Menu button clicked");
    console.log("link-container class list:", menuitem.classList);
};

function handleMenuClick(i) {
    drop[i].classList.toggle("view");
    console.log("button clicked");
    console.log("link class list:", menuopt[i].classList);
}

if (window.innerWidth <= 1068) {
    for (let i = 0; i < menuopt.length; i++) {
        menuopt[i].onclick = function () {
            handleMenuClick(i);
        };
    }
} else {
    for (let i = 0; i < menuopt.length; i++) {
        menuopt[i].onmouseover = function () {
            handleMenuClick(i);
        };
        menuopt[i].onmouseout = function () {
            handleMenuClick(i);
        };
    }
}

// Update event listeners when the window is resized
window.addEventListener("resize", function () {
    if (window.innerWidth <= 1068) {
        for (let i = 0; i < menuopt.length; i++) {
            menuopt[i].onclick = function () {
                handleMenuClick(i);
            };
            menuopt[i].onmouseover = null;
            menuopt[i].onmouseout = null;
        }
    } else {
        for (let i = 0; i < menuopt.length; i++) {
            menuopt[i].onmouseover = function () {
                handleMenuClick(i);
            };
            menuopt[i].onmouseout = function () {
                handleMenuClick(i);
            };
            menuopt[i].onclick = null;
        }
    }
});


