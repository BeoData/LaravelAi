$(document).ready(function() {
    // Attach a click event handler to the search button
    $('#searchButton').click(function(e) {
      e.preventDefault(); // Prevent the default form submission behavior
  
      // Get the search query from the input field
      var query = $('#queryInput').val();
  
      // Perform your search or any other desired action
      performSearch(query);
    });
  });
  