<!DOCTYPE html>
<html>

<head>
    <title>Notification de candidature à une offre</title>
</head>

<body>
    <h2>Bonjour Admin</h2>
    <p>Le prestataire {{ $user['last_name'] . '  ' . $user['first_name'] }} vient de postuler à
        {{ $offer['title_offer'] }}.</p>
    <p>Veuillez vous connecter pour traiter la demande svp</p>
    <a href="https://centralresource.net/admin/login">Cliquez ici</a>
</body>

</html>
