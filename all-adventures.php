

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halifax Canoe and Kayak</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

</head>

<body>
    <header>
        <a href="#" class="navButton" onclick="toggle()">
            <img src="https://raw.githubusercontent.com/Zulinov/skillsProjects/main/hamburger.png"
                alt="hamburger icon" />
        </a>
        <span>Halifax Canoe and Kayak</span>
        <img src="https://raw.githubusercontent.com/Zulinov/skillsProjects/main/paddle-white.png" alt="logo"
            class="header-logo" />
    </header>
    <!-- Toggle list  -->
    <nav class="navbar">
        <ul>
            <li>Home</li>
            <li>Book Trip</li>
            <li>Admin Login</li>
        </ul>
    </nav>
    <main>

        <div class="main-img-container">
            <img src="https://raw.githubusercontent.com/Zulinov/skillsProjects/main/canoe.jpg" alt=""
                class="main-img" />
        </div>
        <div class="main-text-container">
            <div class="main-text">
                <h1>Upcoming Adventures</h1>

<?php

try {
    error_log("Connecting to DB\n", 0);
    $dbhost = 'localhost';
    $dbname = 'id20788463_assignment4';
    $dbuser = 'id20788463_andy';
    $dbpass = 'Andy19850206$';
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

} catch (PDOException $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    error_log("Cannot connect to DB\n", 0);
    die();
}

$query = "SELECT tripDate FROM Trip4";
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->bindColumn('tripDate', $tripDate);
while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
    echo "$tripDate" . "<br>";
}
?>
                
                
                <h2>Halifax</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis unde dolores temporibus hic quam
                    debitis tenetur harum nemo.Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis unde
                    dolores temporibus hic quam debitis tenetur harum nemo.</p>
                <h2>Sydney</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis unde dolores temporibus hic quam
                    debitis tenetur harum nemo.</p>
            </div>
        </div>
    </main>


    <script>
        $("*").css("margin", "0");
        const toggle = () => {
            $("nav").toggle();
        }

    </script>
</body>

</html>