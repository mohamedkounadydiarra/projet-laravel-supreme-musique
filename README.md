ENTITES*******************

User
Album
Song
Order
OrderItem
Category
Article


# MISE EN PLACE DES GAURDS ET RÖLES (Admin vs Utilisateur)
1. Ajout d'un champs is_admin dans la table users
2. Création d'un middleware IsAdmin
3. Configuration du dashboard avec sidebar pour gérer albums, chansons,etc.
4 . Création des vues d'administration avec les action CRUD