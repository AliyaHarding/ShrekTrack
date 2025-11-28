<?php
session_start();
require_once 'autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $event = new Event($db);
    if ($event->addEvent($_POST)) {
        $_SESSION['event'] = $_POST;     }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="css/calendar.css" type="text/css" />
    <link rel="stylesheet" href="css/formStyle.css" type="text/css">
    <title>ShrekTrack - Home</title>
    <script type="module" src="js/calendar.js" defer></script>
</head>
<body>
    <header>
        <section>
            <a href="Calendar.php" class="logo"><img src="img/images-Photoroom.png" alt="" /></a>
            <a href=""><i class="fa-solid fa-user"></i><p>Profile</p></a>
            <a href=""><i class="fa-solid fa-house"></i><p>Home</p></a>
            <a href=""><i class="fa-solid fa-bell"></i><p>Notifications</p></a>
            <a href=""><i class="fa-solid fa-gear"></i><p>Settings</p></a>
        </section>
        <section>
            <a href=""><i class="fa-solid fa-right-from-bracket"></i><p>Log out</p></a>
        </section>
    </header>
    <main>
        <section class="Search">
            <section>
                <h1>Home</h1>
            </section>
            <section class="searIn">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" placeholder="Search..." />
            </section>
        </section>
        <section class="board">
            <section class="calendar">
                <section class="title">
                    <h1>Calendar</h1>
                </section>
                <section class="CalDta">
                    <h2 id="monthYear"></h2>
                </section>
                <section class="controls">
                    <button id="prevMonth">Previous</button>
                    <button id="todayButton">Today</button>
                    <button id="nextMonth">Next</button>
                </section>
                <section class="view">
                    <section class="event" id="calendarDays">
                        <!-- Days will be populated here by JavaScript -->
                    </section>
                    <section class="events">
                        <section>
                            <h1 class="evTitle">Events</h1>
                            <div id="eventList">
                                <?php
                                if (isset($_SESSION['event'])) {
                                    $event = $_SESSION['event'];
                                    echo "<div class='event-item'>";
                                    echo "<a href='#'>{$event['title']}</a>";
                                    echo "<p><strong>Date:</strong> {$event['date']}</p>";
                                    echo "</div>";
                                }
                                ?>
                            </div>
                        </section>
                    </section>
                </section>
            </section>
        </section>

        <!-- Event Form Modal -->
        <div id="eventModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Plan Event</h2>
                <section class="Event">
                    <form id="eventForm" action="" method="POST" class="eventForm">
                        <label for="title">Event Title:</label>
                        <input type="text" id="title" name="title" class="textInput" placeholder="Enter text..." required><br><br>
                        <label for="date">Date & Time:</label>
                        <input type="datetime-local" id="date" name="date" class="textInput" placeholder="Enter text..." required><br><br>
                        <label>Event Type:</label>
                        <section class="Radio">
                            <input type="radio" id="indoors" name="eventType" value="Indoors" class="radioCheck" required>
                            <label for="indoors">Indoors</label>
                        </section>
                        <section class="Radio">
                            <input type="radio" id="outdoors" name="eventType" value="Outdoors" class="radioCheck" required>
                            <label for="outdoors">Outdoors</label><br><br>
                        </section>
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4" class="textInput Resize" placeholder="Enter text..." required></textarea><br><br>
                        <button type="submit" class="SubBtn">Submit</button>
                    </form>
                </section>
            </div>
        </div>

        <button class="fab" id="addEventButton">
            <i class="fa-solid fa-plus"></i>
        </button>
    </main>
</body>
</html>