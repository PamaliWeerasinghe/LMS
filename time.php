
<div class="row mt-5 mb-5">
            <div class="col-lg-12 offset-lg-8 col-12">
                     <!-- countdown -->
              <?php 

$first_login=$_SESSION["s"]["first_login"];
$strdate=strval($first_login);
$dt = strtotime($strdate);
$endDate= date("Y-m-d H:i:s", strtotime("+1 month", $dt));

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");


$now = new DateTime($date);
$lastDay= new DateTime($endDate);

if($now>$lastDay){
   ?>
   <script>window.location="trialPay.php"</script>
   <?php
}else if($now==$lastDay){
    ?>
    <script>window.location="trialPay.php"</script>
    <?php
}

?>
<label class="form-label fs-5">
    
<script language="JavaScript">
    var x="<?php echo $endDate?>"
    

    //document.write(x);

TargetDate = x;
BackColor = none;
ForeColor = "navy";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
FinishMessage = "end";
</script>
<script language="JavaScript" src="https://rhashemian.github.io/js/countdown.js"></script>
</label>

            </div>
             
                                            
                
        </div>
<script src="countdown.js"></script>