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
					<?php if($HomeAboutId==1)
					{
						echo	"Edit About Home";
					}
					else{
					echo	"Add About Home";
					}
					?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Abouthome" class="btn btn-black" style="float:right">Back to About Home List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_valid"
						 action="<?php echo base_url();?>Abouthome/homeadd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
							
								<div class="form-group">
									<input type="hidden" value="<?php echo $HomeAboutId; ?>" name="HomeAboutId">
									<label>Home Title</label>
									<input type="text" class="form-control" placeholder="Home Title"
									 name="HomeTitle" value="<?php echo $HomeTitle;?>" minlength="3" maxlength="100">
								</div>
							
								<div class="form-group">
									<label>Home Description</label>
									<textarea id="editor1" rows="5" class="form-control" placeholder="Home Description" name="HomeDescription">
									<?php echo $HomeDescription; ?></textarea>
									<script>
										CKEDITOR.replace('editor1');
									</script>
								</div>

								<div class="form-group  uploadfrm">
									<label>Home Image</label>
									<p><span class="btn btn-black btn-file">
										<input type="hidden" name="pre_about_image" value="<?php echo $AboutImage;?>">
									Upload home image <input type="file" name="about_image"  onchange="readURL(this);">
									</span></p>									
									<span id="profileerror"></span>
								</div>
								<h6>Uplopad only jpeg,jpg,png,bmp image file</h6>
									<div class="preview">
									
									<?php if($AboutImage){ ?>
										<img id="blah" src="<?php echo base_url()?>upload/homeimage/<?php echo $AboutImage;?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">

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
									 <button class="btn btn-black " type="submit"><i class="icon-ok"></i> <?php echo ($HomeAboutId!='')?'Update':'Submit' ?></button>
							
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
				HomeTitle:{              
					required: true,                
				}, 
				HomeDescription:{              
					required: true,                
				}, 
				AboutImage:{
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