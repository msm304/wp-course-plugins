var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});
jalaliDatepicker.startWatch({
  persianDigits: true,
  separatorChars: {
    date: "-",
  },
});

// add row
