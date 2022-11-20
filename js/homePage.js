const menuBtn = document.querySelector('.menu-btn');
const sidenav = document.querySelector('.side_nav');
const containerContent = document.querySelector('.container-content');


let menuOpen = false;
menuBtn.addEventListener('click', () => {
  if(!menuOpen) {
    menuBtn.classList.add('open');
    menuOpen = true;
    sidenav.classList.add('active');
    sidenav.style.opacity = 1;
    containerContent.classList.add('active');
  } else {
    menuBtn.classList.remove('open');
    menuOpen = false;
    sidenav.style.opacity = 0;
    sidenav.classList.remove('active');
    containerContent.classList.remove('active');
  }
});

$('.btn__dashboard').click(function(){
  window.location.href ="./";
});


//fetch tasks on document load
const tasks = new Tasks($('#email').html());
tasks.getTasks();





