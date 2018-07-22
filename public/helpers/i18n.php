<?php

class I18n {
    
	private static  $msg = 
		array("button.save" => "Speichern",
			"title.login" => "Anmelden",
			"link.administration" => "Administration",
			"link.logout" => "Abmelden",
			"link.entries" => "Planung",
			"link.roles" => "Rollen",
			"link.users" => "Benutzer",
			"link.schedules" => "Termine",
			"link.mylist" => "Meine Termine",
			"link.teamlist" => "Team Uebersicht",
		"form.login" => "Anmelden",
		"form.password" => "Passwort",
		"button.login" => "Anmelden",
		"link.imprint" => "Impressum",
		"link.privacy" => "Datenschutz",
		"title.entrylist" => "Meine Termine",
		"button.update" => "Aktualisieren",
		"table.header.entrylist" => "Termine / Rollen",
		"title.teamlist" => "Team Uebersicht",
		"table.header.roles" => "Rollen",
		"link.edit" => "...",
		"link.delete" => "x",
		"title.rolesite" => "Rollen",
		"label.newrole" => "Neue Rolle",
		"button.add" => "Hinzufuegen",
		"table.header.schedules" => "Termine",
		"label.newschedule" => "Neuer Termin",
		"label.scheduledescription" => "Beschreibung",
		"label.roledescription" => "Beschreibung",
		"label.userlogin" => "Benutzer Login",
		"label.userfirstname" => "Name",
		"label.userpass" => "Passwort",
		"label.userrole" => "Rolle",
		"table.header.users" => "Benutzer",
		"label.newuser" => "Neuer Benutzer",
		"title.users" => "Benutzer",
		"title.schedules" => "Termine");
	
   public static function tr($msgid, $lang = "de") {
   	 if (array_key_exists($msgid, self::$msg)){
       return self::$msg[$msgid];
     }
     return $msgid;
   }

   
}
