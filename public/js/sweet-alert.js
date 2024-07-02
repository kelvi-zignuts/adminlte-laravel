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


function confirmDelete(deleteUrl) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will delete this user permanently!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // If user confirms, submit the form
            document.querySelector(`form[action="${deleteUrl}"]`).submit();
        }
    });
}


document.getElementById('createUserForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    let formData = new FormData(this);
    let actionUrl = this.action;

    fetch(actionUrl, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => {
        if (response.redirected) {
            // Detect if the response is a redirect
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'User created successfully!',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = response.url; // Redirect to the target URL
            });
        } else {
            // Handle form validation errors
            return response.text().then(text => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: text,
                    confirmButtonText: 'OK'
                });
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'There was an error creating the user.',
            confirmButtonText: 'OK'
        });
    });
});


document.getElementById('editUserForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    let formData = new FormData(this);
    let actionUrl = this.action;

    fetch(actionUrl, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => {
        if (response.redirected) {
            // Detect if the response is a redirect
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'User updated successfully!',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = response.url; // Redirect to the target URL
            });
        } else {
            // Handle form validation errors
            return response.text().then(text => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: text,
                    confirmButtonText: 'OK'
                });
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'There was an error creating the user.',
            confirmButtonText: 'OK'
        });
    });
});