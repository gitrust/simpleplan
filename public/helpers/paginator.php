<?php

class Paginator {
   
   private $name;
   private $currentPage = 1;
   private $itemCount;
   private $itemsPerPage = 2;
   
   function __construct($name,$currentPageNumber,$itemCount,$itemsPerPage=2) {
      $this->name = $name;
      $this->currentPage = $this->getAndStorePage($currentPageNumber);
      $this->itemCount = abs($itemCount);
      $this->itemsPerPage = abs($itemsPerPage);
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
      $pc = 1;
      if ($this->itemCount > 0 && ($this->itemCount > $this->itemsPerPage)) {
         //$remainder = $this->itemCount % $this->itemsPerPage;
         $pc = ceil($this->itemCount / $this->itemsPerPage);
      }
      return $pc;
   }

   public function getPage() {
      if ($this->currentPage > $this->getPageCount()) {
         return $this->getPageCount();
      }
      return $this->currentPage;
   }

   public function getOffset() {
      if ($this->getPageCount() < 2 || $this->getPage() == 1) {
         return 0;
      }
      return ($this->getPage() - 1) * $this->getItemsPerPage();
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