<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
  <h1>Xác thực Email của bạn</h1>
  <form action="./execute-email.php" method="post" class="form">
    <div class="form-group">
      <label for="confirmEmail">Email</label>
      <input type="email" class="form-control" id="confirmEmail" name="confirmEmail">
    </div>
    <div class="btn-confirm">
      <a href="../../index.php" class="cancel">Cancel</a>
      <input type="submit" value="Confirm" class="btn btn-primary" name="confirm">
    </div>
  </form>
</div>
</body>

<style>
  .container {
  max-width: 400px;
  margin: 0 auto;
  text-align: center;
}

h1 {
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="email"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.btn-confirm {
  display: flex;
  justify-content: center;
  align-items: center;
}

.cancel {
  display: inline-block;
  padding: 10px 20px;
  margin-right: 10px;
  background-color: #ccc;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
}

.confirm {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.confirm:hover,
.cancel:hover {
  opacity: 0.8;
}


</style>
</html>