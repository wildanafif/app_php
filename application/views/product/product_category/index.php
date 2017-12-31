<div class="content-wrapper">
    <div class="container">
    	
        <!-- Content Header (Page header) -->
        <section class="content-header">
        
            <h1>
                Product Category

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Product</a></li>
                <li class="active" ><a href="<?php echo base_url('product/product_category') ?>" >Category</a></li>
            </ol>
        </section>
		
        <!-- Main content -->
        <section class="content">
			<?php $this->load->view('utils/flash')?>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Product Category Listing</h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url('product/product_category/add') ?>" type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add Category</a>
                    </div>
                </div>

                <div class="box-body">
                   <table id="tb-product-category" class="table table-striped table-bordered dataTable no-footer dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="demo-dt-selection_info" style="width: 100%;">
				        <thead>
				            <tr>
				                <th>#</th>
				                <th>Category</th>
				                <th>Description</th>
				                <th style="width: 20%" >Opsi</th>
				            </tr>
				        </thead>
			        
			    	</table>
				
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
</div>
<script>

$(document).ready(function() {
     var not_order = [ 
        {
            "targets": 0,
            "orderable": false
        } ,
        {
            "targets": 2,
            "orderable": false
        } ,
        {
            "targets": 3,
            "orderable": false
        } 

    ];
    getDataJson('tb-product-category',base_url+'product/product_category/json' , not_order);
} );

</script>