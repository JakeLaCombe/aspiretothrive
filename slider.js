// JavaScript Document
$(function () {
// Simplest jQuery slideshow by Jonathan Snook
$('#slideshow img:gt(0)').hide();
setInterval(function () {
$('#slideshow :first-child').fadeOut(1000)
.next('img').fadeIn(1000).end().appendTo('#slideshow');
}, 4000);
});