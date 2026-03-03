<?php
session_start();
print "ID вашей сессии: ".session_id();
session_destroy();
?>