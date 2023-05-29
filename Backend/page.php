<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db_name = "CustomerDB";
$conn = new mysqli($servername, $username, $password, $db_name, 3306);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<style>
        .table-container {
            margin: 20px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            overflow-x: auto;
        }
        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-container table thead th {
            background-color: #f4f4f4;
            color: #000;
            font-weight: bold;
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table-container table tbody td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            white-space: nowrap;
        }
        .table-container table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table-container table tbody td .btn-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .table-container table tbody td .btn-group a {
            color: #fff;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            margin-left: 5px;
            cursor: pointer;
        }
        .table-container table tbody td .btn-group .edit-btn {
            background-color: #28a745;
        }
        .table-container table tbody td .btn-group .delete-btn {
            background-color: #dc3545;
        }
        @media (max-width: 768px) {
            .table-container table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
            .table-container table thead {
                display: block;
            }
            .table-container table tbody {
                display: block;
            }
            .table-container table tr {
                display: inline-block;
                vertical-align: top;
            }
            .table-container table td {
                display: block;
                text-align: left;
            }
        }
      </style>";

function displayTable($table, $conn) {
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);

    echo "<div class='table-container'>";
    echo "<h2>Table $table</h2>";
    echo "<table>";
    echo "<thead><tr><th>ID</th><th>Name</th><th>Location</th><th>Facebook</th><th>Website</th><th>Video</th><th>Gmail</th><th>Action</th></tr></thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['ID']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['location']}</td>";
        echo "<td>{$row['facebook']}</td>";
        echo "<td>{$row['website']}</td>";
        echo "<td>{$row['video']}</td>";
        echo "<td>{$row['gmail']}</td>";
        echo "<td>
                <div class='btn-group'>
                    <a class='edit-btn' href='#' onclick='editRecord({$row['ID']})'>Edit</a>
                    <a class='delete-btn' href='#' onclick='deleteRecord(\"$table\", {$row['ID']})'>Delete</a>
                </div>
            </td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

$tables = ["special", "student", "freelancer", "company"];

foreach ($tables as $table) {
    displayTable($table, $conn);
}

$conn->close();
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
</script>
