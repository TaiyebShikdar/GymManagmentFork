let form = document.querySelecter('form');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  return false;
});

// Get the Register button
const registerButton = document.querySelector('button:nth-child(1)');

// Add an event listener to the Register button
registerButton.addEventListener('click', () => {
  // Redirect to register.html
  window.location.href = 'register.html';
});

//function for the trainer page, detects if the member selected is changed
document.getElementById('recordSelect').addEventListener('change', function() {
  var selectedId = this.value;
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
      if (request.readyState === XMLHttpRequest.DONE) {
          //checks to see if the request for the trainer page is a success
          if (request.status === 200) {
              document.getElementById('routine').value = request.responseText;
          } else {
              console.error('error on trainer page: ' + request.status);
          }
      }
  };

  request.open('GET', 'get_record_details.php?id=' + selectedId, true);
  request.send();
});