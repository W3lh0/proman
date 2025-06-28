<?php
$title = 'Projects list';

ob_start();
require 'nav.php';
?>

<div class="container">
    <p><a href="../">Go Home</a></p>

    <h1><?php echo $title . " (" . $projectCount . ")" ?></h1>
    <!-- if there's not data yet -->
    <?php if ($projectCount == 0) { ?>
    <div>
        <p> You have not yet added any projects </p>
        <p><a href='../controllers/project.php'></a></p>
    </div>
    <?php } ?>

    <ul>
        <?php foreach ($projects as $project) : ?>
        <li>
            <?php echo $project["title"] ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php
$content = ob_get_clean();
include 'layout.php'
?>