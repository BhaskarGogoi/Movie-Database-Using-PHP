<?php
    if(isset($_SESSION['admin_id'])){
        echo "
        <nav class='top-nav'>
            <ul>
                <li>Hi! Admin</li>
                <li><a href='http://localhost/moviedatabase/dashboard.php'>Dashboard</a></li>
                <li>
                    <form action='//localhost/moviedatabase/includes/logout.php' method='POST'>
                        <button type='submit' name='submit'><i class='fas fa-power-off'></i> Logout</button>
                    </form>                    
                </li>
            </ul>
        </nav>
        ";
    }
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="row" style='width: 100%;'>
            <a class="navbar-brand" href="//localhost/moviedatabase/index.php">Movie Database</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php  $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php'); ?>
            <div class="collapse navbar-collapse float-right ml-5" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a <?php echo ($filename == 'index') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
                            href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a <?php echo ($filename == 'about') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
                            href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a <?php echo ($filename == 'contact') ? 'class="nav-link active"' : 'class="nav-link"'; ?>
                            href="contact.php">Contact</a>
                    </li>
                </ul>
                <form action='search.php' method='GET' class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" name='search_query' placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</nav>