<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Task Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('background.jpg') ;
            background-size: cover;
            color: #ffffff;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color:black;
        }

        .f1 {
            max-width: 600px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #28a745;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .btn-third{
            background-color: #000408;
            border: none;
            color:wheat
        }
        .btn-third:hover{
            background-color: #121719;
        }
        .btn-four {
            background-color: #007bff;
            border: none;
            color:wheat;
            margin-left: 350px;
        }

        .btn-four:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <h1>Employee Task Report</h1>

    <!--  display the report -->
    <div class="f1">
        <table>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Task ID</th>
                <th>Task Name</th>
            </tr>
           

            <?php
            $dbname = "project";

            // Create connection
            $conn = mysqli_connect("localhost", "root", "", "project");

            // Check Connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Select Eid and Task
            $sql = "SELECT employee.Eid, employee.Name as EmployeeName, task.Tid, task.Name as TaskName
                FROM employee
                INNER JOIN assign ON employee.Eid = assign.Eid
                INNER JOIN task ON assign.Tid = task.TId";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data  row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["Eid"] . "</td>
                            <td>" . $row["EmployeeName"] . "</td>
                            <td>" . $row["Tid"] . "</td>
                            <td>" . $row["TaskName"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data available</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
            
        </table>
        <table>
                    <tr>
                        <td>
                            <a href="javascript:history.back()" class="btn btn-third">Back</a>
                        </td>
                        <td></td> <td></td>
                        <td>
                            <form action="home.html" method="post" >
                                <button type="submit" class="btn btn-four">Log Out</button>
                            </form>
                        
                        </td>
                </tr>

                </table>
    
    </div>

    <!-- Bootstrap JavaScript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
