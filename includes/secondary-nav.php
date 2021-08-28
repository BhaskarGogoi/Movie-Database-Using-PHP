<?php
    $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs mt-4">
                <li class="nav-item">
                    <a <?php echo ($filename == 'dashboard') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
                        href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a <?php echo ($filename == 'movies') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
                        href="movies.php">Movies</a>
                </li>
                <li class="nav-item">
                    <a <?php echo ($filename == 'actors') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
                        href="actors.php">Actors</a>
                </li>
                <li class="nav-item">
                    <a <?php echo ($filename == 'directors') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
                        href="directors.php">Directors</a>
                </li>
                <li class="nav-item">
                    <a <?php echo ($filename == 'producers') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
                        href="producers.php">Producers</a>
                </li>
            </ul>
        </div>
    </div>
</div>