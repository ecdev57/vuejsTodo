<?php
require_once 'inc/bootstrap.php';
$db = App::getDatabase();
$action = $_POST['action'];
if($action == "INSERT") {
	/*on inscrit les valeurs à insérer*/
	$contenu = htmlentities($_POST['notetodo']);
	$date = date("Y-m-d H:i:s"); 
	$todo= $db->query("INSERT INTO `todolist` SET `contenu` = ?,  `date` = ?", [$contenu, $date]);
	if ($todo) {
		$reponse["cont"] = "OK";
	} else {
		$reponse["sql"] = "message";
	}
} else if($action == "SELECT") {
	 $reponse["contenus"]=array();
	  $reponse["contenusT"]=array();
	
	 $result = $db->query("SELECT * FROM `todolist`")->fetchAll();
	 $result1 = $db->query("SELECT COUNT(*) FROM `todolist`")->fetch();
	 	
        if ($result){
            $reponse["cont"] = "OK";
        }
        if ($result1){
            $reponse["cont"] = "OK";
        }
		$reponse["contenus"]=$result;
		$reponse["contenusT"]=$result1;
} else if ($action == "DELETE") {
       $id = $_POST['id'];
        // on exécute maintenant la requete sql pour tester si les parametres de connexion sont ok
        $result = $db->query("DELETE FROM`todolist` WHERE id  = $id");
        if ($result) {
            $reponse["cont"] = "OK";
        } 
} else if ($action == "EDITTEXT") {
       $id = $_POST['id'];
       $contenu = htmlentities($_POST['notetodo']);
	$date = date("Y-m-d H:i:s");
        // on exécute maintenant la requete sql pour tester si les parametres de connexion sont ok
        $result = $db->query("UPDATE `todolist`  SET `contenu` = ?,  `date` = ? WHERE id  =?",[$contenu, $date, $id]);
        if ($result) {
            $reponse["cont"] = "OK";
        } 
}
print json_encode($reponse);