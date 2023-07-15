// search-autocomplete.js

const searchInput = document.getElementById('search-username');
const autocompleteResults = document.getElementById('autocomplete-results');

searchInput.addEventListener('input', function () {
    const searchValue = this.value.trim();
    if (searchValue.length > 0) {

        // Creating Our XMLHttpRequest object
        let xhr = new XMLHttpRequest();

        // Making our connection 
        var url = `/profile/search/${searchValue}`;
        xhr.open("GET", url, true);

        // function execute after request is successful
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                showAutocompleteResults(JSON.parse(this.response));
            }
        }
        // Sending our request
        xhr.send();
    }
    else {
        clearAutocompleteResults();
    }
});

function showAutocompleteResults(data) {

    autocompleteResults.innerHTML = '';

    Array.from(data).forEach(user => {
        const link = `<li style="color:blue;margin:10px;"><a class="autocompleteLinks" href="/profile/${user.profile.username}">${user.name}</a></li>`;
        autocompleteResults.innerHTML += link;
    });
}

function clearAutocompleteResults() {
    autocompleteResults.innerHTML = '';
}
