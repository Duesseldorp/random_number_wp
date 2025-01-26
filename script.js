jQuery(document).ready(function($) {
    $('#rnw-form').on('submit', function(e) {
        e.preventDefault();

        // Clear previous results
        $('#rnw-output').html('');
        $('#rnw-sorted-list').html('');

        // Get names from the textarea
        const namesInput = $('#rnw-names').val().trim();
        if (!namesInput) {
            alert(rnw_translations.enter_names);
            return;
        }

        // Validate input (alphanumeric and commas only)
        const validInput = /^[a-zA-Z0-9\s,]+$/.test(namesInput);
        if (!validInput) {
            alert(rnw_translations.invalid_input);
            return;
        }

        // Split names and sanitize
        const names = namesInput.split(',').map(name => escapeHtml(name.trim()));
        const results = [];

        // Function to generate a cryptographically secure random number
        function getSecureRandomNumber(min, max) {
            const array = new Uint32Array(1);
            window.crypto.getRandomValues(array);
            return min + (array[0] % (max - min + 1));
        }

        // Function to display names with random numbers one by one
        function displayNames(index) {
            if (index < names.length) {
                const randomNumber = getSecureRandomNumber(1, 100);
                results.push({ name: names[index], number: randomNumber });

                // Display the current name and number
                $('#rnw-output').append(`<p>${names[index]}: ${randomNumber}</p>`);

                // Delay before showing the next name
                setTimeout(() => displayNames(index + 1), 1000);
            } else {
                // Sort the results by number in ascending order
                results.sort((a, b) => a.number - b.number);

                // Display the sorted list with numbers (1-n) before each name
                let sortedListHTML = `<h3>${rnw_translations.sorted_list}</h3>`;
                results.forEach((item, index) => {
                    sortedListHTML += `<p><strong>${index + 1}.</strong> ${item.name}: ${item.number}</p>`;
                });
                $('#rnw-sorted-list').html(sortedListHTML);
            }
        }

        // Start the process
        displayNames(0);
    });

    // Function to escape HTML
    function escapeHtml(str) {
        return str.replace(/&/g, '&amp;')
                  .replace(/</g, '&lt;')
                  .replace(/>/g, '&gt;')
                  .replace(/"/g, '&quot;')
                  .replace(/'/g, '&#039;');
    }
});