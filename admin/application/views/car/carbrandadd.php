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
					<?php if($CarBrandId==1)
					{
						echo	"Edit Car Brand";
					}
					else{
					echo	"Add Car Brand";
					}
					?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>car/carbrandlist" class="btn btn-black" style="float:right">Back to Car Brand List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_valid"
						 action="<?php echo base_url();?>car/carbrandadd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
							
								<div class="form-group">
								<input type="hidden" value="<?php echo $CarBrandId; ?>" name="CarBrandId">
									<label>Car Brand Name</label>
									<input type="text" class="form-control" placeholder="Car Brand Name" name="BrandName" value="<?php echo $BrandName;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Per Houre Fare</label>
									<input type="text" class="form-control" placeholder="Per Hour Fare" id="PerHoureFare" name="PerHoureFare" value="<?php echo $PerHoureFare;?>" minlength="1" maxlength="4">
								</div>
								
								<div class="form-group">
									<label>Per KMS Fare</label>
									<input type="text" class="form-control" placeholder="Car Rate Per KM" id="PerKmRate" name="PerKmRate" value="<?php echo $PerKmRate;?>" minlength="1" maxlength="4">
								</div>

								<div class="form-group">
									<label>Extra Per KMS</label>
									<input type="text" class="form-control" placeholder="Extra Per KMS" id="ExtraKMS" name="ExtraKMS" value="<?php echo $ExtraKMS;?>" minlength="1" maxlength="4">
								</div>

								<div class="form-group">
									<label>Driver Allowance Per Day</label>
									<input type="text" class="form-control" placeholder="Driver Allowance Per Day" id="DriverAllowancePerDay" name="DriverAllowancePerDay" value="<?php echo $DriverAllowancePerDay;?>" minlength="1" maxlength="4">
								</div>

								<div class="form-group">
									<label>State Tax</label>
									<input type="text" class="form-control" placeholder="State Tax" id="StateTax" name="StateTax" value="<?php echo $StateTax;?>" minlength="1" maxlength="4">
								</div>



								<div class="form-group">
									<label>Number of Seat</label>
									<input type="text" class="form-control" placeholder="Number of Seat" id="TotalSeat" name="TotalSeat" value="<?php echo $TotalSeat;?>" minlength="1" maxlength="2">
								</div>

								<div class="form-group">
									<label>Number of Baggage</label>
									<input type="text" class="form-control" placeholder="Number of Baggage" name="TotalBaggage" id="TotalBaggage" value="<?php echo $TotalBaggage;?>" minlength="1" maxlength="2">
								</div>

								<div class="form-group">
									<label>Description</label>
									<textarea id="editor1" rows="5" class="form-control" name="BrandCarDescription">
										<?php echo $BrandCarDescription; ?></textarea>
									<script>
										CKEDITOR.replace('editor1');
									</script>
								</div>

								<div class="form-group  uploadfrm">
									<label>Brand Car Image</label>
									<p><span class="btn btn-black btn-file">
										<input type="hidden" name="pre_brand_car_image" value="<?php echo $BrandCarImage;?>">
									Upload brand car image <input type="file" name="BrandCarImage" id="carimage" onchange="readURL(this);">
									</span></p>									
									<span id="profileerror"></span>
								</div>
								<h6>Uplopad only jpeg,jpg,png,bmp image file</h6>

								<div class="preview">
									<?php if($BrandCarImage){ ?>
										<img id="blah" src="<?php echo base_url()?>upload/carimages/<?php echo $BrandCarImage;?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">

									<?php } else{?>
									<img id="blah" src="" class="img-thumbnail border-0" style="display: none;  width: 100px; height: 100px;">
									<?php } ?>
								</div>

											
								<?php  if($IsActive!=''){ ?>                                
								<div class="form-group">
									<label>Status</label>
									<div class="input-group">
										<label class="display-inline-block custom-control custom-radio ml-1">
											
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
									 <button class="btn btn-black " type="submit"><i class="icon-ok"></i> <?php echo ($CarBrandId!='')?'Update':'Submit' ?></button>
							
									<input type="button" name="cancel" class="btn btn-default" value="Cancel" onClick="location.href='<?php echo base_url(); ?>car/carbrandlist'">
								
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
	
	$("#PerHoureFare").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});

	$("#PerKmRate").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});

	$("#ExtraKMS").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});
	
	$("#DriverAllowancePerDay").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});
	$("#StateTax").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});
	$("#TotalSeat").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});
	$("#TotalBaggage").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});
	$.validator.addMethod('filesize', function (value, element, param) {
       
	   return this.optional(element) || (element.files[0].size <= param)
   } ,'File size must be equal to or less then 2MB'); 

       $('#form_valid').validate({
			rules: {
				BrandName:{              
					required: true,                
				},
				PerHoureFare:{              
					required: true,                
				},
				StartPointCityId:{              
					required: true,                
				},
				EndPointCityId:{              
					required: true,                
				},
				PerKmRate:{              
					required: true,                
				},
				ExtraKMS:{              
					required: true,                
				},
				DriverAllowancePerDay:{              
					required: true,                
				},
				StateTax:{              
					required: true,                
				},
				TotalSeat:{              
					required: true,                
				},	
				TotalBaggage:{              
					required: true,                
				},
				BrandCarImage:{              
					//required: true,
					extension: "jpg|jpeg|png|bmp",
					filesize: 2097152,                 
				},		
						
			 },

			  errorPlacement: function (error, element) {
            console.log('dd', element.attr("name"))
            if (element.attr("name") == "BrandCarImage") {
                error.appendTo("#profileerror");
            } else{
                  error.insertAfter(element)
            }
        }  
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