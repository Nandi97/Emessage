<?php
// Fetch all the chats for the current chatRoom
$sql = "SELECT * FROM chats WHERE chatRoomId = " . $chatRoom['id'];
$chats = $db->query($sql);
?>

<div class="d-flex flex-column h-100">
  <?php
  // If the query returns any results
  if ($chats->rowCount() > 0) {
  ?>
    <div class="flex-grow-1">
      <div class="container py-3">
        <div class="row">
          <?php
          // Iterate through each chat and display it
          foreach ($chats as $chat) {
          ?>
            <div class="col-9<?= $chat['userId'] == 1 ? ' offset-3' : '' ?>">
              <div class="bg-<?= $chat['userId'] == 1 ? 'primary' : 'secondary' ?> bg-opacity-25 rounded-chat px-3 py-1 mb-3">
                <div class="row">
                  <div class="col">
                    <b>+254 700 123 456</b>
                  </div>
                  <div class="col text-end text-black-50">
                    <b>~Username</b>
                  </div>
                  <div class="col-12">
                    <?= $chat['message']; ?>
                    <div class="col-12 text-end">
                      <?= date("H:i A", strtotime($chat['createdAt'])); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>

    <div class="input-group bg-secondary bg-opacity-25 p-2">
      <input type="text" class="form-control rounded-pill me-2 ps-3" placeholder="Your message" aria-label="Your message" aria-describedby="basic-addon2">
      <span class="input-group-text rounded-circle" id="basic-addon2">
        <i class="bi bi-arrow-right-circle-fill"></i>
      </span>
    </div>
  <?php
  }
  ?>
</div>