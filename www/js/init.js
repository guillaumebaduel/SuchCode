/*
** init.js
*/

function  showDetails(id) {
	$.get("http://46.105.48.146/api/v1/articles/" + id, function(data, status) {
	    $( "#articles" ).hide();




    	$( "pre.demo-container" ).html(
    		"<strong>" + data[0].title + "</strong>"
    		+ "<p>Le " + data[0].date+ "</p>"

    		);



    	$( "pre.demo-container" ).fadeIn("slow");
    	$( "#btn-return" ).fadeIn("slow");
    	//console.log(data[0].title);
    });
}

function  returnArticles() {
  $( "#articles" ).fadeIn("slow");
  $( "pre.demo-container" ).fadeOut("slow");
  $( "#btn-return" ).fadeOut("slow");
}


(function($) {

	$(function() {

		$( "#btn-return" ).hide();



	});

})(jQuery);