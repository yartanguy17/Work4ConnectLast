<!DOCTYPE html>
<html>

<head>
    <title>Notification de reservation d'un prestataire</title>
</head>

<body>
    <h2>Bonjour Admin</h2>
    <p>Le client {{ $reservation['last_name'] }} {{ $reservation['first_name'] }} demande a etre mis en relation
        avec
        le
        pretataire {{ $reservation['last_name'] }} {{ $reservation['first_name'] }}.</p>
    <p>Veuillez vous connecter a l'interface admin pour...</p>
    <a href="https://centralresource.net/admin/login">Cliquez ici</a>
</body>

</html>
