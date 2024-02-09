import "./bootstrap";

import Alpine from "alpinejs";
// resources/js/app.js

import Swal from "sweetalert2";
window.Swal = Swal;

// Function to display success message
window.showSuccessMessage = function (message) {
    Swal.fire({
        icon: "success",
        title: "Success!",
        text: message,
    });
};

// Function to confirm deletion
window.confirmDelete = function (formId) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the form if the user confirms
            document.getElementById(formId).submit();
        }
    });
};

// function for tost success message

window.Alpine = Alpine;

Alpine.start();
