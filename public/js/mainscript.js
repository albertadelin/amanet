$( document ).ready(function() {
   
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    $('.modal-content input[type=text]').on('change invalid', function() {
        var textfield = $(this).get(0);
        
        if (!textfield.validity.valid) {
          textfield.setCustomValidity('Camp invalid');  
        }
    });

});