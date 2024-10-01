document.addEventListener('DOMContentLoaded', function() {
    const navItems = document.querySelectorAll('.chapter-nav-item');
    const chapterContents = document.querySelectorAll('.chapter-content');
    let coursePurchased = true;

    function showChapter(index) {
        chapterContents.forEach((content, i) => {
            if (i === index) {
                content.classList.remove('tpw-hidden');
            } else {
                content.classList.add('tpw-hidden');
            }
        });

        navItems.forEach((item, i) => {
            if (i === 0 || !item.classList.contains('locked')) {
                if (i === index) {
                    item.classList.add('tpw-course-nav-active');
                } else {
                    if(coursePurchased) {
                        item.classList.remove('tpw-course-nav-active');
                    }
                }
            }
        });
    }

    navItems.forEach((item, index) => {
        if(item.classList.contains('locked')) {
            coursePurchased = false;
        }

        item.addEventListener('click', function(e) {
            e.preventDefault();
            showChapter(index);
        });
    });

    // Show the first chapter by default
    if (navItems.length > 0) {
        showChapter(0);
    }
});