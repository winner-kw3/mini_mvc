# mini MVC
## Installation
* Créez une base de données et importez mini_website.sql.
* Dupliquer le fichier .env.example en .env et le modifier pour mettre les données de votre base de données.

## À faire : Nous voulons créer une page listant tous les articles de la base de données
* Vous devez créer Article.php (entity) en vous basant sur ce qui a été fait dans User.php
* Vous devez créer ArticleRepository.php et à l'intérieur, ajouter une méthode avec une requête pour récupérer tous les articles.
* Vous devez créer ArticleController.php qui appellera le repository et retournera le résultat à la vue.
* Vous devez créer la vue dans templates/article/list.php.

---

# mini MVC (english)
## Installation
* Create a database and import mini_website.sql
* Duplicate the .env.example file into .env and modify it to put your database data.

## Todo: We want to create a page listing all articles from the database
* You need to create Article.php (entity) following the same structure as in User.php
* You need to create ArticleRepository.php and inside add a method with a query to get all articles
* You need to create ArticleController.php that will call the repository and return the result to the view
* You need to create the view in templates/article/list.php

