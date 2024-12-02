document.addEventListener('DOMContentLoaded', () => {
    const lookupButton = document.getElementById('lookup');
    const countryInput = document.getElementById('country');
    const resultDiv = document.getElementById('result');

    lookupButton.addEventListener('click', () => {
        const country = countryInput.value.trim();
        const url = `world.php?country=${encodeURIComponent(country)}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                resultDiv.innerHTML = data;
            })
            .catch(error => {
                console.error('Fetch error:', error);
                resultDiv.innerHTML = '<p style="color: red;">Failed to fetch results. Please try again later.</p>';
            });
    });
});