<?php build('content')?>
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="?page=overview">Overview</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?page=messages">Messages</a>
  </li>
</ul>
<?php Flash::show()?>
<?php 
  if (isEqual($page, 'messages')) {
    grab('appointment/show_pages/messages', [
      'appointment' => $appointment,
      'payments' => $payments,
      'id' => $id,
      'messages' => $messages,
      'user' => $user
    ]);
  } else {
    grab('appointment/show_pages/overview', [
      'appointment' => $appointment,
      'payments' => $payments,
      'user' => $user
    ]);
  }
?>
	
<?php endbuild()?>
<?php loadTo()?>