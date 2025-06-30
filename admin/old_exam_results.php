<?php
session_start();
include "header.php";
include "../connection.php";

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="container">
    <div class="breadcrumbs">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>All Exam Results</h1>
                    </div>
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
                            <center><h1>Old Exams Results</h1></center>
                            <?php
                            $count = 0;
                            $res = mysqli_query($link, "SELECT * FROM exam_results ORDER BY id DESC");
                            $count = mysqli_num_rows($res);

                            if ($count == 0) {
                                ?>
                                <center><h2>No Results Found</h2></center>
                                <?php
                            } else {
                                echo "<div class='table-responsive'>"; // Ensure table is scrollable if needed
                                echo "<table class='table table-bordered'>";
                                echo "<thead>";
                                echo "<tr style='background-color:blue; color:white;'>";
                                echo "<th>Username</th>";
                                echo "<th>Exam Type</th>";
                                echo "<th>Total Questions</th>";
                                echo "<th>Correct Answer</th>";
                                echo "<th>Wrong Answer</th>";
                                echo "<th>Exam Time</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["exam_type"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["total_question"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["correct_answer"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["wrong_answer"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["exam_time"]) . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>"; // Close table-responsive
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- .container -->

<?php
include "footer.php";
?>
