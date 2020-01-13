<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	 $this->load->view('common/header');
	 $this->load->view('common/sidebar');
?>
 <div class="app-content content container-fluid">
    <div class="content-wrapper">
        
      <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">
					<?php if($OfficeId==1)
					{
						echo	"Edit Contact";
					}
					else{
					echo	"Add Contact";
					}
					?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>contact/contactlist" class="btn btn-black" style="float:right">Back to Contact List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_valid"
						 action="<?php echo base_url();?>contact/contactadd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
							
								<div class="form-group">
									<input type="hidden" value="<?php echo $OfficeId; ?>" name="OfficeId">
									<label>Office Title</label>
									<input type="text" class="form-control" placeholder="Office Title" name="OfficeTitle" value="<?php echo $OfficeTitle;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Office Location</label>
									<input type="text" class="form-control" placeholder="Office Location" name="OfficeLocation" value="<?php echo $OfficeLocation;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Address</label>
									<input type="text" class="form-control" placeholder="Address" name="Address" value="<?php echo $Address;?>" minlength="3" maxlength="100">
								</div>
							
								<div class="form-group">
									<label>Contact Person Name</label>
									<input type="text" class="form-control" placeholder="Contact Person Name" name="ContactPersonName" value="<?php echo $ContactPersonName;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Landline Number/Contact Number</label>
									<input type="text" class="form-control" placeholder="Landline Number" name="LandlineNumber" id="LandlineNumber" value="<?php echo $LandlineNumber;?>" minlength="10" maxlength="10">
								</div>
								
								<div class="form-group">
									<label>Contact Number</label>
									<input type="text" class="form-control" placeholder="Contact Number" name="ContactNumber" id="ContactNumber" value="<?php echo $ContactNumber;?>" minlength="10" maxlength="10">
								</div>
								
								<div class="form-group">
									<label>Email Address</label>
									<input type="text" class="form-control" placeholder="Email Address" name="EmailAddress" value="<?php echo $EmailAddress;?>">
								</div>
								
								
								
								<?php  if($IsActive!=''){ ?>                                
								<div class="form-group">
									<label>Status</label>
									<div class="input-group">
										<label class="display-inline-block custom-control custom-radio ml-1">
											<?php// echo $IsActive; ?>
											<input type="radio" name="IsActive" value="Active"
												<?php if($IsActive=="Active") { echo "checked"; } ?>
												 class="custom-control-input">																					<span class="custom-control-indicator"></span>																	<span class="custom-control-description ml-0">Active</span>
													</label>
													<label class="display-inline-block custom-control custom-radio"><input type="radio" name="IsActive" value="Inactive"  <?php if($IsActive=="Inactive") { echo "checked"; } ?> class="custom-control-input">
													<span class="custom-control-indicator"></span>
													<span class="custom-control-description ml-0">Inactive</span>
													</label>
														</div>
								</div>
								<?php } else { ?>
									<div class="form-group">
									<label>Status</label>
									<div class="input-group">
										<label class="display-inline-block custom-control custom-radio ml-1">                           
										<input type="radio" name="IsActive" value="Active" checked="" 
											class="custom-control-input">
											<span class="custom-control-indicator"></span>
											<span class="custom-control-description ml-0">Active</span>
										</label>
										<label class="display-inline-block custom-control custom-radio">
											<input type="radio" name="IsActive" value="Inactive"
												class="custom-control-input">
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description ml-0">Inactive</span>
										</label>
									</div>
								</div>
								<?php } ?>


							<div class="form-actions">
									 <button class="btn btn-black " type="submit"><i class="icon-ok"></i> <?php echo ($OfficeId!='')?'Update':'Submit' ?></button>
							
									<input type="button" name="cancel" class="btn btn-default" value="Cancel" onClick="location.href='<?php echo base_url(); ?>contact/contactlist'">
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		
			
	</div>
</section>
<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>
	<?php 
 $this->load->view('common/footer');
?>

<script>
$("#LandlineNumber").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});

$("#ContactNumber").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});
$(document).ready(function()
{
       $('#form_valid').validate({
			rules: {
				OfficeTitle:{              
					required: true,                
				},
				Address:{              
					required: true,                
				}, 
				ContactPersonName:{              
					required: true,                
				},
				LandlineNumber:{              
					required: true,                
				}, 
				ContactNumber:{              
					required: true,                
				},
				EmailAddress:{              
					required: true,                
				}, 		
			 },

    });
});

 

	                

</script>