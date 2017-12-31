$(function(){
  function stripTrailingSlash(str) {
    if(str.substr(-1) == '/') {
      return str.substr(0, str.length - 1);
    }
    return str;
  }

  var url = document.URL;
  var activePage = stripTrailingSlash(url);
  
  var resUrl = url.split("/");
  console.log(resUrl);
  
  $('.nav li a').each(function(){  
    var currentPage = stripTrailingSlash($(this).attr('href'));
    var resCurrentPage = currentPage.split("/");
    console.log(resCurrentPage[4],resUrl[4]);
   

    if (activePage == currentPage) {
      $(this).parent().addClass('active'); 
      $(this).parent().parent().parent().addClass('active'); 
    } 
    if(resCurrentPage[4] == resUrl[4]){
    	//$(this).parent().addClass('active'); 
        $(this).parent().parent().parent().addClass('active'); 
    }
    
  });
});

function readURL(input,id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#'+id)
                        .attr('src', e.target.result)
                        .attr('style','width:50%;');
                };

                reader.readAsDataURL(input.files[0]);
                $('#'+id).show();
            }
        }

function getDataJson(id, url, not_order) {



	var save_method; // for save method string
	var table;	
	table = $('#'+id).DataTable({ 

        "processing": true, // Feature control the processing indicator.
        "serverSide": true, // Feature control DataTables' server-side
							// processing mode.
        "order": [], // Initial no order.

        // Load data for the table's content from an Ajax source
		// http://localhost/serverside_datatables/index.php/customers/ajax_list
        "ajax": {
            "url": url,
            "type": "GET",
            "dataType" : "json",

            statusCode: {
		            200: function(data) {
            			
            			console.log(tokenId);
		            	console.log(data);
		            	
		            },
                    204: function(data) {
		            	
		            	console.log(data)
                            // language.emptyTable is shown automatically
                    },
                    400: function(data) {
                    	
                    	console.log(data);                    
                    },
                    500: function(data) {
                    	
                    	console.log(data);                   
                    },
                    403: function(data) {
                    	console.log(tokenId);
                    	console.log(data);                   
                    }
            },

        },    
        "columnDefs": not_order

    });
}