<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">
    PHP Login Session Sample
  </a>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link active" href="classes/logout.php?logout=true">
        <span data-feather="log-out"></span>
        Logoff - <?php print($rowUser['name']); ?>
      </a>
    </li>
  </ul>
</nav>
