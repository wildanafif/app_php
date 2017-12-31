
<?php 

if ($this->session->flashdata('error')) { ?>
<div class="row" >
	<div class="col-xs-6 col-md-6" >
		<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error') ?></div>
	</div>
</div>
<?php } ?>


<?php 

if ($this->session->flashdata('success')) { ?>
<div class="row" >
	<div class="col-xs-6 col-md-6" >
		<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success') ?></div>
	</div>
</div>
<?php } ?>