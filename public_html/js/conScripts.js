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

    $("#dress-cat").on("click",".dress-cat-btn", function(){
        

        var imgID = $(this).attr('value');
        var parameters = {
            
            imgID : imgID
        };
        
        $.getJSON("get_dress.php", parameters)
        .done(function(data, textStatus, jqXHR){
            
            
            for(var i = 0; i < 5; i++){
                $('#tn-'+i).attr('src','../dresses/'+data['img_id']+"-"+i+".jpg");
                $('#item-'+i).attr('src','../dresses/'+data['img_id']+"-"+i+".jpg");
                
            }
            $('#brand-text').html(data['brand']);
            $('#dress-name').html(data['img_name']);
            $('#dress-price').html("RM "+ data['price']);
            $('#color').html(data["color"]);
            $('#composition').html(data["composition"]);
            
            var cl = "";
            var xs= "";
            var s= "";
            var m= "";
            var l= "";
            var xl= "";
            
            for(var j=0; j<data['care_label'].length;j++){
                cl += data['care_label'][j]+"</br>";
            }
            for(var k=0; k<data['xs'].length;k++){
                xs += "<td>"+data['xs'][k]+"</td>";
                s += "<td>"+data['s'][k]+"</td>";
                m += "<td>"+data['m'][k]+"</td>";
                l += "<td>"+data['l'][k]+"</td>";
                xl += "<td>"+data['xl'][k]+"</td>";
            }
            
            
            $('#care-label-text').html(cl);
            $('#size-xs').html(xs);
            $('#size-s').html(s);
            $('#size-m').html(m);
            $('#size-l').html(l);
            $('#size-xl').html(xl);
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
            
        });          
        
    });    

});

 

