<?php

class View {
	// -------------------------------------------
	// Templates:
	const  TMPL_PATH = "protected/tmpl/";

	// Inhaltsdateien:
	private  $content_files = array("login","privacy","impressum","home","404","admin");
	
	private $current_view = null;
	
	
	public function __construct() {
		// content files
		
	}
	
	public function render($vars = array()) {
		//===========================================
		// Templates einlesen:
		$layout_content = file_get_contents($this->getFilepath("page"));
		$navigation_content = file_get_contents($this->getFilepath("nav"));
		$footer_content = file_get_contents($this->getFilepath("footer"));
		
		//-------------------------------------------
		// Seite aus Templates zusammenfügen:
		$page = $layout_content;
		$page = preg_replace("/\[\%navigation\%\]/",$navigation_content, $page);
		$page = preg_replace("/\[\%footer\%\]/",$footer_content, $page);

		//-------------------------------------------
		// Inhalt seitenabhängig einlesen:
		$content_lines = file($this->getFilepath($this->current_view));
		$content = implode("", $content_lines);
		
		//-------------------------------------------
		// Inhalt in Seite einfügen:
		$page = preg_replace("/\[\%content\%\]/", $content, $page);
		
		//-------------------------------------------
		// Titel ermitteln und einfügen:
		preg_match("/<h1>(.*)<\/h1>/", $content_lines[0], $matches);
		if (count($matches) > 0) {
			$page_title = strip_tags($matches[0]);
		} else {
			$page_title = "";
		}
		$page = preg_replace("/\[\%title\%\]/", $page_title, $page);
		
		//-------------------------------------------
		// Fertige Seite ausgeben:
		return $page;
	}
	
	private function getFilepath($template) {
		return self::TMPL_PATH . $template . ".tpl";
	}
	
	public function getView() {
		return $this->current_view;
	}
	
	public function setView($view) {
		if (in_array($view,$this->content_files)) {
			$this->current_view = $view;
		} else {
			$this->current_view = "404";
		}
	}
}
?>