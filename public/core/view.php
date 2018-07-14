<?php

class View {

	public function render($path, $data = false, $error = false) {
      require "views/$path.php";
   }

}