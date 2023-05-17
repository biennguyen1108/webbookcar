<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="" type="" href="/styles/user.css">
    <title>Checkout</title>
</head>
<body>
    <header>
        <?php 
        include "/pages/components/header.php";
        ?>
    </header>
    <form class="form-information" method="post" action="index.php">
        <div class="form-information-group">
            <div class="title">Name <span class="required">*</span></div>
            <input type="text" name="name" class="form-input" value="" placeholder="Please enter your name">
        </div>
        <div class="form-information-group">
            <div class="title">Phone number <span class="required">*</span></div>
            <input type="text" name="phoneNumber" class="form-input" value="" placeholder="Please enter your phone number">
        </div>
        <div class="form-information-group">
            <div class="title">Email to receive trip information <span class="required">*</span></div>
            <input type="text" name="email" class="form-input" value="" placeholder="Please enter your email">
        </div>

        <div class="form-information-group">
            <button type="submit" class="submit" name="submit" value="Submit" onclick = "showInfoCheckout()">Submit</button>
            <button type="reset" class="cancel">Cancel</button>
        </div>
    </form>
    <br>


    <?php

    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];

    include('./assets/connectdb.php');

    
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
        {
            showInfoCheckout();
        }
        function showInfoCheckout () { 
            echo 
            '<form class="form-information-checkout" method="post">
            <div class="checkout-group">
                <div class="title">Vehicle</span></div>
                <input type="text" name="vehicle" class="form-input" value="" readonly>
            </div>
            <div class="checkout-group">
                <div class="title">Driver</div>
                <input type="text" name="driver" class="form-input" value="" readonly>
            </div>
            <div class="checkout-group">
                <div class="title">From</div>
                <input type="text" name="from" class="form-input" value="" readonly>
            </div>
            <div class="checkout-group">
                <div class="title">To</div>
                <input type="text" name="to" class="form-input" value="" readonly>
            </div>
            <div class="checkout-group">
                <div class="title">Date</div>
                <input type="text" name="date" class="form-input" value="" readonly>
            </div>
            <div class="checkout-group">
                <div class="title">Amount</div>
                <input type="text" name="amount" class="form-input" value="" readonly>
            </div>
            <div class="checkout-group">
                <div class="title">Status</div>
                <input type="text" name="status" class="form-input" value="" readonly>
            </div>
            <div class="checkout-group">
                <div class="title">Payment method</div>
                <select name="payment-method" id="payment-method">
                    <option value="Payment on arrival">Payment on arrival</option>
                    <option value="Online payment">Online payment</option>
                </select>        
            </div>

            <div class="checkout-group">
                <input type="submit" class="checkout" name="checkout" value="Checkout">
                <button type="reset" class="cancel">Cancel</button>
            </div>
            </form>';



        }
    ?>
</body>
</html>