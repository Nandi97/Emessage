<?php include('../layouts/header.php'); ?>

<?php
// Fetch all the chatRooms that the current user has prescribed to
$sql = "SELECT * FROM chatrooms";
$chatRooms = $db->query($sql);
?>

<div class="d-flex flex-column align-items-stretch flex-shrink-0 col-md-4 col-lg-3">
  <nav class="navbar-dark bg-success bg-opacity-75 text-white">
    <div class="p-3 border-bottom">
      <div class="row fs-5 fw-semibold">
        <div class="col-10">
          <input class="form-control form-control-dark rounded-pill ps-3" type="text" placeholder="Search" aria-label="Search">
        </div>
        
        <div class="col-2 text-end">
          <i class="bi bi-pencil-square"></i>
          <i class="bi bi-three-dots-vertical"></i>
        </div>
      </div>
    </div>
  </nav>

  <div class="list-group list-group-flush border-bottom scrollarea" role="tablist">
    <?php
    // If the query returns any results
    if ($chatRooms->rowCount() > 0) {
      foreach ($chatRooms as $chatRoom) {
    ?>
        <a href="#list-<?= $chatRoom['id']; ?>" class="list-group-item list-group-item-action" aria-current="true" id="list-<?= $chatRoom['id']; ?>-list" data-bs-toggle="list" role="tab">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?= $chatRoom['title'] ?></h5>
            <small><?= date("H:i A", strtotime($chatRoom['createdAt'])); ?></small>
          </div>
          <p class="mb-1"><?= $chatRoom['recentChatId'] ?></p>
          <small>And some small print.</small>
        </a>
      <?php
      }
      $chatRooms->execute();
    } else {
      ?>
      <a href="#list-0" class="list-group-item list-group-item-action active" aria-current="true" id="list-0-list" data-bs-toggle="list" role="tab">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">New message</h5>
          <small>3 days ago</small>
        </div>
        <p class="mb-1">Start a new message</p>
        <small>And some small print.</small>
      </a>
    <?php
    }
    ?>
  </div>
</div>

<div class="tab-content border-start w-100 mx-0">
  <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-light h-100">
    <nav class="navbar-dark bg-secondary bg-opacity-75">
      <div class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
        <span class="fs-5 fw-semibold text-white"><?= $chatRoom['title']; ?></span>
      </div>
    </nav>

    <?php
    // If the query returns any results
    if ($chatRooms->rowCount() > 0) {
      foreach ($chatRooms as $chatRoom) {
    ?>
        <div class="h-100 tab-pane fade" id="list-<?= $chatRoom['id']; ?>" role="tabpanel">
          <?php include('../layouts/content.php'); ?>
        </div>
      <?php
      }
    } else {
      ?>
      <div class="h-100 tab-pane fade" id="list-0" role="tabpanel">
        <?php include('../layouts/content.php'); ?>
      </div>
    <?php
    }
    ?>
  </div>
</div>

<?php include('../layouts/footer.php'); ?>