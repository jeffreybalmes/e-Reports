$(document).ready(function() {

// DataTables
	$('#myTable tfoot th').each( function (i){
        var title = $('#myTable tfoot th').eq($(this).index()).text();
        $(this).html('<input type="text" placeholder="Search '+title+'" data-index="'+i+'" />');
    });


	var table = $('#myTable').DataTable({
		// colReorder: true,
		scrollY: 300,
		scrollX: true,
        ajax: "reportlist.php",
        columns: [
            { data: "action", width: "3%" },
            { data: "id", width: "5%" },
            { data: "division", width: "17%" },
            { data: "date", width: "10%" },
            { data: "company", width: "3%" },
            { data: "facility", width: "20%" },
            { data: "location", width: "27%" },
            { data: "regard", width: "15%" }
        ],
    });

    $(table.table().container()).on('keyup', 'tfoot input', function(){
        table
            .column($(this).data('index'))
            .search(this.value)
            .draw();
    });

// End DataTables

	$('#btn_send').click(function(){
		alert ('Please wait while sending...');

		var to = $('#to').val();
		var cc = $('#cc').val();
		var subject = $('#subject').val();
		var report_type = $('#report_type').val();
		var attachment = $('#attachment').val();


		if (report_type == 'inspection') {
			var url = 'report_inspection.php';
		} else {
			var url = 'report_incident.php';
		}

	    var id = [];
	    $('td :checkbox:checked').each(function(i) {
	        id[i] = $(this).val();
	    });
	    if (id.length === 0) {
	        alert('Please select atleast one checkbox');
	    }else{
	        $.ajax({
	            url: url,
	            type: 'POST',
	            data: {id:id, report_type:report_type, to:to, cc:cc, subject:subject, attachment:attachment},
	            beforeSend:function(html){
	                $('#status').html('Sending...');
	            },
	            success:function(msg){
	                $('#status').html(msg);
		        }
	        });
	     }

    });

});