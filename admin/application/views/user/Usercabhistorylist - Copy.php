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
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Contact Number</th>
								<th>Payment Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
						<tbody>
                            <?php
                                $i=1;
                                if($cabhistory){                             
                                foreach($cabhistory as $row)
                                {          
                            ?>
                            <tr>
                            
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row->FirstName.' '.$row->LastName; ?></td>
                                <td><?php echo $row->EmailAddress; ?></td>
                                <td><?php echo $row->ContactNumber; ?></td>
                             
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
                                    <a href="" data-id="<?=$row->UserId; ?>" data-toggle="modal" data-target="#myModal2"><i class="ficon icon-eye" data-toggle="tooltip" title="View Details"></i></a>
                                </td>  
                                <!-- Modal -->
                                <div id="myModal2" class="modal fade" role="dialog">
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
                                                <div class="col-md-7"><input type="text" id="FirstName" readonly></div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Phone No.:</strong></div>
                                                <div class="col-md-7"><input type="text" id="ContactNumber" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Email:</strong></div>
                                                <div class="col-md-7"><input type="text" id="EmailAddress" readonly></div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Cab Type:</strong></div>
                                                <div class="col-md-7"><input type="text" id="BrandName" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Origin:</strong></div>
                                                <div class="col-md-7"><input type="text" id="StartCity" readonly></div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Desination:</strong></div>
                                                <div class="col-md-7"><input type="text" id="EndCity" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Pickup Date:</strong></div>
                                                <div class="col-md-7"><input type="text" id="PickupDate" readonly>
                                                </div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Drop Date:</strong></div>
                                                <div class="col-md-7"><input type="text" id="DropofDate" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Pickup Time:</strong></div>
                                                <div class="col-md-7"><input type="text" id="PickupTime" readonly></div>
                                            </div>
                                             <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Drop Time:</strong></div>
                                                <div class="col-md-7"><input type="text" id="DropofTime" readonly></div>
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Payment:</strong></div>
                                                <div class="col-md-7"><input type="text" id="payment_status" readonly></div>
                                            </div>
                                            <!-- <div class="col-md-6 col-xs-6">
                                                <div class="col-md-5"><strong>Drop Time:</strong></div>
                                                <div class="col-md-7">12:00am</div>
                                            </div> -->
                                        </div>
                                        <div class="row price-detail">
                                            <div class="col-md-6 col-xs-6 left-border">
                                                <div class="text-center">
                                                    <div><h3>Total Distance</h3></div>
                                                    <div><span>KMS</span><input type="text" id="KMS" readonly></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                 <div class="text-center">
                                                    <div><h3>Total Fare</h3></div>
                                                    <div><span>Cab Rate</span><input type="text" id="FinalAmount" readonly></div>
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
                                } }
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

<script>
$(document).ready(function()
{
    $('#myModal2').on('show.bs.modal', function (e)
    {
        var UserId = $(e.relatedTarget).data('id');
        //alert(UserId);
        url="<?php echo base_url();?>"
            $.ajax({
            url: url+"user/ajaxuserdata/",
            type: "post",
            data: {UserId:UserId},
            success:function(response){
                var response = JSON.parse(response);
                console.log(response.PickupDate);

                $('#UserId').val(response.UserId);
                $('#FirstName').val(response.FirstName+' '+response.LastName);
                $('#EmailAddress').val(response.EmailAddress);
                $('#ContactNumber').val(response.ContactNumber);
                $('#BrandName').val(response.BrandName);
                $('#PickupDate').val(myDateFormatter(response.PickupDate));

                // $pdate=$this->input->post('#PickupDate');
                // $pidate = str_replace('/', '-', $pdate );
                // $PickupDate = date("Y-m-d", strtotime($pidate));


                $('#DropofDate').val(myDateFormatter(response.DropofDate));
                $('#PickupTime').val(response.PickupTime);
                $('#DropofTime').val(response.DropofTime);
                $('#StartCity').val(response.StartCity);
                $('#EndCity').val(response.EndCity);
                $('#PerKmRate').val(response.PerKmRate);
                $('#KMS').val(response.KMS);
                $('#TotalFareAmount').val(response.TotalFareAmount);
                $('#StateTax').val(response.StateTax);
                $('#Tax').val(response.Tax);
                $('#TotalAmount').val(response.TotalAmount);
                $('#TaxAdded').val(response.TaxAdded);
                $('#FinalAmount').val(response.FinalAmount);
                $('#payment_status').val(response.payment_status);
            }
           
        });
     });
});



function myDateFormatter(dobdate) 
{
    var d = new Date(dobdate);
    var day = d.getDate();
    var month = d.getMonth() + 1;
    var year = d.getFullYear();
    if (day < 10) {
        day = "0" + day ;
    }
    if (month < 10) {
      month = "0" + month;
    }
    var date = day + "/" + month + "/" + year;
    return date;
}; 
</script>