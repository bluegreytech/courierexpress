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
					<?php if($ClockId==1)
					{
						echo	"Edit Clock";
					}
					else{
					echo	"Add Clock";
					}
					?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>clock/clocklist" class="btn btn-black" style="float:right">Back to Clock List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_valid"
						 action="<?php echo base_url();?>clock/clockadd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
							
								<div class="form-group">
									<input type="hidden" value="<?php echo $ClockId; ?>" name="ClockId">
									<label>Country Title</label>
									<input type="text" class="form-control" placeholder="Country Title" name="CountryTitle" value="<?php echo $CountryTitle;?>" minlength="3" maxlength="100">
								</div>
							
								<div class="form-group">
									<label>Country Time</label>
									<input type="text" class="form-control" placeholder="Country Time" name="CountryTime" value="<?php echo $CountryTime;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Country Time Zone</label>
									<input type="text" class="form-control" placeholder="Country Time Zone" name="CountryTimeZone" value="<?php echo $CountryTimeZone;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Time Scope</label>
									<input type="text" class="form-control" placeholder="Time Scope" name="TimeScope" value="<?php echo $TimeScope;?>" minlength="2" maxlength="100">
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
									 <button class="btn btn-black " type="submit"><i class="icon-ok"></i> <?php echo ($ClockId!='')?'Update':'Submit' ?></button>
							
									<input type="button" name="cancel" class="btn btn-default" value="Cancel" onClick="location.href='<?php echo base_url(); ?>Product/productlist'">
								
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

$(document).ready(function()
{
       $('#form_valid').validate({
			rules: {
				CountryTitle:{              
					required: true,                
				}, 
				CountryTime:{
					required: true,	   
				}, 
				CountryTimeZone:{              
					required: true,                
				}, 
				TimeScope:{
					required: true,	   
				}, 		
			 },
    });
});

</script>