(function($) {

	
/*DELETE ITEM*/

	var sureDelete = $('.delete');

	sureDelete.on('click', function(event) {

		return confirm('for sure delete?');
	});

/*AJAX REQUEST FOR ADD ITEM*/

	var ajaxExample = $('.form-group');

	ajaxExample.on('submit', function(event){

		event.preventDefault();
		var text = $('.form-control').val();

		var req = $.ajax({
		    url : baseUrl + "todo/ajax",
		    type: 'POST',
		    dataType: 'json',
            data: {text:text}
		    
		});

		req.done(function (data) {

			if(data.status=='success'){
			
				$.ajax({
		         'url': baseUrl
		        }).done(function (html) {   

		        	  var listGroup = $('.list-group');	
		              var newLI = $(html).find('#item-'+ data.id);
		              newLI.hide();
		              newLI.prependTo(listGroup);
		              newLI.fadeIn(1500);


		        $('.form-control').val('').focus();

				});
		    }
	   
	    });

	});

})(jQuery);