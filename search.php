<?php
function limitWords($string, $word_limit) {
    $words = explode(" ", $string);
    if (count($words) > $word_limit) {
        return implode(" ", array_slice($words, 0, $word_limit)) . "...";
    } else {
        return $string;
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "ramailotrek";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchInput = htmlspecialchars($_GET['searchInput']);
$difficultyLevelText = htmlspecialchars($_GET['difficultyLevel'] ?? '');
$region = htmlspecialchars($_GET['region']);
$maxDays = intval($_GET['maxDays']); // Validate as integer


$difficultyLevelRange = null;
switch ($difficultyLevelText) {
    case 'low':
        $difficultyLevelRange = "DifficultyLevel >= 0 AND DifficultyLevel <= 33";
        break;
    case 'moderate':
        $difficultyLevelRange = "DifficultyLevel >= 34 AND DifficultyLevel <= 66";
        break;
    case 'high':
        $difficultyLevelRange = "DifficultyLevel >= 67 AND DifficultyLevel <= 100";
        break;
    // Add more cases if needed
}

// Prepare SQL query
$sql = "SELECT * FROM destinations WHERE Name LIKE '$searchInput%' OR Name LIKE '%$searchInput'";

// You can add additional conditions based on other search parameters if needed
if ($difficultyLevelText != "") {
    $sql .= " OR TrekkingDifficulty = '$difficultyLevelRange'";
}
if ($region != "") {
    $sql .= " OR Location = '$region'";
}
if ($maxDays != "") {
    $sql .= " OR MaximumDays = '$maxDays'";
}

// Execute SQL query
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Generate HTML markup for search results
    $searchResultsHTML = '';
    while ($row = $result->fetch_assoc()) {
        $searchResultsHTML .= '<div class="col-lg-6 col-sm-12 mb-4">';
        $searchResultsHTML .= '<div class="card card-small card-post card-post--aside card-post--1">';
        $searchResultsHTML .= '<div class="card-post__image" style="background-image: url(' . $row['ImageURL'] . ');"></div>';
        $searchResultsHTML .= '<div class="card-body">';
        $searchResultsHTML .= '<h5 class="card-title"><a class="text-fiord-blue" href="http://localhost/fyp/detail.php?DestinationID='.$row['DestinationID'].'">' . $row['Name'] . '</a></h5>'; // Assuming the column for Name is 'Name'
        $searchResultsHTML .= '<p class="card-text d-inline-block mb-3">' . limitWords($row['Description'], 20) . '</p>'; // Assuming the column for description is 'description'

        $searchResultsHTML .= '<span class="text-muted"><button id="bookmark" class="btn btn-sm btn-white"> <i class="far fa-bookmark mr-1"></i> Bookmark </button> </span>';
        
        $searchResultsHTML .= '<span class="text-muted"><a class="btn btn-sm btn-dark" href="http://localhost/fyp/route.php?DestinationID='.$row['DestinationID'].'"> <i class="material-icons">visibility</i> View Route </a> </span>';
        $searchResultsHTML .= '</div>';
        $searchResultsHTML .= '</div>';
        $searchResultsHTML .= '</div>';
    }
} else {
    // No results found
    $searchResultsHTML = '<div class="col-md-12">No results found.</div>';
}

// Close database connection
$conn->close();

// Return search results HTML
echo $searchResultsHTML;
?>
