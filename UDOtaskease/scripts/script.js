document.getElementById("temperatureInput").addEventListener("change", function() {
  var value = parseFloat(this.value);
  if (!isNaN(value)) {
      this.value = value.toFixed(1);
  }
});