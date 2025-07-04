<?php
session_start();
include "header.php";
include "../connection.php";
if(!isset($_SESSION["admin"])){
    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
$id=$_GET["id"];
$exam_category='';
$res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
while($row=mysqli_fetch_array($res)){
    $exam_category=$row["category"];
}

?>

        

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Add Questions inside <?php echo "<font color='red'>" .$exam_category. "</font>"?></h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form name="form1" action="" method="post" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-header"><strong>Add New Questions With Text</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Question</label>
                                                <input type="text" name="question" placeholder="Add question" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 1</label>
                                                <input type="text" name="opt1" placeholder="Add opt1" class="form-control" style="padding-bottom:45px">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 2</label>
                                                <input type="text" name="opt2" placeholder="Add opt2" class="form-control" style="padding-bottom:45px">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 3</label>
                                                <input type="text" name="opt3" placeholder="Add opt3" class="form-control" style="padding-bottom:45px">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 4</label>
                                                <input type="text" name="opt4" placeholder="Add opt4" class="form-control" style="padding-bottom:45px">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Answer</label>
                                                <input type="text" name="answer" placeholder="Add answer" class="form-control" style="padding-bottom:45px">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Add Question" class="btn btn-success">
                                            </div>       
                                        </div>
                                    </div> 
                                
                            </div>

                            <div class="col-lg-6">
                                
                                    <div class="card">
                                        <div class="card-header"><strong>Add New Questions With Images</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Question</label>
                                                <input type="text" name="fquestion" placeholder="Add question" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 1</label>
                                                <input type="file" name="fopt1" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 2</label>
                                                <input type="file" name="fopt2" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 3</label>
                                                <input type="file" name="fopt3" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 4</label>
                                                <input type="file" name="fopt4" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Answer</label>
                                                <input type="file" name="fanswer" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit2" value="Add Question" class="btn btn-success">
                                            </div>       
                                        </div>
                                    </div> 
                                </form>
                            </div>
                        </div> <!-- row ends -->
                    </div> <!-- card-body ends -->
                </div> <!-- card ends -->
            </div> <!-- col-lg-12 ends -->
        </div> <!-- row ends -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Questions</th>
                                <th>Opt1</th>
                                <th>Opt2</th>
                                <th>Opt3</th>
                                <th>Opt4</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        
                        <?php
                            $res=mysqli_query($link,"SELECT * FROM quiz WHERE category='$exam_category' order by question_no asc");
                            while($row=mysqli_fetch_array($res)){
                                    echo "<tr>";
                                    echo "<td>"; echo $row["question_no"];  echo "</td>";
                                    echo "<td>"; echo $row["ques"];  echo "</td>";
                                    echo "<td>"; 
                                        if(strpos($row["op1"],'./opt_images/')!=false){
                                            ?>
                                            <img <?php echo $row["op1"]; ?> height="50" width="50">
                                            <?php
                                        }
                                        else{
                                            echo $row["op1"];
                                        }
                                    echo "</td>";
                                    echo "<td>"; 
                                        if(strpos($row["op2"],'opt_images/')!=false){
                                            ?>
                                            <img src="<?php echo $row["op2"]; ?>" height="50" width="50">
                                            <?php
                                        }
                                        else{
                                            echo $row["op2"];
                                        }
                                    echo "</td>";
                                    echo "<td>"; 
                                        if(strpos($row["op3"],'opt_images/')!=false){
                                            ?>
                                            <img src="<?php echo $row["op3"]; ?>" height="50" width="50">
                                            <?php
                                        }
                                        else{
                                            echo $row["op3"];
                                        }
                                    echo "</td>";
                                    echo "<td>"; 
                                        if(strpos($row["op4"],'opt_images/')!=false){
                                            ?>
                                            <img src="<?php echo $row["op4"]; ?>" height="50" width="50">
                                            <?php
                                        }
                                        else{
                                            echo $row["op4"];
                                        }
                                    echo "</td>";

                                    echo "<td>"; 
                                    if(strpos($row["op4"],'opt_images/')!=false){
                                        ?>
                                        <a href="edit_options_images.php?id=<?php echo $row["id"]; ?> &id1=<?php echo $id; ?>">Edit</a>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <a href="edit_options.php?id=<?php echo $row["id"]; ?> &id1=<?php echo $id; ?>">Edit</a>
                                        <?php
                                    }
                                    echo "</td>";
                                    
                                    echo "<td>";
                                        ?>
                                            <a href="delete_options.php?id=<?php echo $row["id"];?> &id1=<?php echo $id; ?>">Delete</a>
                                        <?php
                                    echo "</td>";

                                    echo "</tr>";
                            }
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<?php
if(isset($_POST["submit1"])){
    $lop=0;
    $count=0;
    $res=mysqli_query($link,"SELECT * FROM quiz WHERE category='$exam_category' order by id asc") or die(mysqli_error($link));
    $count=mysqli_num_rows($res);

    if($count==0){

    }
    else{
        while($row=mysqli_fetch_array($res)){
            $loop=$loop+1;
            mysqli_query($link,"UPDATE quiz SET question_no='$loop' WHERE id=$row[id]");

        }
    }

    $loop=$loop+1;
    mysqli_query($link,"INSERT INTO quiz VALUES(NULL,'$exam_category','$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]')") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        alert("question added successfully")
        window.location.href=window.location.href;
    </script>
    <?php
}
?>


<?php
if(isset($_POST["submit2"])){
    $lop=0;
    $count=0;
    $res=mysqli_query($link,"SELECT * FROM quiz WHERE category='$exam_category' order by id asc") or die(mysqli_error($link));
    $count=mysqli_num_rows($res);

    if($count==0){

    }
    else{
        while($row=mysqli_fetch_array($res)){
            $loop=$loop+1;
            mysqli_query($link,"UPDATE quiz SET question_no='$loop' WHERE id=$row[id]");

        }
    }

    $loop=$loop+1;

    $tm=md5(time());
    $fnm1=$_FILES["fopt1"]["name"];
    $dst1="./opt_images/".$tm.$fnm1;
    $dst_db1="opt_images/".$tm.$fnm1;
    move_uploaded_file($_FILES["fopt1"]["tmp_name"],$dst1);

    $tm=md5(time());
    $fnm2=$_FILES["fopt2"]["name"];
    $dst2="./opt_images/".$tm.$fnm2;
    $dst_db2="opt_images/".$tm.$fnm2;
    move_uploaded_file($_FILES["fopt2"]["tmp_name"],$dst2);

    $tm=md5(time());
    $fnm3=$_FILES["fopt3"]["name"];
    $dst3="./opt_images/".$tm.$fnm3;
    $dst_db3="opt_images/".$tm.$fnm3;
    move_uploaded_file($_FILES["fopt3"]["tmp_name"],$dst3);

    $tm=md5(time());
    $fnm4=$_FILES["fopt4"]["name"];
    $dst4="./opt_images/".$tm.$fnm4;
    $dst_db4="opt_images/".$tm.$fnm4;
    move_uploaded_file($_FILES["fopt4"]["tmp_name"],$dst4);

    $tm=md5(time());
    $fnm5=$_FILES["fanswer"]["name"];
    $dst5="./opt_images/".$tm.$fnm5;
    $dst_db5="opt_images/".$tm.$fnm5;
    move_uploaded_file($_FILES["fanswer"]["tmp_name"],$dst5);

    mysqli_query($link,"INSERT INTO quiz VALUES(NULL,'$exam_category','$loop','$_POST[fquestion]','$dst_db1','$dst_db2','$dst_db3','$dst_db4','$dst_db5')") or die(mysqli_error($link));
    ?>
    <script type="text/javascript">
        alert("question added successfully")
        window.location.href=window.location.href;
    </script>
    <?php
}
?>
                                    

<?php
include "footer.php";
?>
