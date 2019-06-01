$( document ).ready(function() {
   
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    if($('.alert-danger').length){
        modal.style.display = "block";
    }

    // $('.modal-content input[type=text]').on('change invalid', function() {
    //     var textfield = $(this).get(0);
        
    //     if (!textfield.validity.valid) {
    //       textfield.setCustomValidity('Camp invalid');  
    //     }
    // });

    $(".delete-btn").on("click", function(){
        return confirm("Sigur vrei sa stergi?");
    });

});