<?php
include("tool/header.php");
include("tool/functions.php");
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
    .top_div {
        font-family: Serif, Arial, Helvetica, sans-serif;
        font-size: 40px;
        font-weight: bold;
        background-color: #008B8B;
        color: white;
        padding-top: 10px;
        padding-right: 30px;
        padding-bottom: 10px;
        padding-left: 30px;
    }
</style>


<div class="top_div">
    <h2>Entry Management System</h2>
</div>
<div class="card " style="width: 50%;margin-left:25%;margin-top:8%;" align='center'>
    <div class="card-body">
        <div class="text-center" id="checkIn" style="margin-top:10%;">
            <button class="btn btn-outline-success my-2 my-sm-0 " type="button" id="checkIn" style="width:50%;">Check In</button>
        </div>
        <div class="container " style="padding-top:10%; padding-left:25%;margin-bottom:10%;">
            <div class="row">
                <div class="form-group col">
                    <input type="text" id="email" class="form-control" placeholder="email" value="">
                </div>
                <div class="form-group col">
                    <div class="row">
                        <div class="col-sm-2 col-sm-offset-3">
                            <button class="btn btn-primary" id="search">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="checkOut1" >
        </div>
        <div class="text-center" id="checkdiv" style="margin-top:-4%;display:none; margin-bottom:10%;">
            <button class="btn btn-outline-success my-2 my-sm-0 " type="button" id="checkOut" style="width:50%;">Check Out</button>
        </div>
    </div>

</div>
<div id="change"></div>
<script type="text/javascript">
   

    $(document).ready(function() {
        $("#checkdiv").hide();
        $("#checkIn").click(function() {
            window.location.href = "checkIn.php";
        });
        $("#search").click(function() {
            $.ajax({
                type: "POST",
                url: "action.php?action=search",
                data: "email="+$("#email").val(),
                success: function(result) {
                    if (result == 1) {
                        $("#checkdiv").show();
                        $("#checkOut").click(function(){
                            $("#checkdiv").hide();
                            $.ajax({
                                type: "POST",
                                url: "action.php?action=checkOut",
                                data: "email="+$("#email").val(),
                                success: function(result) {
                                    if(result==1){
                                        alert('Checked Out');
                                    }
                                    else{
                                        alert('Not sent');
                                    }
                                }
                            })
                        })
                      }else {
                        alert(result);
                    }
                }
            });
        });  
    });
</script>

</body>

</html>