<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Session3</title>
    <style>
        .title {
            text-align: center;
            padding: 30px;
        }

        .session3 {
            background-color: darkgrey;
            width: 100%;
            height: 800px;
        }

        .productcar {
            margin-top: -50px;
            margin-left: 12px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* chia làm 2 cột */
            grid-column-gap: 20px;
            /* khoảng cách giữa các cột */
            grid-row-gap: 20px;
            /* khoảng cách giữa các hàng cột */
            grid-gap: 15px;
        }

        .mainproduct {
            height: 80%;
            width: 80%;
        }

        .card {
            height: 500px;
        }

        .col-12 {
            margin-left: 30px;
        }
        .col-lg-6{
            width: 600px;
        }
        .detail button{
            width: 100%;
        }
        .border-0{
            border-radius: 5px;
            
        }
        .detail button{
          
            color:black;
        }
    </style>
</head>

<body>
    <?php
    $car = array();
    $car[0]["tensp"] = "Mercedec hàng mới xuất hiện với diện mạo mới sang trọng lịch lãm";
    $car[0]["giasp"] = "250000";
    $car[0]["motasp"] = "Mercedec Benz là dòng xe Mercedec được ưa chuộng  nhất hiện nay.";
    $car[0]["hinhanhsp"] = "https://files01.danhgiaxe.com/FOaFwe79scmckEaDOfUFk-HaJy4=/fit-in/1200x0/20210131/danhgiaxe.com-mercedes-benz-2021-2-170739.jpg";

    $car[1]["tensp"] = "BMW hàng mới xuất hiện với diện mạo mới sang trọng lịch lãm";
    $car[1]["giasp"] = "30";
    $car[1]["motasp"] = "BMW 7 là dòng xe BMW được ưa chuộng  nhất hiện nay.";
    $car[1]["hinhanhsp"] = "https://giaxehoi.vn/uploads/Xe/BMW/7-Series/2023/xe-bmw-7-series-2023-giaxehoi-vn-8-660x440.jpg";

    $car[2]["tensp"] = "Range Rover hàng mới xuất hiện với diện mạo mới sang trọng lịch lãm";
    $car[2]["giasp"] = "40";
    $car[2]["motasp"] = "Range Rover là dòng xe BMW được ưa chuộng  nhất hiện nay.";
    $car[2]["hinhanhsp"] = "https://cdn-img.thethao247.vn/upload/thanh96/2020/05/07/range-rover.jpg";

    $car[3]["tensp"] = "BMW i8 hàng mới xuất hiện với diện mạo mới sang trọng lịch lãm";
    $car[3]["giasp"] = "50";
    $car[3]["motasp"] = "BMW i8 là dòng xe BMW 2 cánh được ưa chuộng  nhất hiện nay.";
    $car[3]["hinhanhsp"] = "https://tapchisieuxe.com/wp-content/uploads/2022/12/2-10.jpg";

    $car[4]["tensp"] = "Toyota Voxy 2023 hàng mới xuất hiện với diện mạo mới sang trọng lịch lãm";
    $car[4]["giasp"] = "50";
    $car[4]["motasp"] = "Toyota là dòng xe được ưa chuộng  nhất hiện nay, phù hợp đi gặp đồng nghiệp ....";
    $car[4]["hinhanhsp"] = "https://muaxegiatot.vn/wp-content/uploads/2022/03/danh-gia-xe-toyota-voxy-2022-chinh-thuc-ra-mat-indonesia-gia-ban-tuong-doi-re-640x418.jpg";

    $car[5]["tensp"] = "Toyota Voxy 2023 hàng mới xuất hiện với diện mạo mới sang trọng lịch lãm";
    $car[5]["giasp"] = "50";
    $car[5]["motasp"] = "Toyota là dòng xe được ưa chuộng  nhất hiện nay, phù hợp đi gặp đồng nghiệp ....";
    $car[5]["hinhanhsp"] = "https://media-cdn-v2.laodong.vn/storage/newsportal/2022/3/2/1019277/20210419_01_01_W610_.jpeg";
    ?>
    <div class="session3">
        <div class="title"><b>
                <h2>LASTEST NEWS</h2>
            </b>
        </div>

        <br>
        <br>
        <div class="productcar">
            <div class="mainproduct">
                <?php
                $n = count($car);
                for ($i = 0; $i < $n; $i++) {
                    if ($i < 1) {
                ?>
                        <div class=" col-12 ">
                            <div class="card product p-2" styte="width:auto">
                                <img class="card-img-top" src="<?php echo $car[$i]["hinhanhsp"] ?>" height="250px" alt="">
                                <br>
                                <br>
                                <div class="card-title product-title text-center h5"><?php echo $car[$i]["tensp"] ?></div>
                                <div class="price text-center h6"><?php echo $car[$i]["motasp"] ?></div>
                                <br>
                                <br>
                                <center>
                                    <a class="detail" href="detail.php? detail=<?php echo $i; ?>" style="width:200px; height:60px; ">
                                        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Xem chi tiết</button>
                                    </a>
                                </center>
                                <br>
                                
                            </div>
                        </div>
                <?php
                    }
                }


                ?>
            </div>
            <div class="listproduct">
<?php
 for ($i = 1; $i < $n; $i++) {
  
?>
                <div class="col-lg-6">
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid rounded" src="<?php echo $car[$i]["hinhanhsp"] ?>" alt="" style="width: 150px">
                        <div class="w-100 d-flex flex-column text-start ps-4">
                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                
                                <div><span><?php echo $car[$i]["tensp"] ?></span></div>
                                <div class="d-flex mb-3 justify-content-evenly">
                                    
                                    <button  class="border-0 ml-2 bg-success">
                                        <span>Detail</span>
                                    </button>
                                </div>
                            </h5><small class="fst-italic"><?php echo $car[$i]["motasp"] ?></small>
                        </div>
                    </div>
                </div>
               
                <br>
                <?php
 }
 ?>
            </div>
        </div>
    </div>


</body>

</html>