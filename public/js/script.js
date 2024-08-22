$(document).ready(function() {
    var totalRecord = 0;
	var category = getCheckboxValues('category');
	var type = getCheckboxValues('type');
    var brand = getCheckboxValues('brand');
    var color = getCheckboxValues('color');
    var size = getCheckboxValues('size');
    var grp = getCheckboxValues('grp');
    var totalData = $("#totalRecords").val();
	var sorting = getCheckboxValues('sorting');
	// console.log(category);
	// console.log(brand);
	// console.log(totalData);
	$.ajax({
		type: 'POST',
		url : "load_products.php",
		dataType: "json",			
		data:{totalRecord:totalRecord, grp:grp, type:type, brand:brand, color:color, size:size, category:category, sorting:sorting},
		success: function (data, textStatus, jqXHR) {
			console.log("Success Response:", data);
						console.log("Text Status:", textStatus);
						console.log("XHR Object:", jqXHR);
			console.log(data);
			$("#results").append(data.products);
			totalRecord++;
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.error("AJAX Error:", textStatus, errorThrown);
			console.log("Error Response:", jqXHR.responseText);
			// Handle the error here, for example, display an error message to the user.
		}
	});	
	// console.log(totalData);
    $(window).scroll(function() {
        scrollHeight = parseInt($(window).scrollTop() + $(window).height());        
        if (scrollHeight >= $(document).height() - 100 && !loading) { // Adjust the threshold
            if (totalRecord <= totalData) {
                loading = true;
                $('.loader').show();

                $.ajax({
                    type: 'POST',
                    url: "load_products.php",
                    dataType: "json",
                    data: {
                        totalRecord: totalRecord,
                        grp: grp,
                        type: type,
                        brand: brand,
                        color: color,
                        size: size
                    },
                    success: function(data, textStatus, jqXHR) {
                        console.log("Success Response:", data);
                        console.log("Text Status:", textStatus);
                        console.log("XHR Object:", jqXHR);
                        $("#results").append(data.products);
                        $('.loader').hide();
                        totalRecord++;
                        loading = false; // Set loading to false after successful response
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                        console.log("Error Response:", jqXHR.responseText);
                        loading = false; // Set loading to false in case of an error
                    }
                });
            }
        }
    });

    function getCheckboxValues(checkboxClass){
        var values = new Array();
		$("."+checkboxClass+":checked").each(function() {
		   values.push($(this).val());
		});
        return values;
    }
    $('.sort_rang').change(function(){
        $("#search_form").submit();
        return false;
    });
    
	$(document).on('click', 'label', function() {
		if($('input:checkbox:checked')) {
			$('input:checkbox:checked', this).closest('label').addClass('active');
		}
	});	
});



