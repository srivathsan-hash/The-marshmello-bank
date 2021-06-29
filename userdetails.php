<?php
    include 'configuration.php';

    if(isset($_POST['submit'])){
        $from = $_GET['id'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];

        $sql = "SELECT * from marshmello where serial no=$from";
        $query = mysqli_query($conn,$sql);
        $sql1 = mysqli_fetch_array($query); 

        $sql = "SELECT * from marshmello where serial no=$to";
        $query = mysqli_query($conn,$sql);
        $sql2 = mysqli_fetch_array($query);

        // Check value entered by user is negative 
        if (($amount)<0)
        {
           
            echo '<script type="text/javascript">';
            echo ' alert("Sorry! Negative values cannot be transferred")';
            echo '</script>';
        }

        // To check insufficient balance.
        else if($amount > $sql1['Balance']) 
        {
            echo '<script type="text/javascript">';
            echo ' alert("Bad Luck! Insufficient Balance")';  
            echo '</script>';
        }
    
        // To check zero values
        else if($amount == 0)
        {
            echo "<script type='text/javascript'>";
            echo "alert('Sorry! Zero value cannot be transferred')";
            echo "</script>";
        }


        else 
        {
            // amount deduction from sender's account
            $newbalance = $sql1['Balance'] - $amount;
            $sql = "UPDATE marshmello set Balance=$newbalance where serial no=$from";
            mysqli_query($conn,$sql);
            
            // adding amount to reciever's account
            $newbalance = $sql2['Balance'] + $amount;
            $sql = "UPDATE marshmello set balance=$newbalance where serial no=$to";
            mysqli_query($conn,$sql);
                
            $sender = $sql1['Name'];
            $receiver = $sql2['Name'];
            $sql = "INSERT INTO `transaction` (`Sender`, `Receiver`, `Amount`) VALUES ('$sender', '$receiver', '$amount')";
            $query = mysqli_query($conn, $sql);
        
            if ($query) {
              echo "<script> alert('Transaction Successful');
                     window.location='Transaction.php';
                     </script>";
            }
        

            $newbalance= 0;
            $amount =0;
        }
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The marshmello bank</title>
    <!--CSS -->

    <link rel="stylesheet"  href="css/style.css">

    <!--BOOTSTRAP CSS-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <!-- GOOGLE FONTS -->
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">

<style>
         table{
                text-align: center;
                border:3px solid black;
                border-collapse: collapse;
                width: 100%;
                height: 90px;
             }

            th{
                border-collapse: collapse;
                border: 2px solid black;
                font-family: 'Oxygen', serif;
                font-weight: 35px;
                font-size: 25px;
                height: 45px;
                width: 60px;
                color: black;
            }
    
             td{
                border-collapse: collapse;
                border: 2px solid white;
                width: 60px;
                height: 45px;
                font-size:20px;
                font-weight: 67px;
                font-family: 'Oxygen', serif;
                background-color: white;
                color: black;
            }
            .tabrow
            {
                background-color: #00ff80;
            }
            .tabdat{
                background-color: black;
                color: white;
                font-weight: bold;
            }
        </style>
</head>
<body>
  <header class="p-3 bg-danger text-white">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            <img src="images/logo.png" class="imagelink" width="180" height="70">
          </a>
    
          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav-pills">
            <li><a href="index.html" class="nav-link active px-2 text-white" aria-current="page">Home</a></li>
            <li><a href="customer.php" class="nav-link px-2 text-dark">Customers</a></li>
            <li><a href="customer.php" class="nav-link px-2 text-dark">Transfer Money</a></li>
            <li><a href="Transaction.php" class="nav-link px-2 text-dark">Transaction History</a></li>
            <li><a href="#" class="nav-link px-2 text-dark">About</a></li>
          </ul>
    
          <div class="col-md-3 text-end">
            <a href="customer.php">
            <button type="button" class="btn btn-outline-info me-2">Transfer</button>
          </a> 
          </div>
        </div>
        </header>
        <div class="marq">
          <marquee direction="left" scrolldelay=1>WELCOME TO THE MARSHMELLO BANK </marquee>
      </div><br>
 <!--Php Config-->
 <?php
        include 'configuration.php';
            $sql = "SELECT * FROM marshmello";
            $result = mysqli_query($conn,$sql);
        ?>
           
        <!-- PHP CONFIG END -->


        <!-- TABLE -->    
           
        <div class="container">
            <br><h1>MAKE A TRANSFER</h1>
                <?php
                    include 'configuration.php';
                    $sid=$_GET['id'];
                    $sql = "SELECT * FROM  marshmello where serial no=$sid";
                    $result=mysqli_query($conn,$sql);
                    if(!$result)
                    {
                        echo "Error : ".$sql."<br>".mysqli_error($conn);
                    }
                    $rows=mysqli_fetch_assoc($result);
                ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
                <div>
                    <table class="table table-striped table-hover">
                        <tr style="color : white;" class="table-secondary">                            
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">E-Mail</th>                            
                            <th scope="col" class="text-center py-2">Balance</th>
                        </tr>
                        
                        <tr style="text-align : center" class="table-dark">                        
                            <td class="table-dark"><?php echo $rows['Name']?></td>
                            <td class="table-dark"><?php echo $rows['Email id']?></td>                        
                            <td class="table-dark"><?php echo $rows['Ealance']?></td>
                        </tr>
                    </table>
                </div>
                <br><br><br>
                <label style="color : white;"><b>Transfer To:</b></label>
                <select name="to" class="form-control" required>
                    <option value="" disabled selected>Choose</option>

                    <?php
                        include 'configuration.php';
                        $sid=$_GET['id'];
                        $sql = "SELECT * FROM marshmello where serial no!=$sid";
                        $result=mysqli_query($conn,$sql);
                        if(!$result)
                        {
                            echo "Error ".$sql."<br>".mysqli_error($conn);
                        }
                        while($rows = mysqli_fetch_assoc($result)) {
                    ?>
            
                    <option class="table" value="<?php echo $rows['serial no'];?>" >
                        <?php echo $rows['Name'] ;?> - Balance: 
                        <?php echo $rows['Balance'] ;?>  
                    </option>

                    <?php 
                        } 
                    ?>
                </select>
                <br>
                        
                <label style="color : white;"><b>Amount:</b></label>
                    <input type="text" class="form-control" name="amount" required>   
                    <br><br>
                <div class="text-center" >
                    <button class="btn btn-outline-warning" name="submit" type="submit" id="myBtn" >Transfer</button>
                </div>
            </form>
        </div>

        <!--Table End-->
<!-- FOOTER -->
<footer class="text-muted py-5">
    <div class="footer">
        <div id="contact">      
          <div class="container">
            <p class="float-end mb-1">
               Contact Me ON: &nbsp;
                <a class="imagelink" href="mailto:srivathsan008@gmail.com" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/1200px-Google_%22G%22_Logo.svg.png" width="40" height="40">
                </a>
               <a class="imagelink" href="https://www.linkedin.com/in/srivathsan-s-486334213/" target="_blank">
                  <img src="images/linkedin.png" width=55 height=50 alt=" linkedin profile link"> 
               </a>
               <a class="imagelink" href="https://github.com/vishnu1881/" target="_blank">
                 <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" width=40 height=40 alt="GitHub profile link">
               </a>
            </p>
            <p class="mb-1"> &copy; 2021</p>
          </div>
        </div>
    </div>
  </footer>
  <!-- FOOTER END -->
</body>
</html>