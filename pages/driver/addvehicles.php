<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phương tiện</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../styles/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../styles/dist/css/adminlte.min.css">

</head>
<body>
<section class="content" style="width:600px;height:100vh;margin-left:350px">
  <div class="container-fluid">
    <div class="row">   
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h1 class="card-title" style="margin-left: 200px;"></h1>
          </div>
         
          <form id="quickForm" method="post" action="../../assets/xulythemxe.php" enctype="multipart/form-data">
          <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputname1">name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputvehicles_type1">vehicles_type</label>
                    <input type="text" name="vehicle_type" class="form-control" id="vehicle_type" placeholder="enter vehicle_type">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputimage1">image</label>
                    <input type="file" name="image" class="form-control" id="image" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcapacity1">capacity</label>
                    <input type="text" name="capacity" class="form-control" id="capacity" placeholder="enter capacity">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputseat1">seat</label>
                    <input type="text" name="seat" class="form-control" id="seat" placeholder="enter seat">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputdescription1">description</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="enter description">
                  </div>            
             
            </div>  
         
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
     
        </div>
     
      <div class="col-md-6">

      </div>
      
    </div>
   
  </div>
</section>        
</div>

</body>
</html>

