
$( document ).ready(function() {
    var arr = ['bg_1.jpg','bg_2.jpg','bg_3.jpg'];
    
    var i = 0;
    setInterval(function(){
        if(i == arr.length - 1){
            i = 0;
        }else{
            i++;
        }
        var img = 'url(../assets/images/'+arr[i]+')';
        $(".full-bg").css('background-image',img); 
     
    }, 4000)

});

// Get references to the buttons and forms
const individualBtn = document.getElementById('individual-btn');
const organizationBtn = document.getElementById('organization-btn');
const individualForm = document.getElementById('individual-form');
const organizationForm = document.getElementById('organization-form');

// Add event listeners to the buttons
individualBtn.addEventListener('click', function() {
    // Show individual form and hide organization form
    individualForm.style.display = 'block';
    organizationForm.style.display = 'none';
    // Update button active state
    individualBtn.classList.add('active');
    organizationBtn.classList.remove('active');
});

organizationBtn.addEventListener('click', function() {
    // Show organization form and hide individual form
    individualForm.style.display = 'none';
    organizationForm.style.display = 'block';
    // Update button active state
    individualBtn.classList.remove('active');
    organizationBtn.classList.add('active');
});

document.querySelectorAll('.delete-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the default link action

        // Get the opportunity ID from the data-opp-id attribute
        var oppId = this.getAttribute('data-opp-id');

        // Show a confirmation dialog
        var confirmation = confirm("Are you sure you want to delete this opportunity?");

        // If the user confirms, redirect to delete_opportunity.php with the opportunity ID
        if (confirmation) {
            window.location.href = 'delete_opportunity.php?opp_id=' + oppId;
        }
    });
});


function confirmDelete(opp_id) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You want to delete this opportunity?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = './blocks/delete_opportunity.php?opp_id=' + opp_id;
        }
    });
}





