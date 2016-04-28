'use strict';

function updateUserData(id,name,title){

    var first = document.getElementById('updatename');
    first.value = name;

    var second = document.getElementById('updatetitle');
    second.value = title;

    var third = document.getElementById('updateid');
    third.value = id;

}


$(document).ready(function(){

    var URL ="/org-chart-test/public/";
    firstCall();
    function firstCall(){

        $( ".containers" ).empty();
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
     }
    
    $( "#updateusers" ).submit(function( event ) {

        var userId = document.getElementById('updateid').value;
        var updatename = document.getElementById('updatename').value;
        var updatetitle = document.getElementById('updatetitle').value;

        var data = {userId:userId,updatename:updatename,updatetitle:updatetitle};

        $.ajax({
              type: "POST",
              url:  URL+"put.php", 
              data: data,
              success: function(msg)
                {
                  
                        var first = document.getElementById('updatename');
                        first.value = "";

                        var second = document.getElementById('updatetitle');
                        second.value = "";

                        var third = document.getElementById('updateid');
                        third.value = "";
                        firstCall();
                      //  location.reload(); 

                }   
             
            });



      event.preventDefault();
    });


    function createList(data){

   
        jQuery.each(data, function() {

            var baseUsed =false;
            
            var div = document.createElement("div");
            $(div).attr("class", "popup");
            $(div).attr("id", "parentID_"+this.id);

            var divHeader = document.createElement("div");
            $(divHeader).attr("class", "header");


            var a =  $('<a></a>').attr("href","javascript:updateUserData("+this.id+",'"+this.name+"','"+this.title+"')").attr("class","link")
            .append(this.name+" ("+this.title+")");


          //  var a = document.createElement('');
          //  var linkText = document.createTextNode(this.name+" ("+this.title+")");
          // // a.appendChild(linkText);
          //  a.href = "javascript:updateUserData";



           // $(divHeader).text(this.name+" ("+this.title+")");

            var divContent = document.createElement("div");
            $(divContent).attr("class", "content");
            $(divContent).attr("id", "contentID_"+this.id);

            if(this.base == 1 && baseUsed ==false){

                var baseContent = divContent;

                $('.containers').append(div);
                $(div).append(divHeader);
                $(divHeader).append(a);
                $(div).append(divContent);

                baseUsed = true;//to stop replication

            }else{
                          
                $(div).append(divHeader);
                $(divHeader).append(a);
                $(div).append(divContent);
                $(div).appendTo('#parentID_'+this.parentID +' .content:nth(0)');//nly append to 1 DIV
            }

        });

    }

    function setDragDrop(){

        $('.containers .popup .content').droppable({

            activeClass: "ui-state-default",
            hoverClass: "ui-state-hover",
            greedy:true,
            cancel : ".header",
            out: function() {
                $( this ).droppable( "option", "disabled", false );
            },
            /*over: function( event, ui ) {
                $(this).parent().removeClass('ui-state-hover');
                $(this).parent(0).addClass('ui-state-hover');
            },*/
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
        var draggableDiv = $('.popup');
        $('.popup').draggable({
            helper: 'clone',
             handle: $('.content', draggableDiv),
            containment:"document"
        });
    }
});
