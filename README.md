# mini MVC
## Installation
* Créez une base de données et importez mini_website.sql.
* Dupliquer le fichier .env.example en .env et le modifier pour mettre les données de votre base de données.
* Mettre à jour le menu

## Todo: 
### On veut afficher une page à propos
* Créer un nouveau fichier templates/page/about.php avec header, footer and a h1 about
* Adapter le PageController.php pour gérer cette page
##  Nous voulons créer une page listant tous les articles de la base de données
* Vous devez créer Article.php (entity) en vous basant sur ce qui a été fait dans User.php
* Vous devez créer ArticleRepository.php et à l'intérieur, ajouter une méthode avec une requête pour récupérer tous les articles.
* Vous devez créer ArticleController.php qui appellera le repository et retournera le résultat à la vue.
* Vous devez créer la vue dans templates/article/list.php qui affiche uniquement le titre de l'article et un lien "Lire plus"
* Mettre à jour le menu
* On veut ensuite affiche le détail d'un article (quand on clique sur Lire plus")
  * Il faudra créer une action show qui récupère un article et le retourne à la vue
* En dessous du détail d'un article
  * afficher les commentaires existants
  * Si l'utilisateur est connecté, lui permettre de commenter
---

# mini MVC (english)
## Installation
* Create a database and import mini_website.sql
* Duplicate the .env.example file into .env and modify it to put your database data.

## Todo: 
### We want to have a new about page
* Create a new file in templates/page/about.php with header, footer and a h1 about
* Adapt the PageController.php to manage this page
* Update the menu
### We want to create a page listing all articles from the database
* You need to create Article.php (entity) following the same structure as in User.php
* You need to create ArticleRepository.php and inside add a method with a query to get all articles
* You need to create ArticleController.php that will call the repository and return the result to the view
* You need to create the view in templates/article/list.php. Display only the title and a Read More link
* Update the menu
* We want to display the article details when we click on Read More
  * For that we need to create an action show in ArticleController that will get the article and pass it to the view
* Below the article details
  * Display the comments
  * If the user is connected, allow him to add a comment

