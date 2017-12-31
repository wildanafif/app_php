<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add Vendor

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">User</a></li>
                <li><a href="<?php echo base_url('user/vendor') ?>" >Vendor</a></li>
                <li class="active" ><a href="<?php echo base_url('user/vendor/add') ?>" >Add</a></li>
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
                <form method="post" action="<?php echo base_url('user/vendor/add') ?>" >
                 <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    <div class="box-body">
                        <div class="row" >
                        <div class="container-fluid" >
                              <div class="row" >
                                <div class="col-xs-4 col-md-4" >
                                    <div class="form-group">
                                        <label for="vendor_name">Vendor Name</label>
                                        <input name="vendor_name" type="text" class="form-control" id="vendor_name" placeholder="Vendor Name" data-validation="required length" data-validation-length="min6" >
                                    </div>
                                </div>
                                <div class="col-xs-4 col-md-4" >
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input data-validation="required length" data-validation-length="min6" name="username" type="text" class="form-control" id="username" placeholder="username">
                                    </div>
                                </div>
                                 <div class="col-xs-4 col-md-4" >
                                    <div class="form-group">
                                        <label for="profit">Profit</label>
                                        <input data-validation="required" name="profit" type="number" class="form-control" id="profit" placeholder="Profit">
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                            
                             <!-- <div class="col-xs-6 col-md-6" >
                                <div class="form-group">
                                    <label for="vendor_image">Image</label>
                                    <input name="vendor_image" type="file" class="form-control" id="vendor_image" onchange="readURL(this,'img-preview');" >
                                    <img id="img-preview" style="display: none" class="img-responsive" src="http://localhost/mantap-portal/assets/slider/images/1507147681.jpg" >

                                </div>
                            </div> -->
                            <div class="col-xs-6 col-md-6" >
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="hidden" id="latitude" name="latitude" >
                                    <input type="hidden" id="longitude" name="longitude" >
                                    <textarea data-validation="required" class="form-control" id="txt_address" name="address" ></textarea>
                                    <a href="javascript:void(0)" onclick="open_maps_picker('txt_address','latitude','longitude')" class="pull-right" href="" >Open Maps</a>
                                </div>
                            </div>

                        </div>
                       
                    </div>
                    <div class="box-footer" >
                        <button class="btn btn-success pull-right" type="submit"><i class="fa fa-fw fa-save"></i> Save</button>
                    </div>
                </form>            
                
                <!-- /.box-body -->
            </div>

           
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
</div>

<?php $this->load->view('utils/maps_picker_modal') ?>