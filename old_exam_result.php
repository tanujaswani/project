<?php
session_start();
include "header.php";
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

        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;">
                <center>
                <b><u><h1>Old Exam Results</h1></u></b>
                </center>

                <?php
                    $count=0;
                    $res=mysqli_query($link,"select* from exam_result where username='$_SESSION[username]' order by id desc");
                    $count=mysqli_num_rows($res);

                    if($count==0)
                    {
                        ?>
                         <center>
                         <h1>No Results Found</h1>
                         </center>

                        <?php
                    }
                    else
                    {
                        echo "<table class='table table-bordered'>";

                         echo "<tr style='background-color: #006df0; color:white; '>";
                         echo "<th>"; echo "Username"; echo "</th>";
                         echo "<th>"; echo "Exam Type"; echo "</th>";
                         echo "<th>"; echo "Total Questions"; echo "</th>";
                         echo "<th>"; echo "Correct Answers"; echo "</th>";
                         echo "<th>"; echo "Wrong Answers"; echo "</th>";
                         echo "<th>"; echo "Exam Time"; echo "</th>";
                         echo "<th>"; echo "Score"; echo "</th>";
                         echo "</tr>";

                         while($row=mysqli_fetch_array($res))
                         {
                             echo "<tr>";
                             echo "<td>"; echo $row["username"]; echo "</td>";
                             echo "<td>"; echo $row["exam_type"]; echo "</td>";
                             echo "<td>"; echo $row["total_questions"]; echo "</td>";
                             echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                             echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
                             echo "<td>"; echo $row["exam_time"]; echo "</td>";
                             echo "<td>"; echo $row["correct_answer"]; echo "</td>";
                             echo "</tr>";
                         }

                        echo "</table>";

                    }

                ?>

                   <?php
                    $count=0; $total_score=0;
                    $res=mysqli_query($link,"select* from exam_result where username='$_SESSION[username]' order by id desc");
                    $count=mysqli_num_rows($res);

                     while($row=mysqli_fetch_array($res))
                    {
                        $total_score = $total_score + $row["correct_answer"];

                    }
                    
                    echo "<h3>","<b>","YOUR TOTAL SCORE IS : ",$total_score,"</b>","</h3>";

                    if($total_score <= 5)
                    {
                        echo "OOPS!!,YOU FAILED. CERTIFICATE NOT AVAILABLE!";
                    }
                    else
                    {
                        echo "You Have Passed The Exam Successfully!!";
                        echo "</br>";
                        echo "<h3>","<b>","<u>","<a href='certificate.php'> GET CERTIFICATE</a>","</u>","</b>","<h3>";
                    }

                   ?> 



            </div>
                
        </div>

<?php
include "footer.php";

?>    



       