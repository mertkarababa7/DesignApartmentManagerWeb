<?php 

include '../db_conn.php';
include 'CheckCustomerLogin.php';
include 'navbar.php';
 ?>

 <style>

  .hideextra { white-space: nowrap; overflow: hidden; text-overflow:ellipsis; }
  #updatebutton
  {
    background-color:#4e73df;
    color:white;
    width:%100;
    height:%100;
    font-size:15px;
  }
  #dltbutton
  {
    background-color:#f7786b;
    color:white;
    width:%100;
    height:%100;
    font-size:15px;
  }
     
 </style>

<!DOCTYPE html>
<html>
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
   <link rel="stylesheet" href="adminMainPage.css">

<head>


  <title> Announcements</title>




<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="customer.css">

</head>
<body>
<script>
     $(document).ready(function(){
       $("#Input").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $("#Table tr").filter(function() {
           $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
       });
     });

  </script>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Announcements</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


    <thead>
  <tr "active-row">
    <th>Block</th>
    <th class='centerText'>Header</th>
    <th class='centerText'>Details</th>
    <th class='hideextra'>Opened Date</th>
     
   
     
     
   
   
  </tr>
   </thead>

 <?php 
  $Block=$_SESSION['Block'];
    $query = "SELECT * FROM announcement where Block='$Block' ORDER BY id desc";

    $data = mysqli_query($conn,$query);
    $total=mysqli_num_rows($data);
    if($total!=0)
    {
while($result = mysqli_fetch_assoc($data)){   //Creates a loop to loop through results
 if ($result['head']=='Dues' || $result['head']=='Rules'){
  echo "  <tbody><tr class='table-danger'>
  <td>".$result['Block']."</td>
  <td class='centerText'>".$result['head']."</td>
<td class='centerText'>".$result['details']."</td>
  <td class='hideextra'>".$result['openedDate']."</td>


  
  </tr>";

}
else{
   echo "  <tbody><tr class='table-primary'>
  <td>".$result['Block']."</td>
  <td class='centerText'>".$result['head']."</td>
<td class='centerText'>".$result['details']."</td>
  <td class='hideextra'>".$result['openedDate']."</td>


 

 
  </tr>";
}
}}
?>
  
</table>


</div>
<script>
  function checkdelete()
  {
    return confirm('Are you sure you want to Close This Flat')
  }

</script>

</body>


</html>