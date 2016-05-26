/**
 * scripts.js
 *
 * Global JavaScript, if any.
 */
 
$(document).ready(function(){
    
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
                
                    for (var j = 0; j < 5; j++)
                    {
                        var active = ((j == 0) ? "active" : "");
                        carIndContentString += "<li data-target='#" + car_id + "' data-slide-to='"+ j +"' class='"+ active +"'></li>";
                        carInnerContentString += "<div class='item " + active + "'><img src='dresses/" + data[i]['img_name'] + "-"+ j +".jpg' alt='"+ data[i]['img_name'] +"'></div>";
                        tnContentString += "<div><img name='"+car_id+"'class= 'tn' value = '" + j + "' style='' src='dresses/" + data[i]['img_name'] + "-"+ j +".jpg' alt='"+ data[i]['img_name'] +"'></div>";
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
                carInnerContentString = "<div class='carousel-inner' role='listbox'>" + carInnerContentString + "</div>";
                //carIndContentString = "<ol class='carousel-indicators'>" + carIndContentString + "</ol>";
                leftCtrlContentString = "<a class='left carousel-control' href='#"+ car_id +"' role='button' data-slide='prev'><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span><span class='sr-only'>Previous</span></a>";
                rightCtrlContentString = "<a class='right carousel-control' href='#" + car_id + "' role='button' data-slide='next'><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span><span class='sr-only'>Next</span></a>";
                
                
                carouselContentString = "<div id='" + car_id + "' class='carousel' data-interval = 'false' data-ride='carousel'>" + carInnerContentString + leftCtrlContentString + rightCtrlContentString + "</div>";
                
                contentString += "<div class='modal-dialog'><div class='modal-content'>" + headerContentString + "<div class='modal-body'><div class='row'><div class='col-xs-9'>"+ carouselContentString + "</div><div class='col-xs-3'>" + tnContentString +"</div></div><div class='row'><div class='col-xs-12'>"+ tabCS +"</div></div></div>" + footCS + "</div></div>";
            }
            
            $("#recModal").html(contentString);
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
        });    
        

    });
    
    $('#recModal').on('click', '.hrt', function(event){
    
    favourite($(this));
    var value = fav_value($(this));
    var rec_id = $(this).attr('value');
    

        
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
    
    $('#recModal').on('click', '.cart', function(event){
    
    manageCart($(this));
    var value = cart_value($(this));
    var rec_id = $(this).attr('value');
    

        
        var parameters = {
            
            rec_id: rec_id,
            cart: value
        };
        
        
        $.getJSON("update_cart.php", parameters)
        .done(function(){
            
            
            
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
            
        });         
   
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

    function manageCart(cart){
            
        if (cart.hasClass("user-cart")){
            
            cart.removeClass("user-cart");
            cart.addClass("user-added-cart");
                
        } else{
                
            cart.removeClass("user-added-cart");
            cart.addClass("user-cart");
        }
        
    }

    function cart_value(cart){
    
        return (cart.hasClass('user-cart') ? 0 : 1);
    }


});





