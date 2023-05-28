<!--Server side code to handle  sign up-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['admin_sup']))
		{
			$ad_fname=$_POST['ad_fname'];
			$ad_lname=$_POST['ad_lname'];
			$ad_email=$_POST['ad_email'];
            $ad_age=$_POST['ad_age'];
            $ad_date_nais=$_POST['ad_date_nais'];
            $ad_telephone=$_POST['ad_telephone'];
            $ad_adress=$_POST['ad_adresse'];
            $ad_cni=$_POST['ad_cni'];
			$ad_pwd=sha1(md5($_POST['ad_pwd']));//double encrypt to increase security
            //sql to insert captured values
			$query="insert into his_admin (ad_fname, ad_lname, ad_email,ad_age,ad_date_nais,ad_telephone,ad_adress,ad_cni, ad_pwd) values(?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssss', $ad_fname, $ad_lname, $ad_email,$ad_date_nais,$ad_age,$ad_telephone, $ad_adress,$ad_cni, $ad_pwd);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Created Account Proceed To Log In";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!--End Server Side-->
<!--End Login-->
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Système d'information de gestion hospitalière - Un système d'information super-réactif</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!--Load Sweet Alert Javascript-->
        <script src="assets/js/swal.js"></script>
        <!--Inject SWAL-->
        <?php if(isset($success)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success","<?php echo $success;?>","success");
                            },
                                100);
                </script>

        <?php } ?>

        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed","<?php echo $err;?>","Failed");
                            },
                                100);
                </script>

        <?php } ?>

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="add_patient.php">
                                        <span><img src="assets/images/logo-dark.png" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Vous n'avez pas de compte ? Créez votre compte, cela prend moins d'une minute</p>
                                </div>

                                <form  method='post'>

                                    <div class="form-group">
                                        <label for="fullname">Prenom</label>
                                        <input class="form-control" type="text"  name = "ad_fname" id="fullname" placeholder="Enter votre prenom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname">Nom</label>
                                        <input class="form-control" type="text" name="ad_lname" id="fullname" placeholder="Entrer votre nom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailaddress">Adresse Email </label>
                                        <input class="form-control" name="ad_email" type="email" id="emailaddress" required placeholder="Entrer votre email">
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input class="form-control" type="text"  name = "ad_age" id="age" placeholder="Entrer votre age" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_nais">Date de Naisssance</label>
                                        <input class="form-control" type="date"  name = "ad_date_nais" id="date_nais" placeholder="Entrer votre date de naissance" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone">Telephone</label>
                                        <input class="form-control" type="text"  name = "telephone" id="telephone" placeholder="Entrer votre numero de telephone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="adresse">Adresse</label>
                                        <input class="form-control" type="text"  name = "adresse" id="adresse" placeholder="Entrer votre adresse" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cni">Numero Carte d'Identite</label>
                                        <input class="form-control" type="text"  name = "cni" id="cni" placeholder="Entrer votre cni" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mot de Passe</label>
                                        <input class="form-control" name="ad_pwd" type="password" required id="password" placeholder="Entrer votre Mot de Passe">
                                    </div>
                                    
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" name="admin_sup" type="submit"> Se connecter </button>
                                    </div>

                                </form>
                                <!--Lets Disable This For We tryna implement it in later versions of this system
                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign up using</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                -->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-white-50">Avez-vous deja un compte?  <a href="index.php" class="text-white ml-1"><b>S'inscrire</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!--Footer-->
            <?php include("assets/inc/footer1.php");?>
        <!-- End Footer-->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>
