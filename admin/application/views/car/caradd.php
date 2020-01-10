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
					<?php if($CarId==1)
					{
						echo	"Edit Car";
					}
					else{
					echo	"Add Car";
					}
					?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>car/Carlist" class="btn btn-black" style="float:right">Back to car List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_valid"
						 action="<?php echo base_url();?>car/caradd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

									<div class="form-group">
									<label>Select Brand Car</label>
									<select name="CarBrandId" class="form-control" required>
									<?php
									if($CarBrandId=='')
									{
										?>
										<option desabled value="">Please select brand car</option>
										<?php
									}
									else
									{
										?>
										<option value="<?php echo $CarBrandId;?>"><?php echo $BrandName;?></option>
										<?php
									}
									?>
								
										<?php
										if($carbrand)
										{
											foreach($carbrand as $brand)
											{
										?>
								
											<option value="<?php echo $brand->CarBrandId; ?>"><?php echo $brand->BrandName;?></option>
										<?php
										}}
										?>
									</select>
								</div>

							
								<div class="form-group">
								<input type="hidden" value="<?php echo $CarId; ?>" name="CarId">
									<label>Car Name</label>
									<input type="text" class="form-control" placeholder="Car Name" name="CarName" value="<?php echo $CarName;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Car Rate </label>
									<input type="text" class="form-control" placeholder="Car Rate" id="CarRate" name="CarRate" value="<?php echo $CarRate;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Drive Allowance  </label>
									<input type="text" class="form-control" placeholder="Drive Allowance" id="DriveAllowance" name="DriveAllowance" value="<?php echo $DriveAllowance;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Extra KMS</label>
									<input type="text" class="form-control" placeholder="Extra KMS" id="ExtraKMS" name="ExtraKMS" value="<?php echo $ExtraKMS;?>" minlength="3" maxlength="100">
								</div>


								<div class="form-group">
									<label>Number of Seat</label>
									<input type="text" class="form-control" placeholder="Number of Seat" id="NumberOfSeat" name="NumberOfSeat" value="<?php echo $NumberOfSeat;?>" minlength="1" maxlength="2">
								</div>

								<div class="form-group">
									<label>Number of Baggage</label>
									<input type="text" class="form-control" placeholder="Number of Baggage" id="NoOfBaggage" name="NoOfBaggage" value="<?php echo $NoOfBaggage;?>" minlength="1" maxlength="2">
								</div>

								

								

								<div class="form-group">
									<label>State Tax</label>
									<input type="text" class="form-control" placeholder="State Tax" id="StateTax" name="StateTax" value="<?php echo $StateTax;?>" minlength="1" maxlength="20">
								</div>

								<div class="form-group">
									<label>Ac/Nonac</label>
									<select name="AirCondition" class="form-control">
										<?php
											if($AirCondition=='')
											{
										?>
											<option disabled>Select</option>
											<option value="AC">AC</option>
											<option value="Nonac">Nonac</option>
										<?php
										}
										?>

										<?php
											if($AirCondition=='AC')
											{
												?><option disabled>Select</option>
													<option value="AC" selected="AC">AC</option>
													<option value="Nonac">Nonac</option>
												<?php
											}
											if($AirCondition=='Nonac')
											{
												?>
												<option disabled>Select</option>
													<option value="AC">AC</option>
													<option value="Nonac" selected="Nonac">Nonac</option>
												<?php
											}
										?>
	
									</select>
								</div>

								<div class="form-group">
									<label>Car Number</label>
									<input type="text" class="form-control" placeholder="Car Number" name="CarNumber" value="<?php echo $CarNumber;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group  uploadfrm">
									<label>Car Image</label>
									<p><span class="btn btn-black btn-file">
										<input type="hidden" name="pre_car_image" value="<?php echo $CarImage;?>">
									Upload car image <input type="file" name="CarImage" id="carimage" onchange="readURL(this);">
									</span></p>									
									<span id="profileerror"></span>
								</div>
									<div class="preview">
									
									<?php if($CarImage){ ?>
										<img id="blah" src="<?php echo base_url()?>upload/carimages/<?php echo $CarImage;?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">

									<?php } else{?>
									<img id="blah" src="" class="img-thumbnail border-0" style="display: none;  width: 100px; height: 100px;">
									<?php } ?>
								</div>

								<div class="form-group">
									<label>Description</label>
									<textarea id="editor1" rows="5" class="form-control" name="CarDescription" id="Notificationdescription"><?php echo $CarDescription; ?></textarea>
									<script>
										CKEDITOR.replace('editor1');
									</script>
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
									 <button class="btn btn-black" type="submit"><i class="icon-ok"></i> <?php echo ($CarId!='')?'Update':'Submit' ?></button>
							
									<input type="button" name="cancel" class="btn btn-default" value="Cancel" onClick="location.href='<?php echo base_url(); ?>car/Carlist'">
								
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
$("#NumberOfSeat").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});

$("#CarRate").on("input", function(evt) {
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

$("#DriveAllowance").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});

$("#NoOfBaggage").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});


$(document).ready(function()
{
	

	$.validator.addMethod('filesize', function (value, element, param) {
       
	   return this.optional(element) || (element.files[0].size <= param)
   } ,'File size must be equal to or less then 2MB'); 
       $('#form_valid').validate({
			rules: {
				CarBrandId:{              
					required: true,                
				},
				CarName:{              
					required: true,                
				},
				CarRate:{              
					required: true,                
				},
				DriveAllowance:{              
					required: true,                
				},
				ExtraKMS:{              
					required: true,                
				},
				NumberOfSeat:{              
					required: true,                
				},
				NoOfBaggage:{              
					required: true,                
				}, 
				StartPointCityId:{              
					required: true,                
				}, 
				EndPointCityId:{              
					required: true,                
				},
				StateTax:{              
					required: true,                
				},
				AirCondition:{              
					required: true,                
				}, 
				CarNumber:{              
					required: true,                
				},
				CarImage:{              
					//required: true, 
					extension: "JPG|jpeg|png|bmp",
					filesize: 2097152,                  
				},
				CarDescription:{              
					required: true,                
				},   
						
			 },

			  errorPlacement: function (error, element) {
            console.log('dd', element.attr("name"))
            if (element.attr("name") == "CarImage") {
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