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
					<?php if($CityId==1)
					{
						echo	"Edit Routes";
					}
					else{
					echo	"Add Routes";
					}
					?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>city" class="btn btn-black" style="float:right">Back to Routes List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_valid"
						 action="<?php echo base_url();?>city/cityadd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>

								<div class="form-group">
									<label>Select Brand Car</label>
									<select name="CarBrandId" class="form-control" required>
									<?php
									// if($CarBrandId=='')
									// {
										?>
										<option disabled value="">Please select brand car</option>
										<?php
									// }
									// else
									// {
										?>
										<!-- <option value="<?php //echo $CarBrandId;?>"><?php// echo $BrandName;?></option> -->
										<?php
									//}
									?>
								
										<?php
										if($carbrand)
										{
											foreach($carbrand as $brand)
											{
										?>
											<!-- <option value="<?php// echo $brand->CarBrandId; ?>"><?php //echo 
											$brand->BrandName;?></option> -->

											<option value="<?php echo $brand->CarBrandId; ?>" <?php if($CarBrandId==$brand->CarBrandId){echo "selected" ;}?>><?php echo $brand->BrandName;?></option>

										<?php
										}}
										?>
									</select>
								</div>

							
								<div class="form-group">
								<input type="hidden" value="<?php echo $CityId; ?>" name="CityId">
									<label>Start City Point</label>
									<input type="text" class="form-control" placeholder="Start City Point" name="StartCity" value="<?php echo $StartCity;?>" minlength="3" maxlength="100">
								</div>


								<div class="form-group">
									<label>End City Point</label>
									<input type="text" class="form-control" placeholder="End City Point" name="EndCity" value="<?php echo $EndCity;?>" minlength="3" maxlength="100">
								</div>


								<?php  if($LocalCity!=''){ ?>                                
								<div class="form-group">
									<label>Start City Point Add Local</label>
									<div class="input-group">
										<label class="display-inline-block custom-control custom-radio ml-1">
											
											<input type="radio" name="LocalCity" value="Active"
												<?php if($LocalCity=="Active") { echo "checked"; } ?>
												 class="custom-control-input">																					<span class="custom-control-indicator"></span>																	<span class="custom-control-description ml-0">Active</span>
													</label>
													<label class="display-inline-block custom-control custom-radio"><input type="radio" name="LocalCity" value="Inactive"  <?php if($LocalCity=="Inactive") { echo "checked"; } ?> class="custom-control-input">
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
										<input type="radio" name="LocalCity" value="Active" checked="" 
											class="custom-control-input">
											<span class="custom-control-indicator"></span>
											<span class="custom-control-description ml-0">Active</span>
										</label>
										<label class="display-inline-block custom-control custom-radio">
											<input type="radio" name="LocalCity" value="Inactive"
												class="custom-control-input">
												<span class="custom-control-indicator"></span>
												<span class="custom-control-description ml-0">Inactive</span>
										</label>
									</div>
								</div>
								<?php } ?>

											
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
									 <button class="btn btn-black " type="submit"><i class="icon-ok"></i> <?php echo ($CityId!='')?'Update':'Submit' ?></button>
							
									<input type="button" name="cancel" class="btn btn-default" value="Cancel" onClick="location.href='<?php echo base_url(); ?>city'">
								
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
	$("#NumberOfSeat").on("input", function(evt) {
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
				StartCity:{              
					required: true,                
				},	
				EndCity:{              
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