# Front



## Login
| url          | controller | fonction | methode | remarque                                  |
| ------------ | ---------- |--------|---------|-------------------------------------------|
| /login | SecurityController | login       | -       | Permet à un utilisateur de se connecter   |
| /logout | SecurityController | logout       | -       | Permet à un utilisateur de se déconnecter |
| /login/inscription | SecurityController | loginInscription       | -       | Permet à un utilisateur de s'inscrire     |

## HomePage

| url          | controller | fonction | methode | remarque                      |
| ------------ | ---------- | -------- | ------- | ----------------------------- |
| / | HomeController | homePage | GET | Afficher les 6 dernier Posts |


## Collection

| Url | Controller | Fonction | Methode | Remarque              |
| --- | --- | --- | --- |-----------------------|
| /collection | CollectionController | collectionPage | GET | Afficher les guitares |
| /collection/{id} | CollectionController | show | GET | Afficher une guitare  |


## Marque

| Url | Controller | Fonction | Methode | Remarque                                |
| --- | --- |----------| --- |-----------------------------------------|
| /brand | BrandController | brandPage   | GET | Afficher les marques                    |
| /brand/{id} | BrandController | show     | GET | Afficher toute les guitare d'une marque |


## Post

| Url | Controller | Fonction | Methode | Remarque |
| --- | --- | --- | --- |-----------------------------------------|
| /post | PostController | postPage | GET | Afficher les posts |
| /post/{id} | PostController | show | GET | Afficher les posts trier par date descendent |




# BackOffice

## Marques
| Url                           | Controller | Fonction | Methode | Remarque             |
|-------------------------------| --- |----------|---------|----------------------|
| /backOffice/brand             | BrandController | Browse   | GET     | Afficher les marques |
| /backOffice/brand/read/{id}   | BrandController | read     | GET     | Afficher une marque  |
| /backOffice/brand/edit/{id}   | BrandController | edit     | GET POST | Modifier une marque  |
| /backOffice/brand/add/        | BrandController | add      | GET POST | Ajout une marque     |
| /backOffice/brand/delete/{id} | BrandController | delete   | GET | Supprime une marque  |

## Categories
| Url                           | Controller | Fonction | Methode | Remarque               |
|-------------------------------| --- |----------|---------|------------------------|
| /backOffice/category             | CategoryController | Browse   | GET     | Afficher les categories |
| /backOffice/category/read/{id}   | CategoryController | read     | GET     | Afficher une categorie |
| /backOffice/category/edit/{id}   | CategoryController | edit     | GET POST | Modifier une categorie |
| /backOffice/category/add/        | CategoryController | add      | GET POST | Ajout une categorie    |
| /backOffice/category/delete/{id} | CategoryController | delete   | GET | Supprime une categorie |

## Collection
| Url                           | Controller | Fonction | Methode | Remarque                 |
|-------------------------------| --- |----------|---------|--------------------------|
| /backOffice/collection             | CollectionController | Browse   | GET     | Afficher les collections |
| /backOffice/collection/read/{id}   | CollectionController | read     | GET     | Afficher une collection   |
| /backOffice/collection/edit/{id}   | CollectionController | edit     | GET POST | Modifier une collection   |
| /backOffice/collection/add/        | CollectionController | add      | GET POST | Ajout une collection      |
| /backOffice/collection/delete/{id} | CollectionController | delete   | GET | Supprime une collection   |

## Post
| Url                           | Controller | Fonction | Methode | Remarque                |
|-------------------------------| --- |----------|---------|-------------------------|
| /backOffice/post             | PostController | Browse   | GET     | Afficher les posts      |
| /backOffice/post/read/{id}   | PostController | read     | GET     | Afficher un post        |
| /backOffice/post/edit/{id}   | PostController | edit     | GET POST | Modifier un post  |
| /backOffice/post/add/        | PostController | add      | GET POST | Ajout un post     |
| /backOffice/post/delete/{id} | PostController | delete   | GET | Supprime un post  |

## User
| Url                           | Controller | Fonction | Methode | Remarque                  |
|-------------------------------| --- |----------|---------|---------------------------|
| /backOffice/user             | UserController | Browse   | GET     | Afficher les utilisateurs |
| /backOffice/user/read/{id}   | UserController | read     | GET     | Afficher un utilisateur          |
| /backOffice/user/edit/{id}   | UserController | edit     | GET POST | Modifier un utilisateur          |
| /backOffice/user/add/        | UserController | add      | GET POST | Ajout un utilisateur             |
| /backOffice/user/delete/{id} | UserController | delete   | GET | Supprime un utilisateur          |

