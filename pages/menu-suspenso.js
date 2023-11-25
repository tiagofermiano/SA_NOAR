document.querySelector('.circle-button').addEventListener('click', function() {
    var dropdown = document.querySelector('.dropdown-content');
    if (dropdown.style.display === 'block') {
      dropdown.style.display = 'none';
    } else {
      dropdown.style.display = 'block';
    }
  });