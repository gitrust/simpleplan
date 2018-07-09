<?php



class View {
	// -------------------------------------------
	// Templates:
	const  TMPL_PATH = "protected/tmpl/";
	const  LAYOUT_TMPL = self::TMPL_PATH . "page.tpl";
	private  $navigation_template = self::TMPL_PATH . "nav.tpl";
	private  $footer_template = self::TMPL_PATH . "footer.tpl";

	// Inhaltsdateien:
	private  $content_files = array();
	
	private $current_view = "login";
	
	
	public function __construct() {
		// content files
		$this->content_files['login'] = self::TMPL_PATH . "login.tpl";
		$this->content_files['privacy'] = self::TMPL_PATH . "privacy.tpl";
		$this->content_files['impressum'] = self::TMPL_PATH . "impressum.tpl";
		
	}
	
	public function render($vars = array()) {
		//===========================================
		// Templates einlesen:
		$layout_content = file_get_contents(self::LAYOUT_TMPL);
		$navigation_content = file_get_contents($this->navigation_template);
		$footer_content = file_get_contents($this->footer_template);
		
		//-------------------------------------------
		// Seite aus Templates zusammenfügen:
		$page = $layout_content;
		$page = preg_replace("/\[\%navigation\%\]/",$navigation_content, $page);
		$page = preg_replace("/\[\%footer\%\]/",$footer_content, $page);

		//-------------------------------------------
		// Inhalt seitenabhängig einlesen:
		$content_lines = file($this->content_files[$this->current_view]);
		$content = implode("", $content_lines);
		
		//-------------------------------------------
		// Inhalt in Seite einfügen:
		$page = preg_replace("/\[\%content\%\]/", $content, $page);
		
		//-------------------------------------------
		// Titel ermitteln und einfügen:
		preg_match("/<h1>(.*)<\/h1>/", $content_lines[0], $matches);
		$page_title = strip_tags($matches[0]);
		$page = preg_replace("/\[\%title\%\]/", $page_title, $page);
		
		//-------------------------------------------
		// Fertige Seite ausgeben:
		return $page;
	}
	
	public function setView($view = "login") {
		$this->current_view = $view;
	}
}
?>