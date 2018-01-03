var dateToday = new Date();
 	$( function() {
	    $( "#date" ).datepicker({
	        numberOfMonths: 2,
	        showButtonPanel: true,
	        minDate: dateToday,
	        dateFormat: 'dd-mm-yy',
	    });

  } );