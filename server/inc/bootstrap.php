<?php
 spl_autoload_register('todoAutoloder');
 function todoAutoloder($class) {
 	require "class/$class.php";
 }