<?php
    include('db_conn.php');

    $query = 'Select name from subjects where display=1 order by pos';
    $subjects_result = mysqli_query($db, $query);

    confirm_q($subjects_result);
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-primary" id='nav'>
    <a class="navbar-brand" href="#">Navbar w/ text</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategorie</a>
        <div class="dropdown-menu" aria-labelledby="dropdownId">
            <?php 
                while($subject = mysqli_fetch_assoc($subjects_result)) 
                {
            ?>
                <a class="dropdown-item" href="#">
                    <?= $subject['name'] ?>
                </a>
            <?php } ?>
        </div>
        </li>
    </ul>
    <span class="navbar-text">
        <button>admin</button>
    </span>
    </div>
</nav>

<?php
    mysqli_close($db)
?>