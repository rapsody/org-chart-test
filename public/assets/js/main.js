'use strict';

$(document).ready(function(){

    var URL ="/org-chart-test/public/";

    $.ajax({
        url: URL+ "api.php",
        success: function(response) {

            createList(response);
            setDragDrop();
        },
        error: function(response) {
            $('.results').text("No data could be retrieved").fadeOut(10000);
        
        }
    });

    function createList(data){

        jQuery.each(data, function() {

            var baseUsed =false;
            
            var div = document.createElement("div");
            $(div).attr("class", "popup");
            $(div).attr("id", "parentID_"+this.id);

            var divHeader = document.createElement("div");
            $(divHeader).attr("class", "header");
            $(divHeader).text(this.name+" ("+this.title+")");

            var divContent = document.createElement("div");
            $(divContent).attr("class", "content");
            $(divContent).attr("id", "contentID_"+this.id);

            if(this.base == 1 && baseUsed ==false){

                var baseContent = divContent;

                $('.containers').append(div);
                $(div).append(divHeader);
                $(div).append(divContent);

                baseUsed = true;//to stop replication

            }else{
                          
                $(div).append(divHeader);
                $(div).append(divContent);
                $(div).appendTo('#parentID_'+this.parentID +' .content:nth(0)');//nly append to 1 DIV
            }

        });

    }

    function setDragDrop(){

        $('.containers .popup .content').droppable({

            activeClass: "ui-state-default",
            hoverClass: "ui-state-hover",
            out: function() {
                $( this ).droppable( "option", "disabled", false );
            },
            drop: function(event, ui) {
   
                var targetId = this.id;//$(this).parent().attr('id');
                var userId = (ui.draggable).get(0).id;//ui.draggable.attr('id');
                var data = {userId:userId,targetId:targetId};

                $.post( URL+"api.php", data, function( result ) {
                  
                    $('.results').text("Successfully updated").fadeOut(3000);
                });
                
                $(ui.draggable).addClass("insidePopup");
                ui.draggable.detach().appendTo($(this));
            }
        });
        
        $('.popup').draggable({
            helper: 'clone',
            containment:"document"
        });
    }
});
