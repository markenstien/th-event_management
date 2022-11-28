<?php build('content')?>
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="#">Overview</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Messages</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Gallery</a>
  </li>
</ul>
<?php Flash::show()?>
<?php grab('appointment/show_pages/overview', [
	'appointment' => $appointment,
	'payments' => $payments
])?>
	
<?php endbuild()?>
<?php loadTo()?>