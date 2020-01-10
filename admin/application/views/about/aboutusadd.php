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
					<?php if($AboutusId==1)
					{
						echo	"Edit About Us";
					}
					else{
					echo	"Add About Us";
					}
					?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>About/Aboutlist" class="btn btn-black" style="float:right">Back to About List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_valid"
						 action="<?php echo base_url();?>About/Aboutadd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
							
								<div class="form-group">
									<input type="hidden" value="<?php echo $AboutusId; ?>" name="AboutusId">
									<label>About Title</label>
									<input type="text" class="form-control" placeholder="About Title" name="AboutTitle" value="<?php echo $AboutTitle;?>" minlength="3" maxlength="100">
								</div>
							

								<div class="form-group">
									<label>About Description</label>
									<textarea id="editor1" rows="5" class="form-control" name="AboutDescription">
									<?php echo $AboutDescription; ?></textarea>
									<script>
										CKEDITOR.replace('editor1');
									</script>
								</div>

								<div class="form-group">
									<label>About Second Title</label>
									<input type="text" class="form-control" placeholder="About Second Title" name="SecondTitle" value="<?php echo $SecondTitle;?>" minlength="3" maxlength="100">
								</div>
							

								<div class="form-group">
									<label>About Second Description</label>
									<textarea id="editor2" rows="5" class="form-control" name="SecondDescription">
									<?php echo $SecondDescription; ?></textarea>
									<script>
										CKEDITOR.replace('editor2');
									</script>
								</div>

								<div class="form-group">
									<label>About Third Title</label>
									<input type="text" class="form-control" placeholder="About Third Title" name="ThirdTitle" value="<?php echo $ThirdTitle;?>" minlength="3" maxlength="100">
								</div>
							

								<div class="form-group">
									<label>About Third Description</label>
									<textarea id="editor3" rows="5" class="form-control" name="ThirdDescription">
									<?php echo $ThirdDescription; ?></textarea>
									<script>
										CKEDITOR.replace('editor3');
									</script>
								</div>

								<div class="form-group">
									<label>About Fourth Title</label>
									<input type="text" class="form-control" placeholder="About Fourth Title" name="FourthTitle" value="<?php echo $FourthTitle;?>" minlength="3" maxlength="100">
								</div>
							

								<div class="form-group">
									<label>About Fourth Description</label>
									<textarea id="editor4" rows="5" class="form-control" name="FourthDescription">
									<?php echo $FourthDescription; ?></textarea>
									<script>
										CKEDITOR.replace('editor4');
									</script>
								</div>

								<div class="form-group  uploadfrm">
									<label>About Image</label>
									<p><span class="btn btn-black btn-file">
										<input type="hidden" name="pre_about_image" value="<?php echo $AboutImage;?>">
									Upload about image <input type="file" name="about_image"  onchange="readURL(this);">
									</span></p>									
									<span id="profileerror"></span>
								</div>
								<h6>Uplopad only jpeg,jpg,png,bmp image file</h6>
									<div class="preview">
									
									<?php if($AboutImage){ ?>
										<img id="blah" src="<?php echo base_url()?>upload/aboutimage/<?php echo $AboutImage;?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">

									<?php } else{?>
									<img id="blah" src="" class="img-thumbnail border-0" style="display: none;  width: 100px; height: 100px;">
									<?php } ?>

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
									 <button class="btn btn-black " type="submit"><i class="icon-ok"></i> <?php echo ($AboutusId!='')?'Update':'Submit' ?></button>
							
									<input type="button" name="cancel" class="btn btn-default" value="Cancel" onClick="location.href='<?php echo base_url(); ?>About/Aboutlist'">
								
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
				AboutTitle:{              
					required: true,                
				}, 
				SecondTitle:{              
					required: true,                
				}, 
				ThirdTitle:{              
					required: true,                
				}, 
				FourthTitle:{              
					required: true,                
				}, 
				about_image:{
					//required: true,
					extension: "jpg|jpeg|png|bmp",
					filesize: 2097152,   
				}, 
							
			 },

			 errorPlacement: function (error, element) {
            //console.log('dd', element.attr("name"))
            if (element.attr("name") == "about_image") {
                error.appendTo("#profileerror");
            } else{
                  error.insertAfter(element)
            }
        } 
    });
});

 

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