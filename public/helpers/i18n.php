<?php

class I18n {
    
	private static  $msg = 
		array("button.save" => "Speichern",
			"label.administrator" => "Administrator",
			"table.header.admin" => "Administrator",
			"table.header.firstname" => "Name",
			"table.header.email" => "Email",
			"label.password" => "Passwort",
			"label.firstname" => "Name",
			"label.email" => "Email",
			"title.login" => "Anmelden",
			"link.administration" => "Administration",
			"link.logout" => "Abmelden",
			"link.entries" => "Planung",
			"link.roles" => "Dienste",
			"link.users" => "Benutzer",
			"link.schedules" => "Termine",
			"link.mylist" => "Meine Termine",
			"link.teamlist" => "Team Uebersicht",
			"table.noentries" => "Derzeit gibt es keine Eintraege!",
			"form.login" => "Anmelden",
			"form.password" => "Passwort",
			"button.login" => "Anmelden",
			"link.imprint" => "Impressum",
			"link.privacy" => "Datenschutz",
			"title.entrylist" => "Dienstplan",
			"title.welcome" => "Willkommen",
			"button.update" => "Aktualisieren",
			"table.header.entrylist" => "Termine / Dienste",
			"title.teamlist" => "Team Uebersicht",
			"table.header.roles" => "Dienste",
			"link.edit" => "...",
			"link.delete" => "x",
			"title.rolesite" => "Dienste",
			"label.newrole" => "Neuer Dienst",
			"button.add" => "ADD",
			"link.activities" => "Aktivitaeten",
			"link.resources" => "Ressourcen",
			"table.header.schedules" => "Termine",
			"label.newschedule" => "Neuer Termin",
			"label.scheduledescription" => "Beschreibung",
			"label.roledescription" => "Beschreibung",
			"label.userlogin" => "Benutzer Login",
			"label.userfirstname" => "Name",
			"label.userpass" => "Passwort",
			"label.userrole" => "Dienst",
			"table.header.users" => "Benutzer",
			"label.newuser" => "Neuer Benutzer",
			"title.users" => "Benutzer",
			"title.schedules" => "Termine",
			"label.category" => "Kategorie",
			"label.description" => "Beschreibung",
			"label.newactivity" => "Neue Aktivität",
			"table.header.activities" => "Aktivitäten",
			"table.header.resources" => "Ressourcen",
			"label.newresource" => "Neue Ressource",
			"title.resourcesite" => "Ressourcen",
			"title.activitysite" => "Aktivitäten");
	
   public static function tr($msgid, $lang = "de") {
   	 if (array_key_exists($msgid, self::$msg)){
       return self::$msg[$msgid];
     }
     return $msgid;
   }

   
}
