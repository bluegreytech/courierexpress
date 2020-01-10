<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
	 $this->load->view('common/header');
	 $this->load->view('common/sidebar');
?>

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-body"><!-- Basic Tables start -->
  
<!-- Table head options start -->
<div class="row">
    <div class="col-xs-12">
   <?php //echo $this->session->flashdata('success');?>
    <?php if(($this->session->flashdata('success'))){ ?>
        <div class="alert alert-success" id="successMessage">
        <strong> <?php echo $this->session->flashdata('success'); ?></strong> 
        </div>
    <?php } ?>
       
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Booking History
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <a href="<?php echo base_url();?>user/Userlist" class="btn btn-black" style="float:right">Back To User List</a>
                </h4>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                    <table id="example" class="table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Sr No</th>
                                <th>Brand Name</th>
                                <th>Pickup Date</th>
                                <th>Start Point City</th>
                                <th>End Point City</th>
								<th>Payment Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
						<tbody>
                            <?php
                                $i=1;
                                if($cabhistory)
                                {                             
                                foreach($cabhistory as $row)
                                {          
                            ?>
                            <tr>
                            
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row->BrandName; ?></td>
                                <td><?php  $pdate=$row->PickupDate;
                                         $pidate = str_replace('/', '-', $pdate );
                                        echo $PickupDate = date("d-m-Y", strtotime($pidate));?>           
                                </td>
                                <td><?php echo $row->StartCity; ?></td>
                                <td><?php if($row->EndCity!=''){echo $row->EndCity;}else{echo "N/A";} ?></td>
                                <td>
                                    <?php if($row->payment_status=="Success")
                                        {
                                            echo "<span class='label label-success'>Success</span>";
                                        } 
                                        else
                                        {
                                            echo "<span class='label label-danger'>Pending</span>";
                                        } 
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php echo anchor('user/Edituser/'.$row->UserId,'<i class="ficon icon-pencil2" data-toggle="tooltip" title="Edit User"></i> '); ?>
                                    <a href="" data-id="<?php echo $row->UserId; ?>" data-toggle="modal" data-target="#myModal2_<?php echo $row->UserId; ?>"><i class="ficon icon-eye" data-toggle="tooltip" title="View Details"></i></a>
                                </td>  
                                <!-- Modal -->
                                <div id="myModal2_<?php echo $row->UserId;?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Fare Detail</h4>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row mb-1">                   
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Name:</strong></div>
                                                <div class="col-md-7"><input type="text" id="FirstName" 
                                                    value="<?php echo $row->FirstName.' '.$row->LastName;?>" readonly>
                                                </div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Phone No:</strong></div>
                                                <div class="col-md-7"><input type="text" id="ContactNumber" value="<?php echo $row->ContactNumber;?>" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Email:</strong></div>
                                                <div class="col-md-7"><input type="text" id="EmailAddress" value="<?php echo $row->EmailAddress;?>" readonly></div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Cab Type:</strong></div>
                                                <div class="col-md-7"><input type="text" id="BrandName" value="<?php echo $row->BrandName;?>" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Origin:</strong></div>
                                                <div class="col-md-7"><input type="text" id="StartCity" value="<?php echo $row->StartCity;?>" readonly></div>
                                            </div>
                                            <?php 
                                            if($row->EndCity!='')
                                            {
                                            ?>
                                                <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Destination:</strong></div>
                                                <div class="col-md-7"><input type="text" id="EndCity"
                                                 value="<?php if($row->EndCity!=''){echo $row->EndCity;}else{echo "N/A";};?>" readonly></div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Pickup Date:</strong></div>
                                                <div class="col-md-7"><input type="text" 
                                                     value="<?php  $pdate=$row->PickupDate;
                                                     $pidate = str_replace('/', '-', $pdate );
                                                    echo $PickupDate = date("d-m-Y", strtotime($pidate));?>"
                                                    readonly>
                                                </div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Drop Date:</strong></div>
                                                <div class="col-md-7"><input type="text" value="<?php  $ddate=$row->DropofDate;
                                                     $desdate = str_replace('/', '-', $ddate );
                                                    echo $DropofDate = date("d-m-Y", strtotime($desdate));?>"
                                                    readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Pickup Time:</strong></div>
                                                <div class="col-md-7"><input type="text" id="PickupTime" value="<?php echo $row->PickupTime;?>" readonly></div>
                                            </div>
                                            <?php 
                                            if($row->DropofTime!='')
                                            {
                                            ?>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Drop Time:</strong></div>
                                                <div class="col-md-7"><input type="text" id="DropofTime" value="<?php 
                                                if($row->DropofTime!='')
                                                {echo $row->DropofTime;}
                                                else{ echo "N/A";}?>" readonly></div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Payment:</strong></div>
                                                <div class="col-md-7"><input type="text" id="payment_status" value="<?php echo $row->payment_status;?>" readonly></div>
                                            </div>

                                            <?php 
                                            if($row->EndCity=='')
                                            {
                                                ?>
                                                <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Per Houre Fare:</strong></div>
                                                <div class="col-md-7"><input type="text" id="PerHoureFare" value="<?php echo $row->PerHoureFare;?>" readonly></div>
                                            </div>
                                                <?php
                                            }
                                               
                                            ?>

                                           
                                        </div>
                                        <div class="row price-detail">
                                            <div class="col-md-6 col-xs-6 left-border">
                                                <div class="text-center">
                                                    <div><h3>Total Distance</h3></div>
                                                    <div><span>KMS</span><input type="text" id="KMS" value="<?php echo $row->KMS;?>" readonly></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                 <div class="text-center">
                                                    <div><h3>Total Fare</h3></div>
                                                    <div><span>Cab Rate</span><input type="text" id="FinalAmount" value="<?php echo $row->FinalAmount;?>" readonly></div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                                <!-- End Model -->
                            </tr>      
                            <?php
                            $i++;
                                } 
                            }
                            ?>           
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table head options end -->



        </div>
      </div>
    </div>

<?php 
$this->load->view('common/footer');
?>

<script>


$(function() { 
    setTimeout(function() {
  $('#successMessage').fadeOut('fast');
}, 10000);
   
});

function deletedata(UserId){  
   // alert(id);
    $('#myModal').modal('show')
        $('#yes_btn').click(function(){
                url="<?php echo base_url();?>"
                $.ajax({
                url: url+"/user/deletedata/",
                type: "post",
                data: {UserId:UserId},
                success: function (response) {  
                console.log(response);           
                //document.location.href = url+'user/userlist';                  

            },
            error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
            }
            })
        });
}
</script>
