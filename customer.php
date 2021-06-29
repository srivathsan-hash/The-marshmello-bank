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
      
      <?php
        include 'configuration.php';
            $sql = "SELECT * FROM marshmello";
            $result = mysqli_query($conn,$sql);
        ?>
           
        <!-- PHP CONFIG END -->


        <!-- TABLE -->    
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                        <h1>CUSTOMER DETAILS</h1>
                            <table class="table table-hover table-striped">
                                <thead style="color : white;" class="table-secondary">
                                    <tr>
                                        <th scope="col" class="text-center py-2">SerNo</th>
                                        <th scope="col" class="text-center py-2">Name</th>
                                        <th scope="col" class="text-center py-2">E-mail</th>
                                        <th scope="col" class="text-center py-2">Phone Number</th>
                                        <th scope="col" class="text-center py-2">Balance</th>
                                        <th scope="col" class="text-center py-2">Operation</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        while($rows=mysqli_fetch_assoc($result)){
                                    ?>

                                    <tr class="tabdat">
                                        <td class="table-dark"><?php echo $rows['serial no'] ?></td>
                                        <td class="table-dark"><?php echo $rows['Name']?></td>
                                        <td class="table-dark"><?php echo $rows['Email id']?></td>
                                        <td class="table-dark"><?php echo $rows['Phone number']?></td>
                                        <td class="table-dark"><?php echo $rows['Balance']?></td>
                                        <td class="table-dark"><a href="userdetails.php?id= <?php echo $rows['serial no'] ;?>"> <button class="btn btn-outline-danger"><b>Transfer</b></button></a></td> 
                                    </tr>

                                    <?php
                                        }
                                    ?>            
                                </tbody>
                            </table>
                    </div>
                </div>
            </div> 
        </div>  
  
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
