<html>
    <head>
        <style>
            table{
                width:60%;
                float:left;
                border-collapse: collapse;
                padding:0px;
                border-color:black;
                margin-top:5%;
                margin-left:10%;
                margin-right:10%;
            }
            td{
                font-style:bolder;
                font-size:30px;
                text-align:center;
                padding:5px;
                
            }
            th{
                padding:8px;
                
            }
        </style>
    </head>
    <body>
<?php

//database credentials 
$host = "localhost";
$user = "root";
$pass = "";
$dataBase ="product";
$table = "product_list";

$con = new mysqli($host,$user,$pass,$dataBase); //initializing the new connection

if(!$con){
    echo "<h1>Database Connection issue! Try to login later.</h1>";
}
else{  
    $productCode = $_POST['p_Code'];
    

    $Qry ="SELECT * FROM `product_list` WHERE `productcode` = '$productCode'";
    
    $getData= mysqli_query($con,$Qry);

    $results = mysqli_fetch_assoc($getData);

    if(($results == null)){
        echo "<h1>Invalid Product code!!! please check again</h1>";      
    }else
    {
        if($results['productcode'] == $productCode)
        {
            echo "
            
            <!DOCTYPE html>
<html>
    <head>
        <title>View Available Stock</title>
        <link rel='stylesheet' href='style.css'>
        
     </head>   
    <body>
        <header>
            <div class='navbar'>
                <a href='#'>Home</a>
                <a href='#'> Customer login/Register</a>
                <a href='#'>Customer Profile</a>
                <a href='#'>Cart</a>
                <a href='#'>Track Order</a>
                <a href='#'>Customer Review</a>
                <a href='#'>Employee login</a>
                <a href='#'>View Stock</a>
                <a href='#'>Update Stock</a>
                <a href='#'>Delivery Person</a>
                 
            </div>
        </header>
    
        <div class='cl1'>
            <div class='cl1_1'>
                <h2>View Available Stock</h2>
            </div>
                <div class='cl3'>
                    <form action='view stock.html'>
                        <fieldset class='p_Details'>
                                <table>
                                    <tr>
                                        <td>Product Code</td>
                                        <td></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                        <td></td>
                                        <td>
                                            <h4>".$results['productcode']."</h4>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        
                                        <td>Product Category</td>
                                        <td></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                        <td></td>
                                        <td>
                                            <h4>".$results['productcategory']."</h4>  
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Product Name</td>
                                        <td></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                        <td></td>
                                        <td>
                                            <h4>".$results['productname']."</h4>
                                        </td>
                                        
                                    </tr>
                                   
                                    <tr>
                                        
                                        <td>Available Quantity</td>
                                        <td></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                        <td></td>
                                        <td>
                                            <h4>".$results['productquantity']."</h4>  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Product Size</td>
                                        <td></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                        <td></td>
                                        <td>
                                            <h4>".$results['productsize']."</h4> 
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Product Price</td>
                                        <td></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                        <td></td>
                                        <td>
                                            <h4>".$results['productprice']." </h4>
                                        </td>
                                        
                                    </tr>
                                </table>
                                <div class='back'><button id='button_back' style='margin-left:90%' href='view stock.html'>Back</button>
                                </div>
                        </fieldset>
                    </form>
                </div>
        </div>
       
        <footer>
            <div>

            </div>
        </footer>
        
    </body>
</html>
            ";
        }else
        {
            echo "<h1>There is an error in the login details provided! please check again</h1>";
        }
    }
    
}

?>
    </table>   
    </body>
</html>