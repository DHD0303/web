<!DOCTYPE html>
<html>
    <meta charset="utf-8">
  <head>
      <link href="../css/ourxtu.css" rel="stylesheet" />
  </head>
  <title>我们的湘大</title>
  <body>
    <img src="../picture/123.png" class="next" onclick="next()"/>
    <img src="../picture/book.png" class="book"/>
    <img src="../picture/1.png" class="img1"/>
    <img src="../picture/2.png" class="img2"/>
    <img src="../picture/3.png" class="img3"/>
    <img src="../picture/jingyu.png" class="jingyu"/>
    <img src="../picture/shuimu.png" class="shuimu"/>
    <img src="../picture/star.png" class="star"/>
    <div id="text">
    </div>
    <?php
        $conn = mysqli_connect('localhost', 'root', '1246009411', 'ourxtu');
        if(!$conn) {
            die('连接数据库失败！');
        }
        mysqli_query($conn , "set names utf8");
        $retval = mysqli_query($conn, "SELECT page_view FROM page_view");
        if(!$retval) {
            die('读取数据出错');
        }
        $count = mysqli_fetch_array($retval, MYSQLI_NUM);
        $count[0]++;
        $sql = "UPDATE page_view
                SET page_view = $count[0]";
        mysqli_query($conn, $sql);
        echo "<span>网页访问量: ".$count[0]."</span>";

        echo "<p class=\"hmt\">
        惊艳过我们的这片幽潭，静静蕴育着 她独特的魅力，在湘大浓厚的文化氛围中 独添一份特别的美丽……
        </p>
        <p class=\"sgm\">
        初入湘大，迎接我们的是三拱门，匆匆四年，无数次从他身边走过！
        </p>"
        ;

    ?>
  </body>
  <script src="../js/ourxtu.js"></script>
</html>
