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
					<?php if($ProductId==1)
					{
						echo	"Edit Product";
					}
					else{
					echo	"Add Product";
					}
					?>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<a href="<?php echo base_url();?>Product/productlist" class="btn btn-black" style="float:right">Back to Product List</a>
				</div>
				</h4>
				<div class="card-body collapse in">
					<div class="card-block">
				
						<form class="form" method="post" enctype="multipart/form-data" id="form_valid"
						 action="<?php echo base_url();?>product/productadd">
					
							<div class="form-body">
								<h4 class="form-section"><i class="icon-clipboard4"></i> Requirements</h4>
							
								<div class="form-group">
									<input type="hidden" value="<?php echo $ProductId; ?>" name="ProductId">
									<label>Product Name</label>
									<input type="text" class="form-control" placeholder="Product Name" name="ProductName" value="<?php echo $ProductName;?>" minlength="3" maxlength="100">
								</div>
							

								<div class="form-group">
									<label>Product Description</label>
									<textarea id="editor1" rows="5" class="form-control" name="ProductDescription">
									<?php echo $ProductDescription; ?></textarea>
									<script>
										CKEDITOR.replace('editor1');
									</script>
								</div>

								

								
								<div class="form-group  uploadfrm">
									<label>Product Image</label>
									<p><span class="btn btn-black btn-file">
										<input type="hidden" name="pre_product_image" value="<?php echo $ProductImage;?>">
									Upload product image <input type="file" name="ProductImage"  onchange="readURL(this);">
									</span></p>									
									<span id="profileerror"></span>
								</div>
								<h6>Uplopad only jpeg,jpg,png,bmp image file</h6>
									<div class="preview">
									
									<?php if($ProductImage){ ?>
										<img id="blah" src="<?php echo base_url()?>upload/productimage/<?php echo $ProductImage;?>" class="img-thumbnail border-0" style="display: block;  width: 100px; height: 100px;">

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
									 <button class="btn btn-black " type="submit"><i class="icon-ok"></i> <?php echo ($ProductId!='')?'Update':'Submit' ?></button>
							
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
				ProductName:{              
					required: true,                
				}, 
				ProductImage:{
					//required: true,
					extension: "jpg|jpeg|png|bmp",
					filesize: 2097152,   
				}, 
							
			 },

			 errorPlacement: function (error, element) {
            //console.log('dd', element.attr("name"))
            if (element.attr("name") == "ProductImage") {
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