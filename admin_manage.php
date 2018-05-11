<?php 
session_start();
include 'localconnect.php';
// OR isset($_SESSION["username"])
if(isset($_SESSION["admin"])) 
{
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Management Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<br>

<div class="container-fluid">
  <h2 class="text-center">ADMINISTRATOR</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <!-- <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">All</a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#user">User</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#Medicine">Medicine</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#payment">Payment</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#ordertbl">Order's</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#prescription">prescription</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php" style="background: #E74C3C;color: white;">Logout</a>
    </li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- <div id="home" class="container tab-pane active"><br>
      <h3>ALL Tables</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div> -->
    <!-- --------------------------------------Registered user-------------------------------------- -->
    <div id="user" class="container-fluid tab-pane active"><br>
      <h3>Registration table</h3>
      <br>
      <?php 
        $slt_reg = "SELECT * FROM medi_register";
        $result = mysqli_query($localconnect,$slt_reg);
        ?>
        <div class="container-fluid">
          <table class="table">
            <thead>
              <tr>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>GENDER</th>
                <th>CONTACT</th>
                <th>DOB</th>
                <th>PASSWORD</th>
                <th>CART ID</th>
              </tr>
            </thead>
            <?php while($row = mysqli_fetch_array($result)) 
            {
              ?>
            <tbody>
              <tr>
                <?php 
                  echo "<td>".$row["name"]."</td>";
                  echo "<td>".$row["email"]."</td>";
                  echo "<td>".$row["gender"]."</td>";
                  echo "<td>".$row["contact"]."</td>";
                  echo "<td>".$row["dob"]."</td>";
                  echo "<td>".$row["password"]."</td>";
                  echo "<td>".$row["cart_nm"]."</td>";
                  // echo "<td><a href='#'>Edit</a></td>";
                  // mysqli_free_result($row);
                }
                 ?>
              </tr>
            </tbody>
          </table>
        </div>
      
    </div>
    <!-- --------------------------------------Medicines -------------------------------------- -->
    <div id="Medicine" class="container-fluid tab-pane fade"><br>
      <h3>Insert medicine</h3>
      <br>
        <div class="container-fluid" style="overflow-x: auto;">
          <table class="table">
          <thead>
            <tr>
              <th>M_ID</th>
              <th>M_NAME</th>
              <th>DESCRIPTION</th>
              <th>COST</th>
              <th>EXP_DATE</th>
              <th>MFG_DATE</th>
              <th>COMPOSITION</th>
              <th>IMAGE</th>
              <th>QUENTITY</th>
              <th>SYMPTOMS</th>
              <th>TYPE</th>
              <th>CATEGORY</th>
              <th>SUBMIT</th>
            </tr>
          </thead>
          <tbody>
            <form action="admin_manage.php" method="POST" enctype="multipart/form-data">
            <tr>
              <td><input type="text" name="mid" id="mid" placeholder="Medicine ID" disabled=""></td>
              <td><input type="text" name="mname" id="mname" placeholder="Medicine Name"></td>
              <td><input type="text" name="description" id="description" placeholder="Description"></td>
              <td><input type="text" name="cost" id="cost" placeholder="Cost"></td>
              <td><input type="date" name="exp_date" id="exp_date" placeholder="Exp Date"></td>
              <td><input type="date" name="mfg_date" id="mfg_date" placeholder="MFG Date"></td>
              <td><input type="text" name="composition" id="composition" placeholder="Composition"></td>
              <td><input type="file" name="image" id="image"></td>
              <td><input type="number" name="quentity" id="quentity" placeholder="Quentity"></td>
              <td><input type="symptoms" name="symptoms" id="symptoms" placeholder="Symptoms"></td>
              <td><input type="text" name="type" id="type" placeholder="Medicine Type"></td>
              <td><select name="category" required>
                <option value="personal_care">Personal care</option>
                <option value="nutrition">Nutrition</option>
                <option value="mom baby">mom baby</option>
              </select></td>
              <td><input type="submit" class="btn btn-primary" name="m_submit"></td>
            </tr>
            </form>
          </tbody>
        </table>
        <?php 
          if (isset($_POST["m_submit"])) 
          {
            // $m_id=$_POST["mid"];
            $m_name=$_POST["mname"];
            $m_desc=$_POST["description"];
            $m_cost=$_POST["cost"];
            $m_exp=$_POST["exp_date"];
            $m_mfg=$_POST["mfg_date"];
            $m_comp=$_POST["composition"];
            // $m_image=$_POST["image"]["name"];
            $quentity=$_POST["quentity"];
            $symptoms=$_POST["symptoms"];
            $type=$_POST["type"];
            $category=$_POST["category"];

              // $saveloc = "store_img/".basename($_FILE["image"]["name"]);
              $f_name = $_FILES['image']['name'];
              $f_temp = $_FILES['image']['tmp_name'];
              $f_size = $_FILES['image']['size'];
              $f_shaperate = explode('.',$f_name);
              $f_extension = strtolower(end($f_shaperate));
              $f_newfile = uniqid().'.'.$f_extension;
              $f_store = "store_images/".$f_newfile;

              

              if ($f_extension =='jpg' || $f_extension=='jpeg'||$f_extension=='png') 
              {
                  if($f_size>=5000000)
                  {
                    echo "file size overload";          
                  }
                  else
                  {
                    move_uploaded_file($f_temp, $f_store);
                  }
              }
              if (empty($m_name)) 
              {
                echo "M ID is empty";
              }
              else if (empty($m_desc)) 
              {
                echo "Desc is empty";
              }
              else if (empty($m_cost)) 
              {
                echo "Cost is Empty";
              }
              else if (empty($m_exp)) {
                echo "Expire date is empty";
              }
              else if (empty($m_mfg)) {
                echo "mfg date is empty";
              }
              else if (empty($m_comp)) {
                echo "Composition is empty";
              }
              else if(empty($f_store))
              {
                echo "image is empty";
              }
              else if (empty($quentity)) {
                echo "quentity is empty";
              }
              else if (empty($symptoms)) {
                echo "Symptoms is empty";
              }
              else if (empty($type)) {
                echo "type is empty";
              }
              else if (empty($category)) 
              {
                echo "type is empty";
              }
              else
              {
                $m_id = uniqid();
$insrtmed = "INSERT INTO medicine (m_id,m_name,m_desc,m_cost,m_exp,m_mfg,m_comp,image,quentity,symptoms,type,category)
               VALUES('$m_id','$m_name','$m_desc','$m_cost','$m_exp','$m_mfg','$m_comp','$f_store','$quentity','$symptoms','$type','$category')";
                  if (mysqli_query($localconnect,$insrtmed)) 
                  {
                    echo "<script>alert('Medicine successfully added to the table');</script>";
                    echo "<script>window.location.href='admin_manage.php?'</script>";
                  }
                  else
                  {
                    echo "item didi not get inserted.<br>";
                    echo $localconnect->error;
                  }
                }
          }
         ?>
        </div>

        <!-- -----------------------other div---------------------- -->
      <h3>Medicine Table</h3>
      <br>
      <div class="container-fluid" style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th>M_ID</th>
              <th>M_NAME</th>
              <th>DESCRIPTION</th>
              <th>COST</th>
              <th>EXP_DATE</th>
              <th>MFG_DATE</th>
              <th>COMPOSITION</th>
              <th>IMAGE</th>
              <th>QUENTITY</th>
              <th>SYMPTOMS</th>
              <th>TYPES</th>
              <th>CATEGORY</th>
              <th colspan="2">EDIT</th>
            </tr>
          </thead>
          <?php 
            $sltmed = "SELECT * FROM medicine";
            $result2 = mysqli_query($localconnect,$sltmed);
            while ($row2 = mysqli_fetch_array($result2))
            {
              echo "<tbody>";
              echo "<tr>";
              echo "<td>'".$row2["m_id"]."'</td>";
              echo "<td>'".$row2["m_name"]."'</td>";
              echo "<td>'".$row2["m_desc"]."'</td>";
              echo "<td>'".$row2["m_cost"]."'</td>";
              echo "<td>'".$row2["m_exp"]."'</td>";
              echo "<td>'".$row2["m_mfg"]."'</td>";
              echo "<td>'".$row2["m_comp"]."'</td>";
              echo "<td>'".$row2["image"]."'</td>";
              echo "<td>'".$row2["quentity"]."'</td>";
              echo "<td>'".$row2["symptoms"]."'</td>";
              echo "<td>'".$row2["type"]."'</td>";
              echo "<td>'".$row2["category"]."'</td>";
              echo "<td><a href='admin_manage.php?delete_item=".$row2["m_id"]."'>DELETE</a></td>";
              echo "<td>EDIT</td>";
              echo "</tr>";
              echo "</tbody>";
            }
           if (isset($_GET["delete_item"])) 
           {
            $d_id = $_GET["delete_item"];
            $deleteitem = "DELETE FROM medicine WHERE m_id='".$d_id."'";
            if (mysqli_query($localconnect,$deleteitem)) 
            {
              echo "<script>alert('Deleted')</script>";
              echo "<script>window.location.href='admin_manage.php'</script>";
            }
           }
           ?>

        </table>
      </div>
    </div>
   <!-- <!-- <!--  -->
    <!-- --------------------------------------Order table-------------------------------------- -->
    <div id="Ordersuccessful" class="container-fluid tab-pane fade"><br>
      <h3>Order successful</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <!-- --------------------------------------Workers table-------------------------------------- -->
    <div id="payment" class="container-fluid tab-pane fade"><br>
      <h3>Payment Details</h3>
      <table class="table">
      <?php 
        $sltpmt = "SELECT * FROM payment";
        if ($result3 = mysqli_query($localconnect,$sltpmt)) 
        {
          echo "<tr>";
          echo "<th>Payment ID</th>";
          echo "<th>Order ID</th>";
          echo "<th>User</th>";
          echo "<th>Transection ID</th>";
          echo "<th>Amount</th>";
          echo "<th>Order by</th>";
          echo "</tr>";
          while ($row3 = mysqli_fetch_array($result3)) 
          {
            echo "<tr>";
            echo "<td>".$row3["pid"]."</td>";
            echo "<td>".$row3["orderid"]."</td>";
            echo "<td>".$row3["user"]."</td>";
            echo "<td>".$row3["tran_id"]."</td>";
            echo "<td>".$row3["amount"]."</td>";
            echo "<td>".$row3["order_by"]."</td>";
            echo "</tr>";
          }
        }
      ?>
      </table>
    </div>

        <div id="prescription" class="container-fluid tab-pane fade"><br>
            <h3>Priscription</h3>
            <table class="table">
              <?php 
              $sltper = "SELECT * FROM prescription";
              if ($result7 = mysqli_query($localconnect,$sltper)) 
              {
                while($row7 = mysqli_fetch_array($result7))
                {
                    echo "<tr>";
                    echo "<td>".$row7["p_id"]."</td>";
                    echo "<td>".$row7["u_id"]."</td>";
                    echo "<td><a href='".$row7["p_file"]."'><img src='".$row7["p_file"]."' alt='' width='100px height='100px'></a></td>";
                    echo "<td>".$row7["p_status"]."</td>";
                    $pr_status = $row7["p_id"];
                    echo "<td><a href='admin_manage.php?p_stat=$pr_status'>change status</a></td>";
                    echo "</tr>";
                }
              }
              if (isset($_GET["p_stat"])) 
              {
                $state = $_GET["p_stat"];
                echo "<form action='admin_manage'>";
                echo "<select name='stat' >
                  <option value='verified'>verified</option>
                  <option value='on The Way'>on the way</option>
                  <option value='out Fro Delivery'>out for delivert</option>
                  <option value='delivered'>delivered</option>
                </select>";
                echo "<input type='hidden' name='stateofp' value='".$state."'>";
                echo "<input type='submit' name='ps_submit' value='submit'>";
                echo "</form>";
              }
              if (isset($_GET["ps_submit"])) 
              {
                $state_p = $_GET["stat"];
                $pstate = $_GET["stateofp"];
                $updt = "UPDATE prescription SET p_status='$state_p' WHERE p_id = '".$pstate."'";
                if (mysqli_query($localconnect,$updt)) 
                {
                  echo "<script>alert('state updated');</script>";
                  echo "<script>window.location.href='admin_manage.php'</script>";
                }
              }
           ?>
            </table>
          </div>
        <div id="ordertbl" class="container-fluid tab-pane fade"><br>
      <h4>All Order</h4>
      <table class="table">
      <?php 
      $date = date("y/m/d");
      $count;
      $odrtable;
      $sltusr = "SELECT * FROM medi_register";
      if ($result4 = mysqli_query($localconnect,$sltusr)) 
      {
          echo "<tr>";
          echo "<td>serial id</td>";
          echo "<td>order id</td>";
          echo "<td>item id</td>";
          echo "<td>name</td>";
          echo "<td>quentity</td>";
          echo "<td>price</td>";
          echo "<td>username</td>";
          echo "<td>delivery date</td>";
          echo "<td>return date</td>";
          echo "<td>status</td>";
          echo "<td>Change</td>";
          echo "</tr>";
          while ($row4 = mysqli_fetch_array($result4)) 
          {
            $user = $row4["email"];
            $odrtable = $row4["order_table"];
            
            $sltodr = "SELECT * FROM $odrtable";
            if ($result5 = mysqli_query($localconnect,$sltodr)) 
            {

              while ($row5 = mysqli_fetch_array($result5)) 
              {
                echo "<tr>";
                echo "<td>".$row5["serialid"]."</td>";
                $sel = $row5["serialid"];
                echo "<td>".$row5["orderid"]."</td>";
                echo "<td>".$row5["iid"]."</td>";
                echo "<td>".$row5["iname"]."</td>";
                echo "<td>".$row5["QTY"]."</td>";
                echo "<td>".$row5["IPRICE"]."</td>";
                echo "<td>".$row5["username"]."</td>";
                echo "<td>".$row5["d_date"]."</td>";
                echo "<td>".$row5["r_date"]."</td>";
                echo "<td>".$row5["status"]."</td>";
                echo "<td><a href='admin_manage.php?change=".$sel."&user=".$user."'>Cahnge</a></td>";
                echo "</tr>";
              }
            }
            else
            {
              echo mysqli_error($localconnect);
            }

          }
        }
        else
        {
          echo mysqli_error($localconnect);
        }
      if (isset($_GET["change"])) 
      {
        $serlid = $_GET["change"];
        $user1 = $_GET["user"];
        echo "<form action='admin_manage.php' method='GET'>";
        echo "Change status";
        echo "<select name='slt'>
          <option value='on the way'>On the way</option>
          <option value='out for delivery'>Out for delivery</option>
          <option value='delivered'>Delivered</option>
          </select>";
          echo "<input type='hidden' value='$user1' name='user1'>";
          echo "<input type='hidden' value='$serlid' name='slid'>";
        echo "<input type='submit' value='submit' name='c_submit'>";
        echo "</form>";
      }
      if (isset($_GET["c_submit"])) 
      {
        $status = $_GET["slt"];
        $user1 = $_GET["user1"];
        $slid = $_GET["slid"];
        $sltuser = "SELECT * FROM medi_register WHERE email='$user1'";
        if ($result6 = mysqli_query($localconnect,$sltuser)) 
        {
          $row6 = mysqli_fetch_array($result6);
          $ordernm = $row6["order_table"];

          if ($status=='delivered') 
          {
            $updt = "UPDATE $ordernm SET status='$status', d_date='$date' WHERE serialid='$slid'";
            if(mysqli_query($localconnect,$updt))
            {
              echo "<script>window.location.href='admin_manage.php';</script>";
            }
          }
          else
          {
            $updt = "UPDATE $ordernm SET status='$status' WHERE serialid='$slid'";
            if(mysqli_query($localconnect,$updt))
            {
              echo "<script>window.location.href='admin_manage.php';</script>";
            } 
          }
        }
      }
   ?>
   </table>
  </div>

    
    </div>
  </div>
</div>
</body>
</html>

 <style>
 body{
  width: 100%;
  padding: 0px;
  margin: 0px;
  color:black;
 }
 </style>
<?php 
}
else
{
  echo "<script>window.location.href='admin.html'</script>";
  // echo mysqli_error($localconnect);
}
 ?>
