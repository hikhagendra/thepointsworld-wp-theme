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

    // Course Review
    const reviewForm = document.getElementById('review-form');
    const thankYouMessage = document.getElementById('thank-you-message');
    const starInputs = document.querySelectorAll('.tpw-star-rating input');

    reviewForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(reviewForm);

        fetch(review_ajax_obj.ajax_url, {
            method: 'POST',
            body: new URLSearchParams(formData) + '&action=submit_review',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                reviewForm.style.display = 'none';
                thankYouMessage.classList.remove('tpw-hidden');
            } else {
                alert('An error occurred. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    });

    // Change star icons on click
    starInputs.forEach(input => {
        input.addEventListener('change', function() {
            const selectedValue = this.value;
            starInputs.forEach(star => {
                const starLabel = star.nextElementSibling.querySelector('i');
                if (star.value <= selectedValue) {
                    starLabel.classList.remove('far');
                    starLabel.classList.add('fas', 'selected');
                } else {
                    starLabel.classList.remove('fas', 'selected');
                    starLabel.classList.add('far');
                }
            });
        });
    });

});