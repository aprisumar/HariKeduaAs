<?php
if($_GET and isset($_GET['page'])){
$page = $_GET['page'];
}
?>
        <nav class="navbar navbar-dark bg-dark">
            <a id="User" class="navbar-brand" href="#">N45HT - CTF</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" onclick="user()" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?= ($page=='home' or empty($_GET))? 'active':''; ?>">
                        <a class="nav-link" href="?page=home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= ($page=='stat')? 'active':''; ?>">
                        <a class="nav-link" href="?page=stat">Rank</a>
                    </li>
                    <li class="nav-item <?= ($page=='about')? 'active':''; ?>">
                        <a class="nav-link" href="?page=about">About</a>
                    </li>
<?php
if(isset($_SESSION['user'])){
print'              <li class="nav-item">
                        <a class="nav-link" href="javascript:logout();">Logout</a>
                    </li>';
}
?>
                </ul>
            </div>
        </nav>