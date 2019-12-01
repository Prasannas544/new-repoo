<!doctype html>
<html>
<title> Check-In </title>

<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/login_signup.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href='lib/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>
    <script src='lib/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
    <script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css">
</head>

<body id="body">
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="#" class="active" id="register-form-link">Enter Visiter Details</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="register-form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" id="visitername" tabindex="1" class="form-control" placeholder="Name" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="visiteremail" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="visiterphoneNo" tabindex="1" class="form-control" placeholder="PhoneNo.">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- host -->
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="#" class="active" id="register-form-link">Enter host Details</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="register-form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" id="hostname" tabindex="1" class="form-control" placeholder="Name" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="hostemail" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="hostphoneNo" tabindex="1" class="form-control" placeholder="PhoneNo.">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="button" id="checkIn" tabindex="4" class="form-control btn btn-register" value="Check In">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-danger loginAlert" style="display:none;"></div>
    <script type="text/javascript">
        $("#checkIn").click(function() {
            $.ajax({
                type: "POST",
                url: "action.php?action=checkIn",
                data: "visiteremail=" + $("#visiteremail").val() + "&visitername=" +
                    $("#visitername").val() + "&visiterphoneNo=" +$("#visiterphoneNo").val()+"&hostemail=" + $("#hostemail").val() + "&hostname=" +
                    $("#hostname").val() + "&hostphoneNo=" +$("#hostphoneNo").val() ,
                success: function(result) {
                    if (result == 1) {
                        alert('checkedIn..');
                        window.location.href = "index.php";
                    } else {
                        alert(result);
                    }
                }
            })
        })
    </script>
    <script>
        $(function() {
            $('.dates #startDate').datepicker({
                'format': 'yyyy-mm-dd',
                'autoclose': true
            });
        });
    </script>
</body>

</html>