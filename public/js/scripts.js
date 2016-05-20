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
                var hr = ((i < data.length -1) ? "<hr>" : "");
                indContentString += "<li data-target='#myCarousel' data-slide-to='"+ i + "' class = '"+ active + "'></li>";
                bodyContentString += "<div class='item " + active + "'><div class='dress-container'><img src='dresses/"+data[i]['img_id']+".jpeg' value = '"+data[i]['img_id']+"'>" + hr + "</div><div class='commentSection'>"+data[i]['comments']+"</div><div class='priceSection'>"+data[i]['price']+"</div></div>";
            }

            $("#carousel-indicators-custom").html(indContentString);
            $("#carousel-body-custom").html(bodyContentString);
            


        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
        });    
        

    });
    
    
//favourite/unfavourite item when the heart icon is clicked
    $(".glyphicon-heart").click(function(){
        
                
        alert(act_con_id);
        if ($(this).attr('value') === '0') 
        {
            
            $(this).css('color','#FF0000');
            $(this).attr('value','1'); 
        }
        else
        {
            $(this).css('color','#FFFFFF');
            $(this).attr('value','0'); 
        }
    });
    
    

});