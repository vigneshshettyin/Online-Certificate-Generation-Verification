<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';

// Costumers class
require_once BASE_PATH . '/lib/Costumers/Costumers.php';
$costumers = new Costumers();

// Get Input data from query string

?>
<?php include BASE_PATH . '/includes/header.php'; ?>
<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Cookies Report</h1>
        </div>
        <div class="col-lg-12">
            <iframe src="https://www.cgv.in.net/cookie.html" style="height:1000px;width:1200px; border:5px;" title="Iframe Example"></iframe>
            </div>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php'; ?>
</div>
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php'; ?>
