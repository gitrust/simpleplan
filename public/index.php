<?php
#
# MVC
#
include('protected/classes/controller.php');  
include('protected/classes/model.php');  
include('protected/classes/view.php');

#-------------------------------------------
# Templates:
$tmpl_path ="protected/tmpl/";
$layout_template = $tmpl_path . "page.tpl";
$navigation_template = $tmpl_path . "nav.tpl";
$footer_template = $tmpl_path . "footer.tpl";

#-------------------------------------------
# Inhaltsdateien:
$content_files = array();
$content_files['login'] = $tmpl_path . "login.tpl";
$content_files['privacy'] = $tmpl_path . "privacy.tpl";
$content_files['impressum'] = $tmpl_path . "impressum.tpl";

#===========================================
# Templates einlesen:
$layout_content = file_get_contents($layout_template);
$navigation_content = file_get_contents($navigation_template);
$footer_content = file_get_contents($footer_template);
#-------------------------------------------
# Seite aus Templates zusammenfügen:
$page = $layout_content;
$page = preg_replace("/\[\%navigation\%\]/",
$navigation_content, $page);
$page = preg_replace("/\[\%footer\%\]/",
$footer_content, $page);

#-------------------------------------------
# Inhalt seitenabhängig einlesen:
$get_page = "";
if(isset($_GET['page']))
$get_page = $_GET['page'];
else
$get_page = "login";
$content_lines = file($content_files[$get_page]);
$content = implode("", $content_lines);
#-------------------------------------------
# Inhalt in Seite einfügen:
$page = preg_replace("/\[\%content\%\]/", $content, $page);
#-------------------------------------------
# Titel ermitteln und einfügen:
preg_match("/<h1>(.*)<\/h1>/", $content_lines[0], $matches);
$page_title = strip_tags($matches[0]);
$page = preg_replace("/\[\%title\%\]/", $page_title, $page);
#-------------------------------------------
# Fertige Seite ausgeben:
echo $page;
?>