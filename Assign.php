<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Activities</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('background.jpg') ;
            background-size: cover;
            color: #ffffff;
            padding: 20px;
        }

        .f1 {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            
        }

        label {
            color: #ffffff;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #28a745;
            border: none;
        }

        .btn-primary:hover {
            background-color: #218838;
        }

        .btn-secondary {
            background-color: #007bff;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #0056b3;
        }
        .btn-third{
            background-color: #000408;
            border: none;
            color:wheat
        }
        .btn-third:hover{
            background-color: #121719;
        }
    </style>
</head>

<body>

    <div class="container f1">
        <h1>ASSIGN ACTIVITIES</h1>

        <form action="AssignData.php" method="POST">

            <h2>Assign Task</h2>
            <div class="mb-3">
                <label for="Eid">Eid</label>
                <select name="aEid" id="Eid" class="form-control" required>
                    <option></option>
                    <!-- PHP code ----------------------------------------------------------------------------------- -->
                    <?php
                        $dbname="project";

                            $conn=mysqli_connect("localhost","root" , "" , "project");
                        //Check Connection

                        if(!$conn){
                              die ("Connection faild:" . mysqli_connect_error());
                              }
                            // SQL query to retrieve Task ID
                                $sql = "SELECT Eid FROM employee";
                                $result = $conn->query($sql);

                           
                                if ($result->num_rows > 0) {
                          // Output data 
                                while($row = $result->fetch_assoc()) {
                         // Output Task ID as an option in the dropdown list
                                 echo "<option value='" . $row['Eid'] . "'>" . $row['Eid'] . "</option>";
                                }
                            } else {
                         
                            echo "<option value=''>No Task IDs found</option>";
                              }

                        // Close the database connection
                        $conn->close();

                            ?>  
                </select>
            </div>

            <div class="mb-3">
                <label for="AsTid">Tid</label>
                <select name="AsTid" id="AsTid" class="form-control" required>
                    <option></option>
                    <!-- PHP code ---------------------------------------------------------------------------------------------->
                    <?php
                        $dbname="project";

                            $conn=mysqli_connect("localhost","root" , "" , "project");
                        //Check Connection

                        if(!$conn){
                              die ("Connection faild:" . mysqli_connect_error());
                              }
                            // SQL query to retrieve Task IDs
                                $sql = "SELECT Tid FROM taskactivities";
                                $result = $conn->query($sql);

                            
                                if ($result->num_rows > 0) {
                          // Output data 
                                while($row = $result->fetch_assoc()) {
                         // Output Task ID as an option in the dropdown list
                                 echo "<option value='" . $row['Tid'] . "'>" . $row['Tid'] . "</option>";
                                }
                            } else {
                       
                            echo "<option value=''>No Task IDs found</option>";
                              }

                        // Close the database connection
                        $conn->close();

                            ?>  
                </select>
            </div>

            <div class="mb-3">
                <label for="ActivityId">Activity Id</label>
                <select name="aActivityId" id="ActivityId" class="form-control" required>
                    <option></option>
                    <!-- PHP code  ---------------------------------------------------------------------------------------------------------------->
                    <?php
                        $dbname="project";

                            $conn=mysqli_connect("localhost","root" , "" , "project");
                        //Check Connection

                        if(!$conn){
                              die ("Connection faild:" . mysqli_connect_error());
                              }
                            // SQL query to retrieve Task ID
                                $sql = "SELECT ActivityId FROM taskactivities";
                                $result = $conn->query($sql);

                            
                                if ($result->num_rows > 0) {
                          // Output data 
                                while($row = $result->fetch_assoc()) {
                         // Output Task ID as an option in the dropdown list
                                 echo "<option value='" . $row['ActivityId'] . "'>" . $row['ActivityId'] . "</option>";
                                }
                            } else {
                         
                            echo "<option value=''>No Task IDs found</option>";
                              }

                        // Close the database connection
                        $conn->close();

                            ?>  
                </select>
            </div>

            <div class="mb-3">
                <label for="assigndate">Date of Assign</label>
                <input type="Date" id="assigndate" name="Asdate" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="remark">Remark</label>
                <input type="text" id="remark" name="remark" class="form-control" required />
            </div>

            <div class="d-grid gap-2">
                <input type="submit" value="Submit" id="submit" class="btn btn-primary">
                <input type="reset" value="Reset" id="reset" class="btn btn-secondary">
                <a href="javascript:history.back()" class="btn btn-third">Back</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JavaScript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
