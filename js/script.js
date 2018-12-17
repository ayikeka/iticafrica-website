/*
 * File : Script for making Daniels webiste 
 * Author : Ayikeka Samuel
 * 
 */


 // Slide show with funciton
 var slideIndex = 0;
 showSlides(slideIndex);

 function currentSlide(n){
 	showSlides(slideIndex += n);
 }

 function showSlides(){
 	var i = 0;
 	var slides = document.getElementsByClassName("mySlides");
 	var dots = document.getElementsByClassName("dot");
 	for(i = 0; i < slides.length; i++){
 		slides[i].style.display = "none";
 	}
 	slideIndex++;
 	if(slideIndex > slides.length) {slideIndex = 1};
 	for(i = 0; i < dots.length; i++){
 		dots[i].className = dots[i].className.replace(" active", "");
 	}
 	slides[slideIndex - 1].style.display = "block";
 	dots[slideIndex-1].className += " active";
 	setTimeout(showSlides, 5000);
 }
