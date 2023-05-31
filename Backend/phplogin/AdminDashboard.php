<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db_name = "CustomerDB";
$conn = new mysqli($servername, $username, $password, $db_name, 3306);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS styles for the table */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .table-container {
            margin: 20px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f4f4f4;
            color: #000;
            font-weight: bold;
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            white-space: nowrap;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-group a {
            color: #fff;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            margin-left: 5px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #28a745;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .location-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            thead {
                display: block;
            }

            tbody {
                display: block;
            }

            tr {
                display: inline-block;
                vertical-align: top;
            }

            td {
                display: block;
                text-align: left;
            }
        }

        /* CSS styles for the navbar and logout button */
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar nav a {
            margin-right: 10px;
            color: #fff;
            text-decoration: none;
            padding: 10px;
        }

        .logout-button {
            background-color: #f44336;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .location-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .table-container td a {
            color: #fff;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            margin-left: 5px;
            cursor: pointer;
        }

        /* Background colors for the buttons */
        .table-container td .edit-btn {
            background-color: #28a745;
        }

        .table-container td .delete-btn {
            background-color: #dc3545;
        }

        .table-container td .location-button {
            background-color: #007bff;
        }
        h2{
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <?php
    // Logout Button and Navbar
    echo "<div class='navbar'>";
    echo "<nav>";
    echo "<span>MyAdminDashboard</span>";
    echo "</nav>";
    echo "<button class='logout-button' onclick='logout()'>Logout</button>";
    echo "</div>";

    function displayTable($table, $conn, $formName)
    {
        $sql = "SELECT * FROM $table";
        $result = $conn->query($sql);

        echo "<div class='table-container'>";
        echo "<h2>$formName Table</h2>";
        echo "<table>";
        echo "<thead><tr><th>ID</th><th>Name</th>";

        if ($table == "freelancer") {
            echo "<th>LinkedIn Profile</th>";
            echo "<th>Github</th>";
            echo "<th>Resume URL</th>";
            echo "<th>Website URL</th>";
            echo "<th>Gmail</th>";  
        } elseif ($table == "company") {
            echo "<th>Location</th>";
            echo "<th>Facebook</th>";
            echo "<th>Website URL</th>";
            echo "<th>Gmail</th>";
        } elseif ($table == "student") {
            echo "<th>LinkedIn</th>";
            echo "<th>Github</th>";
            echo "<th>Resum</th>";
            echo "<th>Gmail</th>";
        } elseif ($table == "special") {
            echo "<th>Location</th>";
            echo "<th>Facebook</th>";
            echo "<th>Website URL</th>";
            echo "<th>Video URL</th>";
            echo "<th>Gmail</th>";
        }

        echo "<th>Action</th>";
        echo "</tr></thead>";

        echo "<tbody>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['ID']}</td>";
                echo "<td>{$row['name']}</td>";

                if ($table == "freelancer") {
                    echo "<td><a  class='location-button' href='{$row['location']}'>{$row['location']}</a></td>";
                    echo "<td><a class='location-button'  href='{$row['linkedin-profile']}' target='_blank'>LinkedIn</a></td>";
                    echo "<td><a  class='location-button' href='{$row['github']}' target='_blank'>Github</a></td>";
                    echo "<td><a class='location-button' href='{$row['resume-url']}' target='_blank'>Resume URL</a></td>";
                    echo "<td><a class='location-button' href='{$row['website']}' target='_blank'>Visit Website</a></td>";
                } elseif ($table == "company") {
                    echo "<td><a class='location-button' href='{$row['location']}' target='_blank'>Location</a></td>";
                    echo "<td><a class='location-button' href='{$row['facebook']}' target='_blank'>Facebook</a></td>";
                    echo "<td><a class='location-button' href='{$row['website']}' target='_blank'>Website</a></td>";
                    echo "<td>{$row['gmail']}</td>";
                } elseif ($table == "student") {
                    echo "<td><a class='location-button' href='{$row['linkedin_profile']}' target='_blank'>Linkedin</a></td>";
                    echo "<td><a class='location-button' href='{$row['github']}' target='_blank'>Github</a></td>";
                    echo "<td><a class='location-button' href='{$row['resume']}' target='_blank'>Resume</a></td>";
                    echo "<td>{$row['gmail']}</td>";
                } elseif ($table == "special") {
                    echo "<td><a class='location-button' href='{$row['location']}' target='_blank'>Location</a></td>";
                    echo "<td><a class='location-button' href='{$row['facebook']}' target='_blank'>Facebook</a></td>";
                    echo "<td><a class='location-button' href='{$row['website']}' target='_blank'>Website</a></td>";
                    echo "<td><a class='location-button' href='{$row['video']}' target='_blank'>Video</a></td>";
                    echo "<td>{$row['gmail']}</td>";
                }

                echo "<td><div class='btn-group'><a class='delete-btn' href='#' onclick='deleteRecord(\"$table\", {$row['ID']})'>Delete</a></div></td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }

        echo "</tbody>";

        echo "</table>";
        echo "</div>";
        echo "<br>";
    }

    $tables = ["special", "student", "freelancer", "company"];

    foreach ($tables as $table) {
        displayTable($table, $conn, ucfirst($table));
    }
    ?>

    <script>
        function deleteRecord(table, id) {
            var confirmation = confirm("Are you sure you want to delete this record?");
            if (confirmation) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            alert("Record deleted successfully!");
                            location.reload();
                        } else {
                            alert("Error deleting the record: " + xhr.responseText);
                        }
                    }
                };
                xhr.open("POST", "delete_record.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("table=" + table + "&id=" + id);
            }
        }

        function logout() {
            window.location.href = "index.php";
        }
    </script>
</body>

</html>
