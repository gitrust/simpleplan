<?php

class Paginator {
	
      private $currentPage = 1;
      private $itemCount;
      private $itemsPerPage = 2;
      
      function __construct($currentPage,$itemCount,$itemsPerPage=2) {
         $this->currentPage = $currentPage;
         $this->itemCount = $itemCount;
         $this->itemsPerPage = $itemsPerPage;
      }
      
      public function getPrev() {
         if ($this->currentPage > 1) {
            $this->currentPage--;
            return $this->currentPage;
         }
         return 1;
      }
      
      public function getNext() {
         if ($this->currentPage < $this->getPageCount()) {
            $this->currentPage++;
            return $this->currentPage;
         }
         return 1;
      }
      
      public function getPageCount() {
         return $this->itemCount / $this->itemsPerPage;
      }

      // TODO Paginator needs count of items to proceed!
   // should be an instance of a controller?

   public static function  show($url) {
      return '<div class="paging"><a href="' . DIR . $url . '?prev"> &lt; </a>  &nbsp; Page [1] &nbsp; <a href="' . DIR . $url . '?next"> &gt; </a></div>';
   }

   public static function update($url) {
      $left = filter_input(INPUT_GET, "prev", FILTER_SANITIZE_SPECIAL_CHARS);
      $right = filter_input(INPUT_GET, "next", FILTER_SANITIZE_SPECIAL_CHARS);
      $page  = self::getPage();
      if(!$left) {         
         if (!page > 1) {
            $page--;
         }
      } else if (!$right) {
         if (!page > 1) {
            $page++;
         }
      }
   }

   private static function getPage($name) {
		$page = Session::get($name . "-page");
		if (!empty($page)) {
			return $page;
		}
		// default page
		return 1;
	}

	
	private static function setPage($name,$page) {
		Session::set($name . "-page",$page);
	}

}