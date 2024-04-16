<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tìm kiếm</title>
    <link href="images/logo1.png" rel="icon" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- 
    <link rel="stylesheet" href="css/search.css">-->
    <link rel="stylesheet" href="css/listsave.css">
    <link rel="stylesheet" href="css/guest.scss">
    <link rel="stylesheet" href="css/reset.scss">
    <link rel="stylesheet" href="css/global.scss">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.scss">
    <link rel="stylesheet" href="css/header.css"> 
    <link rel="stylesheet" href="css/hostel.scss">
    <link rel="stylesheet" href="css/listsave.css">
    <script> src="js/main.js" </script>
</head>
<body>
  <?php include 'header.php' ?>

  <div id="main-body">
    <div class="main-content">
      <div class="container">
        <div class="module module-saved">
          <div class="module-header">
            <form id="sidebar" >
              <div class="the-loai">
                <table class="type ">
                  <tr>
                      <th colspan="2" >TÌM KIẾM THEO LOẠI HÌNH</th>
                  </tr>

                  <tr class="first-row"> 
                      <td >
                        <label>
                          <input type="radio" name="loai-hinh" value="Phòng trọ"<?php if (isset($_GET['type'])) if ($_GET['type'] == 'Phòng trọ') echo 'checked' ?>>
                          <span class="checkmark"></span>
                            Phòng trọ
                        </label> 
                      </td>
                      <td class="last">
                        <label>
                          <input type="radio" name="loai-hinh" value="Nhà nguyên căn"<?php if (isset($_GET['type'])) if ($_GET['type'] == 'Nhà nguyên căn') echo 'checked' ?>>
                          <span class="checkmark"></span>
                            Nhà nguyên căn
                        </label>
                      </td>
                  </tr>
                  <tr class="last-row">
                      <td >
                        <label>
                          <input type="radio" name="loai-hinh" value="Trọ ghép"<?php if (isset($_GET['type'])) if ($_GET['type'] == 'Trọ ghép') echo 'checked' ?>>
                          <span class="checkmark"></span>
                            Trọ ghép
                        </label> 
                      </td>
                      <td class="last">
                        <label>
                          <input type="radio" name="loai-hinh" value="all" <?php if (isset($_GET['type'])) if ($_GET['type'] == 'all') echo 'checked' ?>>
                          <span class="checkmark"></span>
                            Tùy chọn
                        </label>
                      </td>
                  </tr>
              </table>
              </div>
    
              <div><button type="submit">TÌM KIẾM </button></div>
              
            </form>
          </div>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
          <script src="https://web8802.com/wp-content/themes/hienads/assets/js/quanhuyen.js"></script>
      

            <script>
              document.getElementById("sidebar").addEventListener("submit", function(event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của form (tải lại trang)

                // Lấy dữ liệu từ bảng
                var tableData = getTableData();

                // Gửi dữ liệu lên server hoặc thực hiện xử lý khác
                sendData(tableData);
              });

              function getTableData() {
                var table = document.getElementById("sidebar");
                var rows = table.getElementsByTagName("tr");
                var data = [];

                for (var i = 0; i < rows.length; i++) {
                  var row = rows[i];
                  var rowData = [];

                  var cells = row.getElementsByTagName("td");
                  for (var j = 0; j < cells.length; j++) {
                    var cell = cells[j];
                    // Lấy giá trị từ ô input, select hoặc phần tử khác
                    var value = cell.querySelector('input[type="radio"]:checked');
                    if (value) {
                      var radioValue = value.value;

                      rowData.push(radioValue);
                      break;
                    }
                    value = cell.querySelector('select');
                    if ( value ) {
                      rowData.push(value.value);
                    }
                    
                  }

                  data.push(rowData);
                }

                return data;
              }

              function sendData(data) {
                console.log(data);
                var link = "";
                for (var i = 0; i < data.length; ++i) {
                    
                    if ( i < 6 && data[i][0] != null && data[i].length != 2) {
                      $type = data[i][0];
                      link += "&type=";
                      link += encodeURIComponent($type);
                    }
                  }
                //window.onload.hr
                if ( link.charAt(0) == "&" ) link = link.substring(1);
                console.log(data); // In dữ liệu ra console để kiểm tra

                var url = new URL(window.location.href);
                var user_id = url.searchParams.get("user_id"); 

                link = "search.php?" + link;
                if ( user_id != null ) {
                  link += "&user_id=";
                  link +=user_id;
                }
                console.log(link);
                 window.location.href = link;
              }
          </script>
          
          <?php 
            $list_id = [];
            $count = 0;
            $type = "all";       
            if ( isset($_GET['type'] )) {$type = $_GET['type'];}
            //echo $price.' '.$right1;   
            $conn = new mysqli("localhost", "root", "", "room_rent");
            $sql = "SELECT * FROM room_info" ;
            $result = $conn->query($sql);

            while ($row = $result->fetch_array()) {
                if ($type == $row['type']) {$list_id[++$count] = $row['room_id'];}
            }
            
            $list_id = array_unique($list_id);
            //print_r($list_id);
            $list_id = array_values($list_id);
            $count = count($list_id);
           
            for ($ii = 0 ; $ii < $count; ++$ii) {
              //echo $list_id[$ii].' ';
            }
              // echo $count.' '.$city.' '.$district.' '.$type.' '.$price.'<br/>';
            
            $load_link = "";
            if (isset($_GET['user_id'])) {
              $load_link = "&user_id=";
              $load_link .= $_GET['user_id'];
            }

            $page = 0;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $left = ($page - 1) * 10 ;
            $right = $left + 9;
            $curPage = ceil($count/10);
            //$count--;
            
            $next_link = $_SERVER['QUERY_STRING'];
            if (isset($_GET['page'])) $next_link = substr($next_link, 7);
            //echo $next_link;
          ?>

          <div class="module-header">
              Có <?php echo $count ?> kết quả
          </div>
          <div class="module-content hostel hostel-list">	       
      <?php
          if (isset($_GET['user_id'])) {
            $link_url = "&user_id=";
            $link_url .= $_GET['user_id'];
            //echo $link_url;
          }
          for ($u = $left; $u <= min($right,$count - 1) ; ++$u) {
                  
                  $room_id = $list_id[$u];
                  $sql = "SELECT *, i.image FROM room_info r
                          LEFT JOIN image_vid i
                          ON i.room_id = r.room_id
                          WHERE r.room_id = $room_id";
                  $res = $conn->query($sql);
                  $row = $res->fetch_assoc(); 

                  $image_url = $row["image"];
                  $list_image = [];
                  $dem = 0;

                  $image_url .= " ";
                  $image = "";
                  for ($i = 0 ; $i < strlen($image_url); ++$i) {
                    if ( substr($image, -4) == ".jpg" || ($image_url[$i] == " " && substr($image, -4) != ".jpg") ) {
                          $list_image[++$dem] = $image;
                          $image = "";
                          }
                      else {
                          $image .= $image_url[$i];
                      }
                  }
      ?>   
                          <div class="item hot column" title="<?php echo $row['title'] ?>">
                              <div class="border">
                                  <div class="image">	
                                      <a href="chitietphong.php?name=<?php echo $row['room_id'].$load_link ?>" 
                            
                                      style="background-image:url('<?php echo $list_image[1] ?>')">
                                        
                                      </a>
                                  </div>

                                  <div class="info col">
                                      <div class="star">
                                          <span class="local">
                                              <a href="chitietphong.php?name=<?php echo $row['room_id'].$load_link ?>">
                                                  <?php echo $row['city'] ?>
                                              </a>							
                                          </span>
                                      </div>
                                      <h4 class="title hot">
                                          <a href="chitietphong.php?name=<?php echo $row['room_id'].$load_link ?>">
                                          <?php echo $row['title'] ?>					
                                          </a>
                                      </h4>
                                      <div class="location-area ">
                                          <dl class="address">
                                              <dt> <?php echo $row['address'] ?> </dt>
                                          </dl>
                                      </div>
                                      <dl class="contact">
                                          <div class="price">
                                              Khoảng <?php echo $row['price'] ?> triệu VNĐ/tháng
                                          </div>
                                          <span class="published">
                                              <?php echo $row['last_update'] ?>
                                          </span>
                                      </dl>
                                  </div>
                              </div>										                
                          </div>     
      <?php
          }
      ?>                  <div class="paginator">
                              <ul class="pagination">
                                  <?php   
                                      if ( $page == 1 ) {
                                          ?><li class="disabled">
                                              <span>«</span>
                                          </li><?php
                                      } else {
                                          ?><li> 
                                              <a href="search.php?page=<?php $pre=$page-1; echo $pre.'&'.$next_link ?>">
                                              «
                                              </a>
                                          </li><?php
                                      }

                                      for ($i = max($page-2,1) ; $i<$page; ++$i) { 
                                          ?><li> 
                                              <a href="search.php?page=<?php echo $i.'&'.$next_link ?>">
                                                  <?php echo $i ?>
                                              </a>
                                          </li><?php
                                      }

                                          ?><li class="active" >
                                              <span><?php echo $page ?></span>
                                          </li><?php

                                      for ($i = $page+1 ; $i<=$curPage; ++$i) { 
                                          ?><li> 
                                              <a href="search.php?page=<?php echo $i.'&'.$next_link ?>">
                                                  <?php echo $i ?>
                                              </a>
                                          </li><?php
                                      } 
                                      if ( $page == $curPage ) {
                                          ?><li class="disabled">
                                              <span>»</span>
                                          </li><?php
                                      } else {
                                          ?><li> 
                                              <a href="search.php?page=<?php $pos=$page+1; echo $pos.'&'.$next_link ?>">
                                              »
                                              </a>
                                          </li><?php
                                      } 
                                  ?> 
                              </ul>											
                          </div>
                      </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>