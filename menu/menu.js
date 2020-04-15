$(window).on('load',function(){

const list1 = document.querySelector('.list');
const hoverBG = document.querySelector('.hover-bg');

list1.addEventListener('mousemove', e => {
     const y = e.offsetY;

     console.log(y);
    
     if (y <= 56) hoverBG.style.top = 20+'px';
     else if (y > 56 && y <= 112) hoverBG.style.top = 76+'px';
     else if (y > 112 && y <= 170) hoverBG.style.top = 132+'px';
     else hoverBG.style.top = 190 + 'px';

});

});