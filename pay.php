<!DOCTYPE html>
<?php
session_start();
$total = $_SESSION['total'];
$usname = $_SESSION['usname'];
$var_1 =  "Rs ";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/paystyle.css">

</head>
<body>

<div class="container">

    <form action="paydb.php" method="POST">

        <div class="row">

            <div class="col">

                <div class="inputBox">
                    <span>Cutomer_ID :</span>
                    <input type="text" id="costomerID" name="cid" value=<?php echo $usname ?> readonly>
                </div>

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span >full name :</span>
                    <input id="name" type="text"  name="name">
                </div>
                <div class="inputBox">
                    <span >email :</span>
                    <input id="mail" type="email" placeholder="example@example.com" name="mail" required>
                </div>
                <div class="inputBox">
                    <span >address :</span>
                    <input id="address" type="text"  name="address">
                </div>
                <div class="inputBox">
                    <span >city :</span>
                    <input id="city" type="text" name="city">
                </div>
               
                <div class="flex">
                    <div class="inputBox">
                        <span >Telephone Number :</span>
                        <input id="number" type="number" placeholder="07x xxxxxxx" name="tnumber">
                    </div>
    

                </div>

            </div>

            <div class="col">

                <div class="inputBox">
                    <span>Total_Amount:</span>
                    <input type="text" id="TA" name="ta" value=<?php echo $total ?> readonly>
                </div>

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted </span>
                    <img src="images/card.png" alt="">
                </div>
                
                <div class="inputBox">
                    <span >name on card :</span>
                    <input id="noc" type="text" placeholder="mr. john deo">
                </div>
                <div class="inputBox">
                    <span >credit card number :</span>
                    <input id="ccn" type="number" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span >exp month :</span>
                    <input id="em" type="text" placeholder="january">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span >exp year :</span>
                        <input id="ey" type="number" placeholder="2022">
                    </div>
                    <div class="inputBox">
                        <span >CVV :</span>
                        <input id="cvv" type="number" placeholder="1234">
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn" onclick="pay()">

    </form>

</div>  

<script>
    function pay(){
        var cID=document.getElementById("costomerID").value;
        var totalAmount=document.getElementById("TA").value;

        var name=document.getElementById("name").value;
        var mail=document.getElementById("mail").value;
        var address=document.getElementById("address").value;
        var city=document.getElementById("city").value;
        var number=document.getElementById("number").value;
        var noc=document.getElementById("noc").value;
        var ccn=document.getElementById("ccn").value;
        var em=document.getElementById("em").value;
        var ey=document.getElementById("ey").value;
        var cvv=document.getElementById("cvv").value;

        if(name==null|| mail ==""|| mail==null|| address==""||address==null ||city ==""|| city==null ||
        number==""||number==null||noc==""|| noc==null||ccn==""||ccn==null|| em==""|| em==null|| ey==""|| ey==null||cvv==""||cvv==null){

          alert("All the details should be filled");
        }else{
            alert("Thank you!, Your payment is successful");
        }  
        
        
    }
</script>
    
</body>
</html>