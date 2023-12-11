<?php
session_start();
include "connection1.php";
if(!isset($_SESSION["username"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
} 
?> 

<?php
echo "<html>","<img src='certi.jpg' width='1450' height='730' title='certificate of completion' alt='error' />","</html>";
?>

    <?php

       /* $res=mysqli_query($link,"select* from exam_result where username='$_SESSION[username]' order by id desc");
        $count=mysqli_num_rows($res);

        while($row=mysqli_fetch_array($res))
        {
            header('content-type:image/jpeg');
            $font=realpath('arial.ttf');
            $image=imagecreatefromjpeg("certi.jpg");
            $color=imagecolorallocate($image, 51, 51, 102);
            $date=date('d F, Y');
            imagettftext($image,18,0,220,220,$color,$font,$date);
            $name=$row["username"];
            imagettftext($image,48,0,120,520,$color,$font,$name);   
            imagejpeg($image);
            imagedestroy($image);
        } */


    ?>

       
       