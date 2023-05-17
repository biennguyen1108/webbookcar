<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
    <style>
        body{
            font-family: arial;
            font-size: 16px;
            margin: 0;
            background: #fff;
            color: #000;
            display: flex;
            align-items: center ;
            justify-content: space-around;
            min-height: 100vh;

        }
        .form-container{
            width: 100%;
            max-width: 650px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            color: #333333;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            background: #fff;

        }
        .input-row{
            margin-bottom: 10px;
        }
        .input-row input{
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            width: 95%;
            border-radius: 3px;
            outline: 0;
            margin-bottom: 3px;
            font-size: 18px;
            font-family: arial;
        }
        .inout-row button[type="submit"]{
            width:  100px;
            display: block;
            margin: 0 auto;
            color: #fff;
            cursor: pointer;
            border: none;
            background: #ff5e14;
        }

    </style>
</head>

<body>
  
    
    <div class="form-container">
    <form action="submit_comment.php" name ="emailContact"class="" method="post">
        <div class="input-row">
        Name<em>*</em> <input  type="text" name="name" value="" required>
        </div>
        <br>
        <div class="input-row">
        Email <em>*</em><input  type="email" name="email" value="" required>
        </div>
        <br>
       
        <div class="input-row">
        Message <em>*</em><input type="text" name="comment" value="" required>
        </div><br>
        <div class="input-row">
        <button type="submit" name="save" style="background-color:#ff5e14; border:none;width:50px;height:50px">Send</button>
        </div>
    </form>
    </div>
</body>

</html>