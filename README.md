# Billetterie pour le Vercors Music Festival

Le site permet de remplir un formulaire et d'enregistrer sa réservation dans un fichier CSV. Puis d'accèder à un tableau de bord avec un mot de passe administrateur qui permet de voir la liste des réservations.

Les thèmes abordés étaient la gestion de session, l'écriture dans un fichier .CSV. Mais aussi la vérification et "sanitization" des données entrées par l'utilisateur, dans un premier temps côté front en Javascript avant l'envoie du formulaire puis dans un second temps, côté back avec des filtres PHP. En faisant attention à la "separation of concern" et en prenant soin de donner un feedback en temps réel à l'utilisateur pour l'accompagner pendant sa réservation.

## Contexte du projet
En tant que developpeur full stack, vous utiliserez le HTML fourni en lui ajoutant de JS et du CSS, puis vous réaliserez le traitement et l'enregistrement des données en back.

### COTÉ FRONT

Vous devez mettre en forme et animer les sections, pour les faire apparaitre au clic sur suivant.
Vous devrez vérifier la valeur des champs avant soumission, animer les transitions des questions, ...
Faire une page admin, depuis laquelle on pourra voir la liste de toutes les réservations. Pour y accéder, il suffira de rentrer le bon mot de passe.
​

### COTÉ BACK

Vous recevez les données en post, vous devez les analyser avant toute utilisation en back (sécurité, formatage, ...)
Si le formulaire n'est pas complet, on le renvoie, avec une erreur.
Vous traiterez les données reçues, et lorsque tout le formulaire sera rempli et soumis, alors vous l'enregistrerez dans un fichier CSV.
Une fois que tout est validé, vous renvoyez à l'utilisateur un message récapitulatif avec ses informations choisies, et le total du prix à payer.
