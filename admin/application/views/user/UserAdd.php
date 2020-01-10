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
					<?php if($UserId==1)
					{
						echo "Edit User";
					}
					else{
					echo	"Add User";
					}
					?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>User/Userlist/" class="btn btn-black" style="float:right">Back to User List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="add_user" action="<?php echo base_url();?>User/Useradd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
							
								<div class="form-group">
								<input type="hidden"   value="<?php echo $UserId; ?>" name="UserId">
									<label>First Name</label>
									<input type="text" class="form-control" placeholder="First Name" name="FirstName" value="<?php echo $FirstName;?>" minlength="2" maxlength="20">
								</div>

								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" placeholder="Last Name" name="LastName" value="<?php echo $LastName;?>" minlength="2" maxlength="20">
								</div>

								<div class="form-group">
									<label>Email Address</label>
									<input type="text" class="form-control" placeholder="Email Address" name="EmailAddress" value="<?php echo $EmailAddress;?>" readonly>
								</div>

								<div class="form-group">
									<label>Contact Number</label>
									<input type="text" class="form-control" placeholder="Contact Number" name="ContactNumber" value="<?php echo $ContactNumber;?>" readonly>
								</div>
								
								
								
						
								<?php  if($IsActive!=''){ ?>
                                
								<div class="form-group">
									<label>Status</label>
										<div class="input-group">								
											<label class="display-inline-block custom-control custom-radio ml-1">		   <input type="radio" name="IsActive" value="Active"
											<?php if($IsActive=="Active") { echo "checked"; } ?>
											 class="custom-control-input">					
											 <span class="custom-control-indicator"></span>
											 <span class="custom-control-description ml-0">Active</span>										</label>										<label class="display-inline-block custom-control custom-radio">					<input type="radio" name="IsActive" value="Inactive"  <?php if($IsActive=="Inactive") { echo "checked"; } ?> 
												class="custom-control-input">					<span class="custom-control-indicator"></span>										
												<span class="custom-control-description ml-0">Inactive</span>								</label></div>
											</div>
									<?php } else { ?>
									<div class="form-group">
										<label>Status</label>									<div class="input-group">								<label class="display-inline-block custom-control custom-radio ml-1">							<input type="radio" name="IsActive" value="Active" checked="" class="custom-control-input">		
										<span class="custom-control-indicator"></span>		<span class="custom-control-description ml-0">Active</span>	</label>										<label class="display-inline-block custom-control custom-radio">										<input type="radio" name="IsActive" value="Inactive"
										class="custom-control-input">						
										<span class="custom-control-indicator"></span>		<span class="custom-control-description ml-0">Inactive</span></label>
										</div>
								</div>
							<?php } ?>


							<?php  if($payment_status!=''){ ?>
                                
								<div class="form-group">
									<label>Payment Status</label>
										<div class="input-group">								
											<label class="display-inline-block custom-control custom-radio ml-1">			<input type="radio" name="payment_status" value="Success"
													<?php if($payment_status=="Success") { echo "checked"; } ?>
													 class="custom-control-input">					
													 <span class="custom-control-indicator"></span>
													 <span class="custom-control-description ml-0">Success</span> 
											</label>										
											<label class="display-inline-block custom-control custom-radio">					<input type="radio" name="payment_status" value="Pending"  
												 	<?php if($payment_status=="Pending") { echo "checked"; } ?> 
													class="custom-control-input">					<span class="custom-control-indicator"></span>										
													<span class="custom-control-description ml-0">Pending</span>     
											</label>
									</div>
								</div>
							<?php } else { ?>
									<div class="form-group">
										<label>Payment Status</label>									
										<div class="input-group">								
										<label class="display-inline-block custom-control custom-radio ml-1">				<input type="radio" name="payment_status" value="Success" checked="" class="custom-control-input">		
											<span class="custom-control-indicator"></span>		
											<span class="custom-control-description ml-0">Success</span>	
										</label>										
										<label class="display-inline-block custom-control custom-radio">
											<input type="radio" name="payment_status" value="Pending"
											class="custom-control-input">						
											<span class="custom-control-indicator"></span>		
											<span class="custom-control-description ml-0">Pending</span>
										</label>
									</div>
								</div>
							<?php } ?>



							<div class="form-actions">
							 	<button class="btn btn-black" type="submit"><i class="icon-ok"></i> <?php echo ($UserId!='')?'Update':'Submit' ?></button>
								
								<input type="button" name="cancel" class="btn btn-default" value="Cancel" onClick="location.href='<?php echo base_url(); ?>user/Userlist'">
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
       $('#add_user').validate({
			rules: {
				FirstName:{              
					required: true,                
				},  
				LastName:{
					required:true,
				},        
				EmailAddress:{
					required:true,            
				},
				ContactNumber:{
						required:true,
				}				
				
			 }, 
    });
});

 //CKEDITOR.replace('editor1');

 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').css('display', 'block');
                    $('#blah').attr('src', e.target.result);
                };
             reader.readAsDataURL(input.files[0]);
            }
        }		                

</script>