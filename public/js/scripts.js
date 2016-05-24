/**
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 7
 *
 * Global JavaScript, if any.
 */
 
 //global variables
var act_con_id; //viewing con_id.
var favouriteByCon = []; //stores recommendations.fav value for viewing con_id.
var recs = []; //stores recommendations.id value for viewing con_id.
var currentSlide; //active data-slide-to value. This correspond to location in favourtieByCon[], recs[], addedToCart[]
var cartByCon = []; //stores boolean value (0 or 1 for recommendations.cart) for viewing con_id.
// var cart[] (created while loading cart.php) stores all recommendations.id that are added to cart i.e. recommendations. cart = '1'
// var favourite[] (created while loading favourite.php) stores all recommendations.id that are favourited i.e. recommendations.fav = '1'


$(document).ready(function(){
    
//show recommendations modal    
    $(".btn-view").click(function(){
        
        
        act_con_id = $(this).attr('value'); //currently viewing con_id
        //re-initialise variables
        favouriteByCon = []; 
        cartByCon = [];
        recs = [];

        var parameters = {
            
            con_id: act_con_id
        };

        //to get recommendations data for viewing con_id.
        $.getJSON("recs.php", parameters)
        .done(function(data, textStatus, jqXHR) {
            
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
                        carInnerContentString += "<div class='item " + active + "'><img style='height:100%;' src='dresses/" + data[i]['img_name'] + "-"+ j +".jpg' alt='"+ data[i]['img_name'] +"'></div>";
                        tnContentString += "<div><img style='margin:0px 0px 15px 0px; height:85px; width: 60%;' src='dresses/" + data[i]['img_name'] + "-"+ j +".jpg' alt='"+ data[i]['img_name'] +"'></div>";
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
                        
                        tabNavCS += "<li class='"+active+"'><a  href='#tab-" + i + "-"+ k +"' data-toggle='tab'><h4>"+tabTitle+"</h4></a></li>";
                        tabConCS += "<div class='tab-pane " + active+"' id='tab-" + i + "-" + k + "'>"+tabCon+"</div>";
                    }
                var fav = ((data[i]['fav'] == '0') ? "user-not-favourited" : "user-favourited");
                var cart = ((data[i]['cart'] == '0') ? "user-not-added-cart" : "user-added-cart");
                footCS = "<div class='modal-footer'><a role='button'><span class='glyphicon glyphicon-heart user-fav "+ fav +"' value= '" + data[i]['rec_id'] + "'></span></a><a role='button'><span class='glyphicon glyphicon-shopping-cart user-cart "+ cart +"' value= '" + data[i]['rec_id'] + "'></span></a></div>";   
                tabCS = "<div id='tab-"+ i +"' class=''><ul class='nav nav-tabs'>" + tabNavCS + "</ul>" + "<div class='tab-content'>" + tabConCS + "</div></div>";
                headerContentString = "<div class='modal-header'><h4 class='modal-title'>Consultant</h4></div>";
                carInnerContentString = "<div class='carousel-inner' role='listbox'>" + carInnerContentString + "</div>";
                carIndContentString = "<ol class='carousel-indicators'>" + carIndContentString + "</ol>";
                leftCtrlContentString = "<a class='left carousel-control' href='#"+ car_id +"' role='button' data-slide='prev'><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span><span class='sr-only'>Previous</span></a>";
                rightCtrlContentString = "<a class='right carousel-control' href='#" + car_id + "' role='button' data-slide='next'><span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span><span class='sr-only'>Next</span></a>";
                
                
                carouselContentString = "<div id='" + car_id + "' class='carousel slide' data-interval = 'false' data-ride='carousel'>" + carIndContentString + carInnerContentString + leftCtrlContentString + rightCtrlContentString + "</div>";
                
                contentString += "<div class='modal-dialog'><div class='modal-content'>" + headerContentString + "<div class='modal-body'><div class='row'><div class='col-xs-9'>"+ carouselContentString + "</div><div class='col-xs-3'>" + tnContentString +"</div></div>"+"<div class='row'>" + tabCS + "</div>" + footCS + "</div></div></div>";
            }
            
            $("#recModal").html(contentString);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
        });    
        

    });
    
    
    //favourite/unfavourite item when the heart icon is clicked
    $(".user-fav").click(function(){
        //get last segment of url i.e. favourite.php, or index.php etc.
        var href = window.location.href;
        var file = href.substr(href.lastIndexOf('/') + 1);
        
        
        //at favourite.php table
        if (file === 'favourite.php'){
            
            rec_id = $(this).attr('name');
            
            
        } else { //in a modal
        
            rec_id = recs[currentSlide]; 
            favouriteByCon[currentSlide] = value; //update array value
        }
        
        changeHeartColor($(this),$(this).attr('value'));
        var value = $(this).attr('value');
        
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

    // add/remove item from when cart icon in modal is clicked.
    $(".user-cart").click(function(){
        
        //get last segment of url i.e. favourite.php, or index.php etc.
        var href = window.location.href;
        var file = href.substr(href.lastIndexOf('/') + 1);
        
        var rec_id;
        
        //at favourite.php table
        if (file === 'favourite.php'){
            
            rec_id = $(this).attr('name');
            
            
        } else { //in a modal
            
            rec_id = recs[currentSlide]; 
            cartByCon[currentSlide] = value; //update array value
        }
        changeCartColor($(this),$(this).attr('value'));
        var value = $(this).attr('value');
        
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
    
    $("#myCarousel").on('slide.bs.carousel', function (event) {
        
        
        
        //slide move left i.e. go to the next slide
        if (event.direction === "left")
        {
            if(currentSlide + 1 === favouriteByCon.length) //move from last slide
            {
                displayHeartColor($(".user-fav"),favouriteByCon[0]);
                displayCartColor($(".user-cart"),cartByCon[0]);
                
            }
            else
            {
                var nextSlide = currentSlide + 1;
                displayHeartColor($(".user-fav"),favouriteByCon[nextSlide]);
                displayCartColor($(".user-cart"),cartByCon[nextSlide]);
            }
            
        }
        else //slide move right i.e. go to prev slide
        {
            if(currentSlide === 0) //move from first slide
            {
                displayHeartColor($(".user-fav"),favouriteByCon[favouriteByCon.length - 1]);
                displayCartColor($(".user-cart"),cartByCon[cartByCon.length - 1]);
                
            }
            else
            {
                var prevSlide = currentSlide - 1;
                displayHeartColor($(".user-fav"),favouriteByCon[prevSlide]);
                displayCartColor($(".user-cart"),cartByCon[prevSlide]);
            }

        }
            
    });
    
    $("#myCarousel").on('slid.bs.carousel', function () {
        
        
        currentSlide = parseInt($(".active").attr('data-slide-to'));
        
    });

    
    function changeHeartColor(hrt,fav){
        
        if(fav === '1' || fav === 1){
            hrt.removeClass('user-favourited');
            hrt.addClass('user-not-favourited');
            hrt.attr('value','0');
        }
        else
        {
            hrt.removeClass('user-not-favourited');
            hrt.addClass('user-favourited');
            hrt.attr('value','1');
        }
        
    };
    
    function displayHeartColor(hrt,fav){
        
        if(fav === '0' || fav === 0){
            hrt.removeClass('user-favourited');
            hrt.addClass('user-not-favourited');
        }
        else
        {
            hrt.removeClass('user-not-favourited');
            hrt.addClass('user-favourited');
            hrt.attr('value','1');
        }
        
    };
    
    function changeCartColor(crt,add){
        
        if(add === '1' || add === 1){
            crt.removeClass('user-added-cart');
            crt.addClass('user-not-added-cart');
            crt.attr('value','0');
        }
        else
        {
            crt.removeClass('user-not-added-cart');
            crt.addClass('user-added-cart');
            crt.attr('value','1');
        }
        
    };
    
    function displayCartColor(crt,add){
        
        if(add === '0' || add === 0){
            crt.removeClass('user-added-cart');
            crt.addClass('user-not-added-cart');
            crt.attr('value','0');
        }
        else
        {
            crt.removeClass('user-not-added-cart');
            crt.addClass('user-added-cart');
            crt.attr('value','1');
        }
        
    };   

});