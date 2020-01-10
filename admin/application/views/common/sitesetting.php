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
				<?php if(($this->session->flashdata('success'))){ ?>
					<div class="alert alert-success" id="successMessage">
					<strong> <?php echo $this->session->flashdata('success'); ?></strong> 
					</div>
				<?php } ?>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">
					<?php if($SettingId==1)
					{
						echo	"Edit Site Setting";
					}
					else
					{
						echo	"Add Site Setting";
					}
					?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>home/dashboard" class="btn btn-black" style="float:right">
					Back to Dashboard</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_valid"
						 action="<?php echo base_url();?>home/SitesettingAdd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
							
								<div class="form-group">
								<input type="hidden" value="<?php echo $SettingId; ?>" name="SettingId">
									<label>Site Name</label>
									<input type="text" class="form-control" placeholder="Site Name" name="FullName" value="<?php echo $FullName;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Site Domain Name</label>
									<input type="text" class="form-control" placeholder="Site Domain Name" name="SiteName" value="<?php echo $SiteName;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Site Email</label>
									<input type="email" class="form-control" placeholder="Site Email" name="SiteEmail" value="<?php echo $SiteEmail;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Site Contact Number</label>
									<input type="text" class="form-control" placeholder="Site Contact Number" name="SiteContactNumber" id="SiteContactNumber" value="<?php echo $SiteContactNumber;?>" minlength="10" maxlength="10">
								</div>

								<div class="form-group">
									<label>Other Contact Number</label>
									<input type="text" class="form-control" placeholder="Other Contact Number" name="OtherContactNumber" id="OtherContactNumber" value="<?php echo $OtherContactNumber;?>" minlength="10" maxlength="10">
								</div>

								<div class="form-group">
									<label>Office Address</label>
									<input type="text" class="form-control" placeholder="Office Address" name="OfficeAddress" value="<?php echo $OfficeAddress;?>" minlength="3" maxlength="300">
								</div>
								
								<div class="form-group">
									<label>Office Time</label>
									<input type="text" class="form-control" placeholder="Office Time" name="OfficeTime" value="<?php echo $OfficeTime;?>" minlength="3" maxlength="100">
								</div>

								<div class="form-group">
									<label>Tax</label>
									<input type="text" class="form-control" placeholder="Enter Tax" name="Tax" value="<?php echo $Tax;?>" minlength="1" maxlength="3">
								</div>

								<div class="form-group">
									<label>Happy Clients</label>
									<input type="text" class="form-control" placeholder="Enter Happy Clients" name="HappyClients" value="<?php echo $HappyClients;?>" id="HappyClients" minlength="1" maxlength="10">
								</div>

								<div class="form-group">
									<label>Trips Daily</label>
									<input type="text" class="form-control" placeholder="Enter Trips Daily" name="TripsDaily" value="<?php echo $TripsDaily;?>" id="TripsDaily" minlength="1" maxlength="10">
								</div>

								<div class="form-group">
									<label>Cabs</label>
									<input type="text" class="form-control" placeholder="Enter Cabs" name="Cabs" value="<?php echo $Cabs;?>" id="Cabs" minlength="1" maxlength="3">
								</div>

								<div class="form-group">
									<label>Kilometers Daily</label>
									<input type="text" class="form-control" placeholder="Enter Kilometers Daily" name="KilometersDaily" value="<?php echo $KilometersDaily;?>" id="KilometersDaily" minlength="1" maxlength="5">
								</div>
							
							    <div class="form-actions">
									 <button class="btn btn-black " type="submit"><i class="icon-ok"></i> <?php echo ($SettingId!='')?'Update':'Submit' ?></button>
							
									<!-- <input type="button" name="cancel" class="btn btn-default" value="Cancel" onClick="location.href='<?php //echo base_url(); ?>Testimonial/Testimoniallist'"> -->
								
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
$("#HappyClients").on("input", function(evt) {
	var self = $(this);
	self.val(self.val().replace(/[^\d].+/, ""));
	if ((evt.which < 48 || evt.which > 57)) 
	{
		evt.preventDefault();
	}});
$("#TripsDaily").on("input", function(evt) {
	var self = $(this);
	self.val(self.val().replace(/[^\d].+/, ""));
	if ((evt.which < 48 || evt.which > 57)) 
	{
		evt.preventDefault();
	}});
$("#Cabs").on("input", function(evt) {
	var self = $(this);
	self.val(self.val().replace(/[^\d].+/, ""));
	if ((evt.which < 48 || evt.which > 57)) 
	{
		evt.preventDefault();
	}});
$("#KilometersDaily").on("input", function(evt) {
	var self = $(this);
	self.val(self.val().replace(/[^\d].+/, ""));
	if ((evt.which < 48 || evt.which > 57)) 
	{
		evt.preventDefault();
	}});

$("#SiteContactNumber").on("input", function(evt) {
	var self = $(this);
	self.val(self.val().replace(/[^\d].+/, ""));
	if ((evt.which < 48 || evt.which > 57)) 
	{
		evt.preventDefault();
	}});

$("#OtherContactNumber").on("input", function(evt) {
		var self = $(this);
		self.val(self.val().replace(/[^\d].+/, ""));
		if ((evt.which < 48 || evt.which > 57)) 
		{
			evt.preventDefault();
		}});

$(function() { 
    setTimeout(function() {
  $('#successMessage').fadeOut('fast');
}, 10000);
   
});

$(document).ready(function()
{
       $('#form_valid').validate({
			rules: {
				FullName:{              
					required: true,                
				}, 
				SiteName:{              
					required: true,                
				}, 
				SiteEmail:{              
					required: true,                
				}, 
				SiteContactNumber:{              
					required: true,                
				}, 
				OfficeAddress:{              
					required: true,                
				},
				OfficeTime:{              
					required: true,                
				},
				Tax:{              
					required: true,                
				},
				HappyClients:{              
					required: true,                
				},
				TripsDaily:{              
					required: true,                
				},
				Cabs:{              
					required: true,                
				},
				KilometersDaily:{              
					required: true,                
				},			
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