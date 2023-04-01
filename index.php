<?php
session_start();
$insert = false;
$update = false;
$delete = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "password";
$database = "notes";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `notes` WHERE `sno` = $sno";
    $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        // Update the record
        $sno = $_POST["snoEdit"];
        $pid = $_POST["pidEdit"];
        $cid = $_POST["cidEdit"];
        $id = $_POST["idEdit"];
        $title = $_POST["titleEdit"];
        $fname = $_POST["fnameEdit"];
        $gender = $_POST["genderEdit"];
        $age = $_POST["ageEdit"];
        $bmark = $_POST["bmarkEdit"];
        $occupation = $_POST["occupationEdit"];
        $description = $_POST["descriptionEdit"];

        // Sql query to be executed
        $sql = "UPDATE `notes` SET `pid` = '$pid' ,`cid` = '$cid' ,`id` = '$id' ,`title` = '$title' ,`fname` = '$fname' ,`gender` = '$gender' , `age` = '$age' , `bmark` = '$bmark' ,`occupation` = '$occupation' , `description` = '$description' WHERE `notes`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "We could not update the record successfully";
        }
    } else {
        $pid = $_POST["pid"];
        $cid = $_POST["cid"];
        $id = $_POST["id"];
        $title = $_POST["title"];
        $fname = $_POST["fname"];
        $gender = $_POST["gender"];
        $age = $_POST["age"];
        $bmark = $_POST["bmark"];
        $occupation = $_POST["occupation"];
        $description = $_POST["description"];

        // Sql query to be executed
        $sql = "INSERT INTO `notes` (`pid`,`cid`,`id`,`title`,`fname`,`gender`,`age`,`bmark`,`occupation`,`description`) VALUES ('$pid','$cid','$id','$title','$fname','$gender','$age','$bmark','$occupation','$description')";
        $result = mysqli_query($conn, $sql);


        if ($result) {
            $insert = true;
        } else {
            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <style>
        .container {
            background-color: #ADEFD1FF;
            border-radius: 15px;
            padding: 15px;
        }

        .form-control {
            border-radius: 15px;
        }

        body {
            background-color: #00203FFF;
        }

        .btn {
            margin-left: 45%;

            text-align: center;
            border-radius: 15px;
        }
    </style>

    <title>Criminal Monitoring Software</title>

</head>

<body>


    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Criminal Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/cms/index.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="pid">Police ID</label>
                            <input type="text" class="form-control" id="pidEdit" name="pidEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="cid">Case ID</label>
                            <input type="text" class="form-control" id="cidEdit" name="cidEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="id">Criminal ID</label>
                            <input type="text" class="form-control" id="idEdit" name="idEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="title">Criminal Name</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="fname">Father Name</label>
                            <input type="text" class="form-control" id="fnameEdit" name="fnameEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" class="form-control" id="genderEdit" name="genderEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" id="ageEdit" name="ageEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="bmark">Birth Mark</label>
                            <input type="text" class="form-control" id="bmarkEdit" name="bmarkEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="occupation">Occupation</label>
                            <input type="text" class="form-control" id="occupationEdit" name="occupationEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="desc">Crime Description</label>
                            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"
                                rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Criminal Monitoring Software</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="account_details.php">Account Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signout.php">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong><center>Data Inserted</center></strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <?php
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong><center>Data Deleted</center></strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <?php
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong><center>Data Updated</center></strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <div class="container my-4">
        <h2>
            <center><strong>Add Criminal Record</strong></center>
        </h2>
        <form action="/cms/index.php" method="POST">
            <div class="form-group">
                <label for="pid">Police ID</label>
                <input type="text" class="form-control" id="pid" name="pid">
            </div>
            <div class="form-group">
                <label for="id">Criminal ID</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="cid">Case ID</label>
                <input type="text" class="form-control" id="cid" name="cid">
            </div>

            <div class="form-group">
                <label for="title">Criminal Name</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="fname">Father Name</label>
                <input type="text" class="form-control" id="fname" name="fname">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age">
            </div>
            <div class="form-group">
                <label for="bmark">Birth Mark</label>
                <input type="text" class="form-control" id="bmark" name="bmark">
            </div>
            <div class="form-group">
                <label for="occupation">Occupation</label>
                <input type="text" class="form-control" id="occupation" name="occupation">
            </div>

            <div class="form-group">
                <label for="desc">Crime Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Record</button>
        </form>
    </div>

    <div class="container my-4">


        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Police ID</th>
                    <th scope="col">Case ID</th>
                    <th scope="col">Criminal ID</th>
                    <th scope="col">Criminal Name</th>
                    <th scope="col">Father Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Birth Mark</th>
                    <th scope="col">Occupation</th>
                    <th scope="col">Crime Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `notes`";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['pid'] . "</td>
            <td>" . $row['cid'] . "</td>
            <td>" . $row['id'] . "</td>
            <td>" . $row['title'] . "</td>
            <td>" . $row['fname'] . "</td>
            <td>" . $row['gender'] . "</td>
            <td>" . $row['age'] . "</td>
            <td>" . $row['bmark'] . "</td>
            <td>" . $row['occupation'] . "</td>
            <td>" . $row['description'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['sno'] . ">Delete</button>  </td>
          </tr>";
                }
                ?>


            </tbody>
        </table>
    </div>
    <hr>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();

        });
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                //console.log("edit ");
                tr = e.target.parentNode.parentNode;
                pid = tr.getElementsByTagName("td")[0].innerText;
                cid = tr.getElementsByTagName("td")[1].innerText;
                id = tr.getElementsByTagName("td")[2].innerText;
                title = tr.getElementsByTagName("td")[3].innerText;
                fname = tr.getElementsByTagName("td")[4].innerText;
                gender = tr.getElementsByTagName("td")[5].innerText;
                age = tr.getElementsByTagName("td")[6].innerText;
                bmark = tr.getElementsByTagName("td")[7].innerText;
                occupation = tr.getElementsByTagName("td")[8].innerText;
                description = tr.getElementsByTagName("td")[9].innerText;
                pidEdit.value = pid;
                cidEdit.value = cid;
                idEdit.value = id;
                titleEdit.value = title;
                fnameEdit.value = fname;
                genderEdit.value = gender;
                ageEdit.value = age;
                bmarkEdit.value = bmark;
                occupationEdit.value = occupation;
                descriptionEdit.value = description;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                sno = e.target.id.substr(1);

                if (confirm("Sure ? You want to delete this note !!!")) {
                    console.log("yes");
                    window.location = `/cms/index.php?delete=${sno}`;
                    // TODO: Create a form and use post request to submit a form
                }
                else {
                    console.log("no");
                }
            })
        })
    </script>
</body>

</html>