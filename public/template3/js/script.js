 let navbar = document.querySelector('.header .navbar');

 document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
 }

 window.onscroll = () =>{
    navbar.classList.remove('active');
 }

 document.addEventListener('DOMContentLoaded', function() {
    var swiper = new Swiper(".home-slider", {
        loop: true,
        effect: "coverflow",       
        spaceBetween: 30,
        grabCursor: true,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiper = new Swiper(".reviews-slider", {
        loop: true,
            grabCursor: true,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: {
                  slidesPerView: 1,
                },
                991: {
                  slidesPerView: 2,
                },
              },
    });


});

// const goTopBtn = document.querySelector('.go-top-btn');

// window.addEventListener('scroll', checkHeight)

// function checkHeight(){
//     if(window.screenY > 10) {
//         goTopBtn.style.display = "flex"
//     } else{
//         goTopBtn.style.display = "none"
//     }
// }

// goTopBtn.addEventListener('click', () => {
//     window.scrollTo({
//         top: 0,
//         behavior: "smooth"
//     })
// })

