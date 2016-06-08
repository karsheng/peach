/**
 * scripts.js
 *
 * Global JavaScript, if any.
 */

// var item - created in profile.php to count number of items added to cart.

$(document).ready(function(){

    var itemInCart = parseInt(document.getElementById('item-in-cart').textContent);    
    var item = []; //number of items in the cart
    var noOfRecs = $('.modal-body').length;

    for (var i = 0; i < noOfRecs; i++) {
        
        item['item-no-'+i] = parseInt($('#item-no-'+i).attr('value'));
    
    }

//show recommendations modal    
    $(".btn-view").click(function(){
        
        
        $("#recModal").html(""); //clear content in modal to avoid seeing previously loaded content.
        
        var act_con_id = $(this).attr('value'); //currently viewing con_id
        var con_name = $(this).attr('name'); //currently viewing con_name
        
        var parameters = {
            
            con_id: act_con_id
        };

        //to get recommendations data for viewing con_id.
        $.getJSON("recs.php", parameters)
        .done(function(data, textStatus, jqXHR) {
            
            //var d = ((data.length == 1) ? :d);
            var contentString = "";    
            for (var i = 0; i < data.length; i++)
            {
                var car_id = "car-"+ i;
                var leftCtrlContentString = "";
                var rightCtrlContentString = "";
                var carIndContentString = "";
                var carInnerContentString = "";
                var headerContentString = "";
                var carouselContentString = "";
                var tnContentString = "";
                var tabNavCS = "";
                var tabConCS = "";
                var tabCS = "";
                var footCS = "";
                var brand = data[i]['brand'];
                var dressName = data[i]['img_name'];
                var productDescCS = "";
                var addToCartBtnCS ="";
                
                
                    for (var j = 0; j < 5; j++)
                    {
                        var active = ((j == 0) ? "active" : "");
                        carIndContentString += "<li data-target='#" + car_id + "' data-slide-to='"+ j +"' class='"+ active +"'></li>";
                        carInnerContentString += "<div class='item " + active + "'><img src='dresses/" + data[i]['brand'] + "-" + data[i]['img_name'] + "-"+ j +".jpg' alt='"+ data[i]['img_name'] +"'></div>";
                        tnContentString += "<li><span><img name='"+car_id+"'class= 'tn' value = '" + j + "' style='' src='dresses/" + data[i]['brand'] + "-" + data[i]['img_name'] + "-"+ j +".jpg' alt='"+ data[i]['img_name'] +"'></span></li>";
                    }
                
                    for (var k = 0; k < 3; k++)
                    {
                        var active = ((k == 0) ? "active" : "");
                        var tabTitle ="";
                        var tabCon ="";
                        switch(k) {
                            case 0:
                            tabTitle ="Comments";
                            tabCon = data[i]['comments'];
                            break;
                            case 1:
                            tabTitle ="Details";
                            tabCon = "RM " + data[i]['price'];
                            break;
                            case 2:
                            tabTitle ="Misc.";
                            tabCon = ".....";
                            break;
                            
                        }
                        
                        tabNavCS += "<li class='"+active+"'><a  href='#tab-" + i + "-"+ k +"' data-toggle='tab'><h5>"+tabTitle+"</h5></a></li>";
                        tabConCS += "<div class='tab-pane " + active+"' id='tab-" + i + "-" + k + "'>"+tabCon+"</div>";
                    }
                var fav = ((data[i]['fav'] == '0') ? "user-fav" : "user-favourited");
                var cart = ((data[i]['cart'] == '0') ? "user-cart" : "user-added-cart");
                footCS = "<div class='modal-footer'><a role='button'><span class='glyphicon hrt glyphicon-heart " + fav + "' value = '" + data[i]['rec_id'] + "'></span></a><a role='button'><span class='glyphicon cart glyphicon-shopping-cart " + cart + "' value = '" + data[i]['rec_id'] + "'></span></a></div>";   
                tabCS = "<div id='tab-"+ i +"' class=''><ul class='nav nav-tabs small'>" + tabNavCS + "</ul>" + "<div class='tab-content'>" + tabConCS + "</div></div>";
                headerContentString = "<div class='modal-header'><div class='row'><div class='col-xs-1 vcenter mh-tn'><img class='img-circle' src = consultant_photos/"+con_name+"_1.jpeg></div><div class='col-xs-11 vcenter mh-cn'>"+con_name+"</div></div></div>";
                carIndContentString = "<ol class='carousel-indicators'>" + carIndContentString + "</ol>";
                carInnerContentString = "<div class='carousel-inner' role='listbox'>" + carIndContentString + carInnerContentString + "</div>";
                leftCtrlContentString = "<a class='left carousel-control' href='#"+ car_id +"' role='button' data-slide='prev'><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span><span class='sr-only'>Previous</span></a>";
                rightCtrlContentString = "<a class='right carousel-control' href='#" + car_id + "' role='button' data-slide='next'><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span><span class='sr-only'>Next</span></a>";
                tnContentString = "<ul class='img-list'>" + tnContentString + "</ul>";
                carouselContentString = "<div id='" + car_id + "' class='carousel' data-interval = 'false' data-ride='carousel'>" + carInnerContentString + leftCtrlContentString + rightCtrlContentString + "</div>";
                productDescCS = "<h4>"+dressName+"</h4>" + "<h5>"+brand+"</h5>" + "<h5><i>RM "+ data[i]['price'] + "</i></h5>";
                contentString += "<div class='modal-dialog modal-lg'><div class='modal-content'>" + headerContentString + "<div class='modal-body'><div class='row'><div class='col-md-5 col-xs-12'>" + carouselContentString + "</div><div class='col-md-1 hidden-xs hidden-sm'>" + tnContentString +"</div>"+"<div class='col-md-6'>"+ productDescCS+"</div></div><div class='row'><div class='col-xs-12'>"+ tabCS +"</div></div></div>" + footCS + "</div></div>";
            }
            
            $("#recModal").html(contentString);
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
        });    
        

    });
    
    $('#recModal').on('click', '.hrt', function(event){
    
    favourite($(this).find('span'));
    var value = fav_value($(this).find('span'));
    var rec_id = $(this).find('span').attr('value');
    

        
        var parameters = {
            
            rec_id: rec_id,
            fav: value
        };
        
        
        $.getJSON("update_favourite.php", parameters)
        .done(function(){
            
            
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
            
        });         
   
    });
    
    $('#recModal').on('click', '.add-to-cart', function(event){
    
        addToCart($(this));
   
    });
    
        
    $('#recModal').on('mouseover', '.tn', function(){
        var car = '#'+ $(this).attr('name');
        var val = parseInt($(this).attr('value'));
        $(this).fadeTo(1, 0.6);
        $(car).carousel(val);

    });

    $('#recModal').on('mouseout', '.tn', function(){
        
        $(this).fadeTo(1, 1);

    });

    //increase quantity of item by 1 with each click  
    $('#recModal').on('click', '.min-btn', function(){
        
        var itemID = $(this).attr('name');
        
        if (item[itemID] > 1) {
            
            item[itemID] -= 1;
            document.getElementById(itemID).value = item[itemID];
            
        }


    });
    
    $('select.in-cart').on('change', function (e) {
        
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        
        if ($(this).hasClass("update-size")){
            updateSize($(this),valueSelected);
        }else{
            
            updateQty($(this),valueSelected);
        }
        
        
        
    });
    
    $(".remove-from-cart").on('click', function(){
        
        updateQty($(this),0);
        
    });
    
    
    //http://www.jacklmoore.com/zoom/
    $('div.item').zoom();
    
    //remove button popover
    $('[data-toggle="popover"]').popover();   

    //decrease quantity of item by 1 with each click
    $('#recModal').on('click', '.plus-btn', function(){
        
        var itemID = $(this).attr('name');


        if (item[itemID] < 100) {
            
            item[itemID] += 1;
            document.getElementById(itemID).value = item[itemID];
            
        } 

    });     
   

    function favourite(fav){
            
        if (fav.hasClass("user-fav")){
            
            fav.removeClass("user-fav");
            fav.addClass("user-favourited");
                
        } else{
                
            fav.removeClass("user-favourited");
            fav.addClass("user-fav");
        }
        
    }

    function fav_value(fav){
        
        return (fav.hasClass('user-fav') ? 0 : 1);
    }
    
    function addToCart(e){
    
        var name = e.attr('name');
        var value = item[name];
        var rec_id = e.attr('value');
        var sd_size = $("select[name="+name+"]").val();
        
            var parameters = {
                
                rec_id: rec_id,
                cart: value,
                sd_size: sd_size
            };
            
            
            $.getJSON("add_to_cart.php", parameters)
            .done(function(){
    
                itemInCart += value;    
                document.getElementById('item-in-cart').textContent = itemInCart;    
                
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                // log error to browser's console
                console.log(errorThrown.toString());
                
            });         
       
    }
    
    function updateSize(e,v){
            
        var sd_size = v;
        var rec_id = e.attr('value');
        var parameters = {
                
            rec_id: rec_id,
            sd_size: sd_size
        };
            
        
            
        $.getJSON("update_size.php", parameters)
        .done(function(){
            
            $("#size-id-"+rec_id).html("("+ sd_size + ")"); 

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
                
        });
            
       
    }
    
    function updateQty(e,v){
            
        var cart = v;
        var rec_id = e.attr('value');
        var parameters = {
                
            rec_id: rec_id,
            cart: cart
        };
            
        $.getJSON("update_qty.php", parameters)
        .done(function(){
            location.reload();    
            //var price = parseFloat($("#price-id-"+rec_id).html());
            //var contentString = cart + " x " + price.toFixed(2);
            //console.log(contentString);

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
                
        });
            
       
    }
    
    
    var imageLoader = document.getElementById('filePhoto');
    var imageLoader2 = document.getElementById('filePhoto2');
    imageLoader.addEventListener('change', handleImage, false);
    imageLoader2.addEventListener('change', handleImage2, false);
    
    function handleImage(e) {
        var reader = new FileReader();
        reader.onload = function (event) {
            
            $('#uld1 img').attr('src',event.target.result);
        };
        reader.readAsDataURL(e.target.files[0]);
    }
    
    function handleImage2(e) {
        var reader = new FileReader();
        reader.onload = function (event) {
            
            $('#uld2 img').attr('src',event.target.result);
        };
        reader.readAsDataURL(e.target.files[0]);
    }    


    $('#imageUploadForm').on('submit',(function(e) {
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
                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

    $("#filePhoto").on("change", function() {
        $("#imageUploadForm").submit();
    });
    
    $("#filePhoto2").on("change", function() {
        $("#imageUploadForm").submit();
    });    

    // initiate price slider
    $("#ex15").slider({
    	min: 10,
    	max: 1000,
    	scale: 'logarithmic',
    	step: 10,
    });

});




