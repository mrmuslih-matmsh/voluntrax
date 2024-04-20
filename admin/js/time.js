// Get the input field
var inputField = document.getElementById('lp');

// Function to get current timestamp
function getCurrentTimestamp() {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var day = now.getDate();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    // Format the timestamp as needed (e.g., yyyy-mm-dd hh:mm:ss)
    var timestamp = year + '-' + pad(month) + '-' + pad(day) + ' ' + pad(hours) + ':' + pad(minutes) + ':' + pad(seconds);

    return timestamp;
}

// Function to pad single digit numbers with leading zeros
function pad(number) {
    return (number < 10 ? '0' : '') + number;
}

// Set the value of the input field to the current timestamp when the page loads
inputField.value = getCurrentTimestamp();