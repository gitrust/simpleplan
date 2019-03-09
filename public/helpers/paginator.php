<?php

class Paginator {
   
   private $name;
   private $currentPage = 1;
   private $itemCount;
   private $itemsPerPage = 2;
   
   function __construct($name,$currentPageNumber,$itemCount,$itemsPerPage=2) {
      $this->name = $name;
      $this->currentPage = $this->getAndStorePage($currentPageNumber);
      $this->itemCount = $itemCount;
      $this->itemsPerPage = $itemsPerPage;
   }
   
   public function getPrev() {
      if ($this->getPage() > 1) {
         return $this->getPage() - 1;
      }
      return 1;
   }
   
   public function getNext() {
      // multiple pages
      if ($this->getPage() < $this->getPageCount()) {
         return $this->getPage() + 1;
      }
      return $this->getPageCount();
   }

   public function getItemsPerPage() {
      return $this->itemsPerPage;
   }
   
   public function getPageCount() {
      if ($this->itemCount > 0 && ($this->itemCount > $this->itemsPerPage)) {
         $remainder = $this->itemCount % $this->itemsPerPage;
         $result = $this->itemCount / $this->itemsPerPage;
         if ($remainder > 0) {
            return intval($result) + 1 ;
         }
         return $result;
      }
      return 1;
   }

   public function getPage() {
      if ($this->currentPage > $this->getPageCount()) {
         return $this->getPageCount();
      }
      return $this->currentPage;
   }

   private function getAndStorePage($page) {
      if (empty($page)) {
         $page = Session::get($this->name . "-page");
      }

		if (empty($page)) {
			$page = 1;
		}
      Session::set($this->name . "-page",$page);
      return $page;
	}

   
   public  function  show($url) {
      return '<div class="paging"><a href="' . DIR . $url . '?prev"> &lt; </a>  &nbsp; Page [1] &nbsp; <a href="' . DIR . $url . '?next"> &gt; </a></div>';
   }

}