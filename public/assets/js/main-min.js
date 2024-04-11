(function(){"use strict";const select=(el,all=!1)=>{el=el.trim()
if(all){return[...document.querySelectorAll(el)]}else{return document.querySelector(el)}}
const on=(type,el,listener,all=!1)=>{let selectEl=select(el,all)
if(selectEl){if(all){selectEl.forEach(e=>e.addEventListener(type,listener))}else{selectEl.addEventListener(type,listener)}}}
const onscroll=(el,listener)=>{el.addEventListener('scroll',listener)}
let selectHeader=select('#header')
if(selectHeader){const headerScrolled=()=>{if(window.scrollY>100){selectHeader.classList.add('header-scrolled')}else{selectHeader.classList.remove('header-scrolled')}}
window.addEventListener('load',headerScrolled)
onscroll(document,headerScrolled)}
let backtotop=select('.back-to-top')
if(backtotop){const toggleBacktotop=()=>{if(window.scrollY>100){backtotop.classList.add('active')}else{backtotop.classList.remove('active')}}
window.addEventListener('load',toggleBacktotop)
onscroll(document,toggleBacktotop)}
on('click','.mobile-nav-toggle',function(e){select('#navbar').classList.toggle('navbar-mobile')
this.classList.toggle('bi-list')
this.classList.toggle('bi-x')})
on('click','.navbar .dropdown > a',function(e){if(select('#navbar').classList.contains('navbar-mobile')){e.preventDefault()
this.nextElementSibling.classList.toggle('dropdown-active')}},!0)
let heroCarouselIndicators=select("#hero-carousel-indicators")
let heroCarouselItems=select('#heroCarousel .carousel-item',!0)
heroCarouselItems.forEach((item,index)=>{(index===0)?heroCarouselIndicators.innerHTML+="<li data-bs-target='#heroCarousel' data-bs-slide-to='"+index+"' class='active'></li>":heroCarouselIndicators.innerHTML+="<li data-bs-target='#heroCarousel' data-bs-slide-to='"+index+"'></li>"});window.addEventListener('load',()=>{let portfolioContainer=select('.portfolio-container');if(portfolioContainer){let portfolioIsotope=new Isotope(portfolioContainer,{itemSelector:'.portfolio-item'});let portfolioFilters=select('#portfolio-flters li',!0);on('click','#portfolio-flters li',function(e){e.preventDefault();portfolioFilters.forEach(function(el){el.classList.remove('filter-active')});this.classList.add('filter-active');portfolioIsotope.arrange({filter:this.getAttribute('data-filter')})},!0)}});const portfolioLightbox=GLightbox({selector:'.portfolio-lightbox'});new Swiper('.portfolio-details-slider',{speed:400,loop:!0,autoplay:{delay:5000,disableOnInteraction:!1},pagination:{el:'.swiper-pagination',type:'bullets',clickable:!0}});const portfolioDetailsLightbox=GLightbox({selector:'.portfolio-details-lightbox',width:'90%',height:'90vh'});let skilsContent=select('.skills-content');if(skilsContent){new Waypoint({element:skilsContent,offset:'80%',handler:function(direction){let progress=select('.progress .progress-bar',!0);progress.forEach((el)=>{el.style.width=el.getAttribute('aria-valuenow')+'%'})}})}})()