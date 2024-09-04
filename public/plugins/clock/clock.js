document.addEventListener('DOMContentLoaded', function() {
    let progressBar = document.querySelector('.progress-bar');
    let targetPercentage = parseFloat(progressBar.getAttribute('data-percentage'));
    let currentPercentage = 0;

    function updateProgressBar(percentage) {
        progressBar.style.width = percentage + '%';
        // progressBar.textContent = percentage + '%';

        // Change color based on percentage
        if (percentage < 33) {
            progressBar.style.backgroundColor = '#f44336'; // Red
        } else if (percentage < 66) {
            progressBar.style.backgroundColor = '#ff9800'; // Orange
        } else if (percentage < 100) {
            progressBar.style.backgroundColor = '#4caf50'; // Green
        } else {
            progressBar.style.backgroundColor = '#2196f3'; // Blue for 100%
        }
    }

    let interval = setInterval(function() {
        if (currentPercentage >= targetPercentage) {
            clearInterval(interval);
        } else {
            currentPercentage++;
            updateProgressBar(currentPercentage);
        }
    }, 20);
});