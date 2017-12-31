<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add product category

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="<?php echo base_url('product/product_category') ?>" >Category</a></li>
                <li class="active" ><a href="<?php echo base_url('product/product_category/add') ?>" >Add</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
	
            <div class="box box-primary">     
            <?php
            $csrf = array(
        		'name' => $this->security->get_csrf_token_name(),
        		'hash' => $this->security->get_csrf_hash()
			);
            ?>
            	<form method="POST" action="<?php echo base_url('product/product_category/add') ?>" >          
	                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
	                <div class="box-body">
	                    <div class="row" >
	                        <div class="col-xs-6 col-md-6" >
	                            <div class="form-group">
	                                <label for="product_category">Category</label>
	                                <input name="product_category" type="text" class="form-control" id="product_category" placeholder="Category Product" data-validation="required" >
	                            </div>
	                        </div>
	                        <div class="col-xs-6 col-md-6" >
	                            <div class="form-group">
	                                <label for="description">Description</label>                               
	                                <textarea class="form-control" id="description" name="description" ></textarea>
	                               
	                            </div>
	                        </div>
	
	                    </div>
	                    
	                </div>
                <!-- /.box-body -->
                	<div class="box-footer" >
						<button class="btn btn-success pull-right" type="submit"><i class="fa fa-fw fa-save"></i> Save</button>
                	</div>
                </form>
            </div>

           
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
</div>
