<!DOCTYPE html>
<html xmlns="//www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
       <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Todo</title>
        <link rel="stylesheet" href="app/css/base.css">
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <body>
      <article id="todoapp">
          <header id="header">
          <h1>TodoList</h1>
          <form id="todo-form" v-on:submit="addTodo()">
            <input type="text" id="new-todo" placeholder="Ajouter une Nouvelle tâche" autofocus autocomplete="off" v-model="newtodo">
          </form>
        </header>
        <section id="main">
          <input type="checkbox" id="toggle-all">
          <ul id="todo-list">
            <li  v-for='(todo, index) in todos'>
               <div class="view">
                <input type="checkbox" class="toggle" v-model="todo.coche"  v-on:click="tacheTodo(index)">
                <label>{{todo.contenu}}</label>
                <button class="destroy" v-on:click="removeTodo(todo.id)"></button>
              </div>
              <form action="#">
                <input class="edit" value="Etendre le linge">
              </form>
            </li>
          </ul>
        </section>
          <footer id="footer">
          <span id="todo-count"><strong>{{todos.length}}</strong> Totale de tâches</span>
         <!--  <ul id="filters">
            <li><a href="#/" ng-class="{selected: location.path() == '/'}">Toutes</a></li>
            <li><a href="#/active" ng-class="{selected: location.path() == '/active'}">Active</a></li>
            <li><a href="#/done" ng-class="{selected: location.path() == '/done'}">Finit</a></li>
          </ul> -->
        </footer>
      </article>
  



      <script src="app/components/jquery/dist/jquery.min.js"></script>
<script src="app/components/jquery-ui/jquery-ui.min.js"></script>

      <script type="text/javascript" src="app/components/vue/dist/vue.js"></script>
      <script type="text/javascript" src="app/js/app.js"></script>  
     <script type="text/javascript">
       vm.afficheContenutodo();
     </script>
    </body>
</html>
