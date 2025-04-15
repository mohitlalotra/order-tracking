document.addEventListener("DOMContentLoaded", function () {
    const trackByRadios = document.querySelectorAll("input[name='trackBy']");
    const orderIdInput = document.getElementById("orderId");
    const contactInput = document.getElementById("contact");
    const helpSection = document.getElementById("helpSection");
    const form = document.getElementById("trackingForm");
    trackByRadios.forEach(radio => {
      radio.addEventListener("change", () => {
        if (radio.checked) {
          if (radio.value === "mobile") {
            orderIdInput.placeholder = "Mobile Number";
          } else if (radio.value === "awb") {
            orderIdInput.placeholder = "AWB Number";
          } else {
            orderIdInput.placeholder = "Order ID";
          }
        }
      });
    });
  });
  