<!DOCTYPE html>
<html>

<head>
    <title>Notification de publication en attente</title>
</head>

<body>
    <h2>Bonjour Admin</h2>
    <p>Un client du nom {{ $user['last_name'] }} de vient de publier une nouvelle offre de prestation qui a été mise en
        attente de validation.</p>
    <p> Le titre de l'offre est : {{ $offer['title'] }}.</p>
    <p>Veuillez vous connecter à votre espace d'administration pour la modération svp!</p>
</body>

</html>
