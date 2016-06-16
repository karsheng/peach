/**
 * conScripts.js
 *
 * consultant JavaScript, if any.
 */
$(document).ready(function(){

    var imageLoader = document.getElementById('cfilePhoto');
    if(typeof(imageLoader) != "undefined" && imageLoader !== null) {
        imageLoader.addEventListener('change', handleImage, false);
    }
    
    
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
    
    $("#cSubmitBtn").on("click", function() {
        $("#cimageUploadForm").submit();
    });
    
    $(".user-modal").on("click", function(){
        
        var userID = $(this).attr('value');
        window.location.href = "https://peach-karsheng88.c9users.io/public_html/consultant/user.php?u="+userID;
    });

});

















