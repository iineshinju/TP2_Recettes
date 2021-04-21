<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# TP2 Recettes

## Installation

Il faut télécharger Laravel avec composer.
Nous avons créer un nouveau project dans le terminal avec les commandes suivantes : composer create-project laravel/laravel TP2_Recettes
Puis nous nous sommes déplacer dans le dossier avec : cd TP2_Recettes
Puis nous avons entré la commande suivante : php artisan serve
Ensuite, nous avons ouvert notre site à l'adresse : <a href="http://localhost:8000">http://localhost:8000</a>

## Création de routes, contrôleurs, modèles et vues

### Créer un contrôleur basique

Nous avons ouvert le fichier routes/web.php et y avons commenter le code suivant :
Route::get('/', function () {
   return view('welcome');
});

Puis nous avons ajouté les codes suivants :
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index']);

Nous avons ensuite créé le contrôleur Home, puis avons lancé la commande suivante dans un nouveau terminal :
php artisan make:controller HomeController

Le controlleur à automatiquement été créé dans le répertoire.

Nous avons éditer HomeController en ajoutant à la fonction index les lignes suivantes :
return view('welcome');

### Créer un layout global pour les vues

Nous avons créé à la main le fichier resources/views/layouts/main.blade.php et y avons ajouté le code HTML de la template HTML “Blog Single Column”.
Nous avons supprimé les blocs HTML en commentaires ainsi que tout le code HTML contenu dans la balise <article class="grid-container">, c'est-à-dire le code HTML de la ligne 58 à 117 et nous l'avons remplacé par le code blade suivant: @yield('content').
Nous avons ensuite modifié les balises title, h1 et h2 pour convenir avec le sujet de notre site.
Puis nous avons vérifier si ce que nous avions écrit correspond au code layout de ce site : https://gist.github.com/flody/db26a75104354ab994bdffa370bd94a9 .

Nous avons modifié le fichier resources/views/welcome.blade.php avec les codes suivant pour utiliser notre layout : 
@extends('layouts/main')
@section('content')
<h1>Home</h1>
@endsection

Puis nous avons modifié le fichier layout pour avoir un menu: Home / Recettes / Contact (ligne 20 à 22 du layout).
Ensuite, nous avons modifié le fichier routes/web.php pour prendre en compte ces deux nouvelles URLs (Recettes et Contact) et nous avons créé 2 contrôleurs, un pour recettes (php artisan make:controller RecettesController) et un pour contact (php artisan make:controller ContactController).
Puis nous avons créé manuellement 2 vues pour les fonctions d’index des contrôleurs recettes et contact qui utilisent le layout principal.

## Base de données

Nous avons créé manuellement un fichier database.db dans le répertoire database/ de l’application et avons modifié le fichier .env pour spécifier l’utilisation de SQLite et le chemin d’accès au fichier: 
DB_CONNECTION=sqlite
DB_DATABASE=TP2_Recettes/database/database.db

Puis nous avons lancé les migrations de base, dans le terminal, avec : php artisan migrate

### Créer les tables recipes et contacts

Nous avons créé 3 migrations avec les commandes suivantes:
php artisan make:migration create_recipes_table
php artisan make:migration create_contact_table 
php artisan make:migration create_comments_table 

Nous avons créé de faux utilisateur, puis nous avons réinitialisé notre base de données et lancer l’insertion de données avec la commande: php artisan migrate:fresh --seed

## Création des modèles et utilisation d’Eloquent

### Les modèles Recipe, Comment et Contact

Nous avons créé 3 modèles Recipe, Contact et Comment à l’aide de la commande artisan make:model :
php artisan make:model Recipe
php artisan make:model Contact
php artisan make:model Comment

Dans chaque model, nous avons précisé le nom de table de la base de données avec protected $table = 'recipes'; protected $table = 'comments'; protected $table = 'contacts';

Nous avons ensuite modifié les 3 migrations pour ajouter toutes les colonnes présentes dans le schéma de base de données donné dans le sujet.
Puis nous avons fait un : php artisan migrate:fresh --seed

### Lier les modèles User et Recipe

Nous avons ajouté dans le modèle Recipe la fonction permettant d'obtenir un auteur :
public function author(){
    return $this->belongsTo(User::class,'author_id');
}

Nous avons ensuite créer une Factory pour recipe pour lui donner de fausses données.
Nous avons complété la fonction definition() avec les colonnes de la table recipes. Puis, dans database/seeders/DatabaseSeeder.php, nous avons généré des utilisateurs avec des recettes avec les codes disponible dans factory, puis avons lancé : php artisan migrate:fresh --seed -v

### Afficher la liste de recettes sur la page d’accueil

Nous avons utilisé le code disponible dans le sujet pour afficher les 3 dernières recettes de notre base de données.
Les codes sont retrouvable dans welcome.blade.php

## Afficher une recette

Nous avons créé une nouvelle route dans le fichier routes/web.php, pour pouvoir récupérer la recette demandée : Route::get('/recettes/{url}',[RecipesController::class, 'show']);

Ensuite, dans le controller RecettesController, avons rajouté les lignes suivantes :
public function show($recipe_name) {
   $recipe = \App\Models\Recipe::where('recipe_name',$recipe_name)->first(); //get first recipe with recipe_nam == $recipe_name
  
   return view('recipes/single',array( //Pass the recipe to the view
       'recipe' => $recipe
   ));

Nous avons créé manuellement une vue recipes/single et avons ajouté le code de la template d'origine avec l'affichage de la recette.

## Formulaire de contact

Nous avons créé une page de formulaire contact en utilisant @csrf pour pouvoir stocker les contacts dans la base de données.
Nous pouvons le tester en créant un nouveau contact sur la page localhost:800/contact .

Pour voir toutes les demandes de contact, aller sur la page localhost:800/contact/all .

### Le CRUD d’une recette

Nous avons créé un CRUD d'une recette, pour celà, nous avons supprimer notre controller RecettesController et avons fait le code suivant pour faire le binding entre le controlleur et le model:
php artisan make:controller -r RecettesController -m “Recipes”

Puis nous avons avec difficulté remplit les fonctions du controlleur.

Nous pouvons tout retrouvé dans le controlleur RecettesController.

## Erreurs

Nous avons eu beaucoup d'erreurs.
Dans create_recipes_table, nous avons dû mettre un default(NULL) pour tag sinon il y avait des erreurs par la suite.

# Projet

## Optionnel

Nous avons ajouté dans la page d'index de la recette (recettes.blade.php), des liens vers les pages de toutes nos recettes de notre base de données.
Nous avons ajouté un titre à welcome.blade.php .
Nous avons ajouté un lien pour modifier la recette, mais nous n'avons malheureusement pas réussi à faire en sorte qu'elle n'apparaisse que lorsque nous sommes sur l'url /admin/recettes.

## Identification / Authentification qui protège l'accès à l’administration

Nous avons écrit dans un terminal :
composer require laravel/ui --dev
puis :
php artisan ui vue --auth
puis :
npm install
Nous avons eu plein d'erreur, car il manquait des packages, mais après avoir chercher et les avoir tous installer, nous avons eu la page d'authentification.
Pour la tester, nous devons tout d'abord créer un nouvel utilisateur avec Register, puis se login.
Nous avons changer le .env pour permettre la création d'un nouveau mot de passe.
MAIL_MAILER=log

Nous avons ajouter sur la page lorsque l'utilisateur est loggé les liens vers la création de recettes, vers la modification de la recette et vers tous les demandes de contacts.

## Ajout de fichiers média pour les recettes

Nous avons ajouté un bouton ajout de fichier image sur le recipes/create.blade.php et le recipes/edit.blade.php .

Puis nous avons ajouter créé une nouvelle migration avec : php artisan make:migration add_image_to_recipes, puis : php artisan migrate
Cela, nous permet de rajouter un point sur la migration sans modifier celle pré-existante.

Puis nous avons lié le storage avec : php artisan storage:link
//Ces commandes ont été vu sur une vidéo youtube pour upload des fichiers avec laravel.

Nous avons changer la vue single.blade.php pour ajouter une image si l'attribut image de la table recipes n'est pas NULL.

## Gestion des commentaires

Nous avons créé un Controller CRUD avec la commande:
php artisan make:controller Commentaires —resource
Pour récupérer author-id et recopie-id, nous avons utilisé la méthode store, en faisant 
$recipe =\App\Models\Recipe::where(‘url’, $requeste->url())->first();
$comments = new Comment();
$comments->author_id = $recipe->author_id;
$comments->recipe_id = $recipe->id;
$comments->pseudo = $validated([‘pseudo]);
$comments->content= $validated([‘content]);
Cette ligne à priori nous permet de trouver le author-id et le recipe-id correspondants, 
Mais à la création de notre base de données recipe, l’url ne va pas s’actualiser automatiquement. 
Du coup, cette ligne est censé de fonctionner ne nous amène pas sur la recette correspondante. 
Nous ne pouvons pas changer les urls qui sont déjà dans notre de base de données. 

# Commentaires générales

## Ressentit de l'équipe

### Avis 1
Nous avons eu beaucoup de difficultés avec ce projet, les erreurs n'avaient pas toujours de solutions sur Google, il fallait bien réfléchir pour voir où pouvait être nos erreurs.
La prise en main de laravel demande tout de même beaucoup de pratique, car même en suivant le cours, ça n'a pas été facile de tout comprendre et de faire par nous même. Mais malgré plusieurs blocages tout le long du projet, nous avons réussi à rendre quelques choses, malgré des erreurs non résolu.

### Avis 2
C’est un projet très interessant et enrichissant , je pense que si j’aie une meilleure connaissances de PHP sera mieux pour compléter le projet. J’aurai plus de cours avec vous, car je serai diplômé après, mais après sans la date limite de rendu, je serai plus ZEN et relaxe pour le faire. 

## Probleme Git

Nous avons eu beaucoup de problème de git, nous avons du git l'une après l'autre en récupérant tout le temps le git de l'autre pour pouvoir continuer.
Et la seule fois où nous ne l'avons pas fait, il y avait des conflits qu'on n'a pas su régler. Mais au final, chacune a pu git son travail au fur et à mesure. 
