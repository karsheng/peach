/**
 * conScripts.js
 *
 * consultant JavaScript, if any.
 */
$(document).ready(function(){

    var imageLoader = document.getElementById('cfilePhoto');
    imageLoader.addEventListener('change', handleImage, false);
    
    function handleImage(e) {
        var reader = new FileReader();
        reader.onload = function (event) {
            
            $('#culd1 img').attr('src',event.target.result);
        };
        reader.readAsDataURL(e.target.files[0]);
    }
    


    $('#cimageUploadForm').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: "upload.php",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                
                location.reload();
            },
            error: function(data){
                
                console.log("error uploading image");
            }
        });
    }));
    
    /*
    $('#cProfileUpdateForm').on('submit',(function(e) {
        
        var profile = $('#description').val();
        var parameters = {
                
            
            profile: profile
        };
            
        $.getJSON("update_profile.php", parameters)
        .done(function(){
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
                
        });
            
        
        
    }));    

    $("#cProfileSubmitBtn").on("click", function() {
        $("#cProfileUpdateForm").submit();
    });
    
    */
    $("#cSubmitBtn").on("click", function() {
        $("#cimageUploadForm").submit();
    });
    

});

















