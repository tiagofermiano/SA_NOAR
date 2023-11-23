function handleTraumaTypeChange() {
    var selectedOption = document.getElementById("traumaType").value;

    // Hide all markers
    hideAllMarkers();

    // Show the specific marker based on the selected option
    switch (selectedOption) {
      case "Trauma 1":
        document.getElementById("markerPurple").style.display = "block";
        break;
      case "Trauma 2":
        document.getElementById("markerRed").style.display = "block";
        break;
      // Add more cases for other options
    }
  }

  function hideAllMarkers() {
    // Hide all markers
    var markers = document.querySelectorAll(".position-flex");
    markers.forEach(function(marker) {
      marker.style.display = "none";
    });
  }