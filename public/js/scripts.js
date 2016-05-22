/**
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 7
 *
 * Global JavaScript, if any.
 */
 
 //global variables
var act_con_id; //active consultant id
var heart = []; //customer favourited item stored in array
var recs = []; //recommendations by currently viewing consultant stored in array
var currentSlide; //slide currently view by user

$(document).ready(function(){
    
//show recommendations modal    
    $(".btn-view").click(function(){
        
        act_con_id = $(this).attr('value');
        var indContentString = "";
        var bodyContentString = "";
        var active = "active";
        var parameters = {
            
            con_id: $(this).attr("value")
        };



        $.getJSON("recs.php", parameters)
        .done(function(data, textStatus, jqXHR) {
            
            for (var i = 0; i < data.length; i++)
            {
                var active = ((i == 0) ? "active" : "");
                var hr = ((i < data.length -1) ? "<hr>" : "")
                heart[i] = data[i]['fav'];
                recs[i] = data[i]['rec_id'];
                indContentString += "<li data-target='#myCarousel' data-slide-to='"+ i + "' class = '"+ active + "'></li>";
                bodyContentString += "<div class='item " + active + "'><div class='dress-container'><img src='dresses/"+data[i]['img_id']+".jpeg' value = '"+data[i]['img_id']+"'>" + "</div><div class='commentSection'>"+data[i]['comments']+"</div><div class='priceSection'>"+data[i]['price']+"</div></div>";
            }
            
            
            displayHeartColor($(".glyphicon-heart"),heart[0]);  
            $("#carousel-indicators-custom").html(indContentString);
            $("#carousel-body-custom").html(bodyContentString);
            
            currentSlide = parseInt($(".active").attr('data-slide-to'));

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
        });    
        

    });
    
    
//favourite/unfavourite item when the heart icon is clicked
    $(".glyphicon-heart").click(function(){
        
        
        changeHeartColor($(this),$(this).attr('value'));
        
        console.log(recs[currentSlide]);
        var parameters = {
            
            rec_id: recs[currentSlide],
            fav: $(this).attr('value')
        };

        $.getJSON("favourite.php", parameters)
        .done(function(data, textStatus, jqXHR) {
            
            alert("all good");
            heart[currentSlide] = $(this).attr('value');

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
            if(currentSlide + 1 === heart.length) //move from last slide
            {
                displayHeartColor($(".glyphicon-heart"),heart[0]);
                
            }
            else
            {
                var nextSlide = currentSlide + 1;
                displayHeartColor($(".glyphicon-heart"),heart[nextSlide]);
            }
            
        }
        else //slide move right i.e. go to prev slide
        {
            if(currentSlide === 0) //move from first slide
            {
                displayHeartColor($(".glyphicon-heart"),heart[heart.length - 1]);
                
            }
            else
            {
                var prevSlide = currentSlide - 1;
                displayHeartColor($(".glyphicon-heart"),heart[prevSlide]);
            }

        }
            
    });
    
    $("#myCarousel").on('slid.bs.carousel', function () {
        
        currentSlide = parseInt($(".active").attr('data-slide-to'));
        
    });


    function changeHeartColor(hrt,fav){
        
        if(fav === '1'){
            hrt.css('color','white');
            hrt.attr('value','0');
        }
        else
        {
            hrt.css('color','red');
            hrt.attr('value','1');
        }
        
    }
    
    function displayHeartColor(hrt,fav){
        
        if(fav === '0'){
            hrt.css('color','white');
            hrt.attr('value','0');
        }
        else
        {
            hrt.css('color','red');
            hrt.attr('value','1');
        }
        
    }

});