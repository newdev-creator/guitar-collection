# Front

## HomePage

| Url | Controller | Fonction | Methode | Remarque |
| -- | -- | -- | -- | -- |
| / | HomeController | Browse | GET | Afficher les 6 dernier Posts |
| /about | HomeController | - | - | Afficher une description du site |


## Collection

| Url | Controller | Fonction | Methode | Remarque |
| -- | -- | -- | -- | -- |
| /collection | CollectionController | Browse | GET | Afficher les guitares |
| /collection/{id} | HomeController | Read | GET | Afficher une guitare |


## Catégories

| Url | Controller | Fonction | Methode | Remarque |
| -- | -- | -- | -- | -- |
| /category | CategoryController | Browse | GET | Afficher les categories |
| /category/{id} | CategoryController | Browse | GET | Afficher toute les guitare d'une categorie |


## Marque

| Url | Controller | Fonction | Methode | Remarque |
| -- | -- | -- | -- | -- |
| /brand | BrandController | Browse | GET | Afficher les marques |
| /brand/{id} | BrandController | Browse | GET | Afficher toute les guitare d'une marque |


## Post

| Url | Controller | Fonction | Methode | Remarque |
| -- | -- | -- | -- | -- |
| /post | PostController | Browse | GET | Afficher les posts |
| /post/{id} | PostController | Read | GET | Afficher les posts trier par date descendent |




# BackOffice
