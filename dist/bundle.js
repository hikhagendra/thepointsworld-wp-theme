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

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ (() => {

eval("document.addEventListener('DOMContentLoaded', function() {\n    const navItems = document.querySelectorAll('.chapter-nav-item');\n    const chapterContents = document.querySelectorAll('.chapter-content');\n    let coursePurchased = true;\n\n    function showChapter(index) {\n        chapterContents.forEach((content, i) => {\n            if (i === index) {\n                content.classList.remove('tpw-hidden');\n            } else {\n                content.classList.add('tpw-hidden');\n            }\n        });\n\n        navItems.forEach((item, i) => {\n            if (i === 0 || !item.classList.contains('locked')) {\n                if (i === index) {\n                    item.classList.add('tpw-course-nav-active');\n                } else {\n                    if(coursePurchased) {\n                        item.classList.remove('tpw-course-nav-active');\n                    }\n                }\n            }\n        });\n    }\n\n    navItems.forEach((item, index) => {\n        if(item.classList.contains('locked')) {\n            coursePurchased = false;\n        }\n\n        item.addEventListener('click', function(e) {\n            e.preventDefault();\n            showChapter(index);\n        });\n    });\n\n    // Show the first chapter by default\n    if (navItems.length > 0) {\n        showChapter(0);\n    }\n});\n\n//# sourceURL=webpack:///./src/index.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/index.js"]();
/******/ 	
/******/ })()
;