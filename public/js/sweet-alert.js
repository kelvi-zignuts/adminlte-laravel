// Function to confirm logout with SweetAlert
function confirmLogout(logoutUrl) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will be logged out!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout!'
    }).then((result) => {
        if (result.isConfirmed) {
            // If user confirms, redirect to logout route
            window.location.href = logoutUrl;
        }
    });
}
