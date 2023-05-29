<?php
    session_start();
    $_SESSION["heading"] = $_GET["heading"];
    $_SESSION["tripDate"] = $_GET["tripDate"];
    $_SESSION["duration"] = $_GET["duration"];
    $_SESSION["summary"] = $_GET["summary"];
?>

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
      <img src="https://raw.githubusercontent.com/Zulinov/skillsProjects/main/hamburger.png" alt="hamburger icon" />
    </a>
    <span>Halifax Canoe and Kayak</span>
    <img src="https://raw.githubusercontent.com/Zulinov/skillsProjects/main/paddle-white.png" alt="logo"
      class="header-logo" />
  </header>
  <!-- Toggle list  -->
  <!-- <nav class="navbar">
        <ul>
            <li>Home</li>
            <li>Book Trip</li>
            <li>Admin Login</li>
        </ul>
    </nav> -->

<?php
      $heading = $_SESSION["heading"];
      $tripDate = $_SESSION["tripDate"];
      $duration = $_SESSION["duration"];
      $summary = $_SESSION["summary"];


  try {
    echo "Begin writting to DB";
    error_log("Connecting to DB\n", 0);
    $dbhost = 'localhost';
    $dbname = 'id20788463_assignment4';
    $dbuser = 'id20788463_andy';
    $dbpass = 'Andy19850206$';
    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);


    $sql = "INSERT INTO Trip4 (heading, tripDate, duration, summary) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    $pdo->beginTransaction();
    $stmt->execute([$heading, $tripDate, $duration, $summary]);
    $pdo->commit();
    echo "Successfully added to DB";
  } catch (Exception $e) {
    echo "Error : " . $e->getMessage() . "<br/>";
    error_log("Cannot connect to DB\n", 0);

?>
    <label class="title">Assignment Submission - Failed</label>
    <br>
    <label class="subtitle">Encountered technical errors. Please contact system administrator.</label>
    <br>
<?php
  }
?>

  <div>
    <h1>Admin - Confirm</h1>
    <p>Data add successfully in DB</p>
    <a href='all-adventures.php'>View all adventures</a>
  </div>


  <script>
    $("*").css("margin", "0");
    const toggle = () => {
      $("nav").toggle();
    }

  </script>
</body>

</html>