<?php
$Eidtask = $_POST["Eidtask"];
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
        INNER JOIN task ON assign.Tid = task.TId
        WHERE employee.Eid= '$Eidtask'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
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
