/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/scripts/index.js":
/*!******************************!*\
  !*** ./src/scripts/index.js ***!
  \******************************/
/***/ (() => {

eval("document.addEventListener('DOMContentLoaded', function() {\n    const navItems = document.querySelectorAll('.chapter-nav-item');\n    const chapterContents = document.querySelectorAll('.chapter-content');\n    let coursePurchased = true;\n\n    function showChapter(index) {\n        chapterContents.forEach((content, i) => {\n            if (i === index) {\n                content.classList.remove('tpw-hidden');\n            } else {\n                content.classList.add('tpw-hidden');\n            }\n        });\n\n        navItems.forEach((item, i) => {\n            if (i === 0 || !item.classList.contains('locked')) {\n                if (i === index) {\n                    item.classList.add('tpw-course-nav-active');\n                } else {\n                    if(coursePurchased) {\n                        item.classList.remove('tpw-course-nav-active');\n                    }\n                }\n            }\n        });\n    }\n\n    navItems.forEach((item, index) => {\n        if(item.classList.contains('locked')) {\n            coursePurchased = false;\n        }\n\n        item.addEventListener('click', function(e) {\n            e.preventDefault();\n            showChapter(index);\n        });\n    });\n\n    // Show the first chapter by default\n    if (navItems.length > 0) {\n        showChapter(0);\n    }\n});\n\n//# sourceURL=webpack:///./src/scripts/index.js?");

/***/ }),

/***/ "./src/scripts/reviews.js":
/*!********************************!*\
  !*** ./src/scripts/reviews.js ***!
  \********************************/
/***/ (() => {

eval("// Course Review\nconst reviewForm = document.getElementById('review-form');\nconst thankYouMessage = document.getElementById('thank-you-message');\nconst starInputs = document.querySelectorAll('.tpw-star-rating input');\n\nif(reviewForm) {\n    reviewForm.addEventListener('submit', function(e) {\n        e.preventDefault();\n\n        const formData = new FormData(reviewForm);\n\n        fetch(review_ajax_obj.ajax_url, {\n            method: 'POST',\n            body: new URLSearchParams(formData) + '&action=submit_review',\n            headers: {\n                'Content-Type': 'application/x-www-form-urlencoded'\n            }\n        })\n        .then(response => response.json())\n        .then(data => {\n            if (data.success) {\n                reviewForm.style.display = 'none';\n                thankYouMessage.classList.remove('tpw-hidden');\n            } else {\n                alert('An error occurred. Please try again.');\n            }\n        })\n        .catch(error => {\n            console.error('Error:', error);\n            alert('An error occurred. Please try again.');\n        });\n    });\n}\n\n// Change star icons on click\nstarInputs.forEach(input => {\n    input.addEventListener('change', function() {\n        const selectedValue = this.value;\n        starInputs.forEach(star => {\n            const starLabel = star.nextElementSibling.querySelector('span');\n            if (star.value <= selectedValue) {\n                starLabel.classList.add('selected');\n            } else {\n                starLabel.classList.remove('selected');\n            }\n        });\n    });\n});\n\n//# sourceURL=webpack:///./src/scripts/reviews.js?");

/***/ }),

/***/ "./src/scripts/slider.js":
/*!*******************************!*\
  !*** ./src/scripts/slider.js ***!
  \*******************************/
/***/ (() => {

eval("let swiper = new Swiper('.multiple-slide-carousel', {\n    loop: true,\n    slidesPerView: 3,\n    paginationClickable: true,\n    pagination: {\n        el: \".multiple-slide-carousel .swipper-pagination\",\n        clickable: true,\n    },\n    breakpoints: {\n        1920: {\n            slidesPerView: 4,\n            spaceBetween: 30\n        },\n        1028: {\n            slidesPerView: 3,\n            spaceBetween: 30\n        },\n        990: {\n            slidesPerView: 1,\n            spaceBetween: 0\n        }\n    }\n});\n\n//# sourceURL=webpack:///./src/scripts/slider.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	__webpack_modules__["./src/scripts/index.js"]();
/******/ 	__webpack_modules__["./src/scripts/reviews.js"]();
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/scripts/slider.js"]();
/******/ 	
/******/ })()
;