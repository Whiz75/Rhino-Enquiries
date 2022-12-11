function successAlert(){
    Swal.fire(
        'Success!',
        'Your enquiry has been submitted successfully!',
        'success'
    )
}

function warningAlert() {
    Swal.fire({
        title: 'Error!',
        text: 'Please note that arrival Date can mot be greater than Departure Date',
        icon: 'error',
        confirmButtonText: 'Okay'
    })
}