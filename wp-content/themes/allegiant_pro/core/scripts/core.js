//CORE JS FUNCTIONALITY
//Contains only the most essential functions for the theme. No jQuery.

// Get the header
const header = document.getElementById('header')

// Get the offset position of the navbar
const sticky = header.offsetTop

/* ==========================================================================
Mobile Menu Toggle
========================================================================== */
document.addEventListener('DOMContentLoaded', function () {
  var menu_element = document.getElementById('menu-mobile-open')
  var menu_exists = !!menu_element
  if (menu_exists) {
    menu_element.addEventListener('click', function () {
      document.body.classList.add('menu-mobile-active')
    })

    document.getElementById('menu-mobile-close').addEventListener('click', function () {
      document.body.classList.remove('menu-mobile-active')
    })
  }
})

/* ==========================================================================
handleStickyHeader
========================================================================== */

// When the user scrolls the page, execute myFunction
window.onscroll = function () {
  handleSticky()
}

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function handleSticky () {

  if (document.body.classList.contains('cpo-sticky-header')) { // only run if sticky header is actually enabled
    if (window.pageYOffset >= sticky) {
      header.classList.add('cpo-sticky')
    } else {
      header.classList.remove('cpo-sticky')
    }
  }
}