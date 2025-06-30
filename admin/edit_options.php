<?php
include "header.php";
include "../connection.php";
$id = $_GET["id"];
$id1=$_GET["id1"];

// Initialize variables
$question = "";
$opt1 = "";
$opt2 = "";
$opt3 = "";
$opt4 = "";
$answer = "";

// Execute the query
$res = mysqli_query($link, "SELECT * FROM quiz WHERE id=$id") or die(mysqli_error($link));

// Fetch the results
while ($row = mysqli_fetch_array($res)) {
    $question = $row["ques"];
    $opt1 = $row["op1"];
    $opt2 = $row["op2"];
    $opt3 = $row["op3"];
    $opt4 = $row["op4"];
    $answer = $row["answer"];
}
?>


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Question</h1>
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
                                
                            <div class="col-lg-6">
                                <form name="form1" action="" method="post" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-header"><strong>Update Questions With Text</strong></div>
                                        <div class="card-body card-block">
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Question</label>
                                                <input type="text" name="question" placeholder="Add question" class="form-control" value="<?php echo $question; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 1</label>
                                                <input type="text" name="opt1" placeholder="Add opt1" class="form-control" style="padding-bottom:45px"value="<?php echo $opt1; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 2</label>
                                                <input type="text" name="opt2" placeholder="Add opt2" class="form-control" style="padding-bottom:45px" value="<?php echo $opt2; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 3</label>
                                                <input type="text" name="opt3" placeholder="Add opt3" class="form-control" style="padding-bottom:45px" value="<?php echo $opt3; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Opt 4</label>
                                                <input type="text" name="opt4" placeholder="Add opt4" class="form-control" style="padding-bottom:45px" value="<?php echo $opt4; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="company" class="form-control-label">Add Answer</label>
                                                <input type="text" name="answer" placeholder="Add answer" class="form-control" style="padding-bottom:45px" value="<?php echo $answer; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Update Question" class="btn btn-success">
                                            </div>       
                                        </div>
                                    </div> 
                                </form>
                            </div>

                            </div>
                        </div> 
                    </div>
                    <!--/.col-->                   
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
 
<?php
if(isset($_POST["submit1"])){
    mysqli_query($link,"UPDATE quiz set ques='$_POST[question]',op1='$_POST[opt1]',op2='$_POST[opt2]',op3='$_POST[opt3]',op4='$_POST[opt4]',answer='$_POST[answer]' where id=$id ") or die(mysqli_error($link)); 
    ?>
    <script type="text/javascript">
        window.location="add_edit_questions.php?id=<?php echo $id1; ?>";
    </script>
    <?php
}

?>



<?php
include "footer.php";
?>
