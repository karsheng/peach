/**
 * conScripts.js
 *
 * consultant JavaScript, if any.
 */
 
 //currently viewing userID.

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
        getDress($(this));
    });
    
    $("#savedRecs").on("click",".dress-cat-btn", function(){
        getDress($(this));
    });
    
    $("#saveBtn").on("click", function(){
        
        var imgID = $("#car").attr("value"); 
        var parameters = {
            userID: $("#dressModal").attr("value"),
            comments: $("#comments").val(),
            recSize: $("#recSize").val(),
            imgID:imgID 
        };
        
        $.getJSON("save_recs.php", parameters)
        .done(function(data, textStatus, jqXHR){
            
            //var contentString = "<div id='rec-"+imgID+"' style='display:inline-block;' class='dress-cat-btn' value='"+imgID+"'><img style='padding:5px; width:70px; max-height:113px;' src='../dresses/"+imgID+"-0.jpg'/></div>";
            
            //$("#savedRecs").append(contentString);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
        // log error to browser's console
        console.log(errorThrown.toString());
        
        });          
        
    });
    
    $("#removeBtn").on("click", function(){
        
        var savedID = $(this).attr('value');
        var parameters = {
            savedID: savedID
        };
        
        $.getJSON("remove_saved.php", parameters)
        .done(function(data, textStatus, jqXHR){
            

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
        // log error to browser's console
        console.log(errorThrown.toString());
        
        });         
    });    
    

    function getDress(e){
        
        for(var i = 0; i < 5; i++){
            $('#tn-'+i).attr('src',"");
            $('#item-'+i).attr('src',"");
        }
        $('#brand-text').html("");
        $('#dress-name').html("");
        $('#dress-price').html("");
        $('#color').html("");
        $('#composition').html("");
        $('#care-label-text').html("");
        $('#size-xs').html("");
        $('#size-s').html("");
        $('#size-m').html("");
        $('#size-l').html("");
        $('#size-xl').html("");
        $("#comments").val("");
        $('#recSize').val('XS');
        $('#removeBtn').css('visibility','hidden');

        
        var imgID = e.attr('value');
        var parameters = {
            
            imgID : imgID,
            userID : $("#dressModal").attr("value")
        };
        
        $.getJSON("get_dress.php", parameters)
        .done(function(data, textStatus, jqXHR){
            
            
            for(var i = 0; i < 5; i++){
                $('#tn-'+i).attr('src','../dresses/'+data['img_id']+"-"+i+".jpg");
                $('#item-'+i).attr('src','../dresses/'+data['img_id']+"-"+i+".jpg");
                
            }
            $('#car').attr('value',imgID);
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
            
            $.getJSON("get_saved_recs.php", parameters)
            .done(function(data, textStatus, jqXHR){
                if(data['found'] == 1) {
                    $("#comments").val(data['comments']);
                    $('#recSize').val(data['rec_size']);
                    $('#removeBtn').css('visibility','visible');
                    $('#removeBtn').attr('value',data['saved_id']);
                }
                //$('#removeBtn').css('visibility','visible');        
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
            
            });        
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
            
        });        
        
    }

});

 

