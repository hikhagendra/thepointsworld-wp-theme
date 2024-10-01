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