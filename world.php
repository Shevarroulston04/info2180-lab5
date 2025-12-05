<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = $_GET['country'] ?? "";
$lookup = $_GET['lookup'] ?? "";

// --------- EXERCISE 5: If lookup=cities, run JOIN query ---------
if ($lookup === "cities") {

    $query = "
        SELECT cities.name AS city, cities.district, cities.population
        FROM cities
        JOIN countries ON cities.country_code = countries.code
        WHERE countries.name LIKE '%$country%'
    ";

    $stmt = $conn->query($query);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output cities table
    echo "<table>
            <tr>
                <th>City</th>
                <th>District</th>
                <th>Population</th>
            </tr>";

    foreach ($results as $row) {
        echo "<tr>
                <td>{$row['city']}</td>
                <td>{$row['district']}</td>
                <td>{$row['population']}</td>
              </tr>";
    }

    echo "</table>";
    exit(); // stop execution so countries do NOT print
}

// --------- DEFAULT: Country lookup (Exercise 3 & 4) ---------
if (!empty($country)) {
    $query = "SELECT * FROM countries WHERE name LIKE '%$country%'";
} else {
    $query = "SELECT * FROM countries";
}

$stmt = $conn->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output countries table
echo "<table>
        <tr>
            <th>Country Name</th>
            <th>Continent</th>
            <th>Independence Year</th>
            <th>Head of State</th>
        </tr>";

foreach ($results as $row) {
    echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['continent']}</td>
            <td>{$row['independence_year']}</td>
            <td>{$row['head_of_state']}</td>
          </tr>";
}

echo "</table>";
?>
