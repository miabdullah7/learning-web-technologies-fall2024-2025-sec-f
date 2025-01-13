
<?php
require_once('../model/userModel.php');

// Get the search query from the URL
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Fetch authors based on the search query
$authors = searchAuthors($search);

echo "<tr>
            <th>ID</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>";
// Generate HTML for the table rows
foreach ($authors as $author) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($author['id']) . "</td>";
    echo "<td>" . htmlspecialchars($author['username']) . "</td>";
    echo "<td>" . htmlspecialchars($author['fullname']) . "</td>";
    echo "<td>" . htmlspecialchars($author['contact']) . "</td>";
    echo "<td>";
    echo "<a href='edit.php?id=" . htmlspecialchars($author['id']) . "'> EDIT </a> | ";
    echo "<a href='delete.php?id=" . htmlspecialchars($author['id']) . "'> DELETE </a>";
    echo "</td>";
    echo "</tr>";
}
?>
