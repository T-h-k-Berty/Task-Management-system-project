<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Activities</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('background.jpg') ;
            background-size: cover;
            color: #ffffff;
            padding: 20px;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
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

    <div class="container form-container">
        <h1>TASK ACTIVITIES</h1>

        <form method="POST" id="taskForm">
            <div class="form-group">
                <label for="Tasktid">Task id</label>
                <select class="form-control" id="Tasktid" name="Tasktid">
                <?php
                    $dbname = "project";
                    $conn = mysqli_connect("localhost", "root", "", "project");

                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = "SELECT Tid FROM task";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['Tid'] . "'>" . $row['Tid'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No Task IDs found</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="activity">Activity</label>
                <input type="text" class="form-control" id="activity" name="Act">
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="addTask()">Add Task</button>
                <input type="reset" class="btn btn-secondary" value="Reset">
            </div>

            <div class="form-group">
                <table id="taskTable" class="table">
                    <thead>
                        <tr>
                            <th>Task ID</th>
                            <th>Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                     
                </tbody>
                </table>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="saveToDatabase()">Save to Database</button>
                <a href="javascript:history.back()" class="btn btn-third">Back</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function addTask() {
            var Tasktid = document.getElementById('Tasktid').value;
            var activity = document.getElementById('activity').value;

            var table = document.getElementById('taskTable').getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);

            cell1.textContent = Tasktid;
            cell2.textContent = activity;
        }

        function saveToDatabase() {
            var taskElements = document.getElementById('taskTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            for (var i = 0; i < taskElements.length; i++) {
                var Tasktid = taskElements[i].cells[0].textContent;
                var activity = taskElements[i].cells[1].textContent;
                console.log('Task ID: ' + Tasktid + ', Activity: ' + activity);
                
            }

            // Update the form 
            document.getElementById('taskForm').action = 'assgnTAsk.php';
            document.getElementById('taskForm').submit();
        }
    </script>
</body>

</html>
