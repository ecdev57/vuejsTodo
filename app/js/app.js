var vm = new Vue({
	el: "#todoapp",
	data: {
		//**************************************************************************************************************************************************************
		//todo
		//**************************************************************************************************************************************************************
		todos: [],
		newtodo: "",
		countTache:0,
		message:""
		
	},
	methods: {
		/*ajouter tache*/
		addTodo: function () {
			var self = this;
			console.log(self.newtodo)
			console.log(self.countTache)
			console.log( self.cocher)
			$.ajax({
				type: "POST",
				url: "server/adminTodo.php",
				data: {
					coche: self.cocher,
					count: self.countTache,
					notetodo: self.newtodo,
					action: "INSERT"
				},
				dataType: "json",
			}).done(function (result) { // si l'appel a bien fonctionné
				if (result.cont === "OK") {
					location.reload(); // then reload the page.(3)
				} else {
					alert("Problème lors de la modification" + result.cont);
				}
			});
		},
		//afficher contenu todo
		afficheContenutodo: function () {//affiche tous les contacts de la socété
			var self = this;
			$.ajax({
				type: "POST", // methode de transmission des données au fichier php
				url: "server/adminTodo.php", // url du fichier php   																														  
				data: {
					action: "SELECT"
				},
				dataType: "json",
				/*error: function (jqXHR, textStatus, errorThrown) {
					alert("Erreur lors de la modification" + jqXHR.responseText);
				}*/
			}).done(function (result) { // si l'appel a bien fonctionné
				if (result.cont === "OK") // si la connexion en php a fonctionnée
				{
					return self.todos = result.contenus;
					//return self.countTache = result.contT.counter_set;
				} else {
					alert("Problème lors de la modifications" + result.cont);
				}
			});
		},
		/*suppression d'une tache en fonction de son id*/
		removeTodo: function(index) {
			/*var self = this;*/
			var r = window.confirm("Confimer la suppression de ?");
			if (!r) {
				return;

			}
			$.ajax({
				type: "POST", // methode de transmission des données au fichier php
				url: "server/adminTodo.php", // url du fichier php   																														  
				data: {
					id: index,
					action:"DELETE"
				},
				dataType: "json",
				/*error: function (jqXHR, textStatus, errorThrown) {
					alert("Erreur lors de la modification" + jqXHR.responseText);

				}*/
			}).done(function (result) { // si l'appel a bien fonctionné
				if (result.cont === "OK") {
					document.location.reload();
				} else {
					alert("Problème lors de la modification" + result.cont);
					
				}
			});
		},
		/*cocher ou décocher des taches*/
		tacheTodo: function(id){
			var li = document.getElementsByTagName("LI");
    		li[id].classList.toggle("completed");
    		
		/*	var numItems = li.all(by.css('.completed')).count();
			self.countTache = numItems*/
		}
	}
})