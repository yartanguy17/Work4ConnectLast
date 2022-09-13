<!DOCTYPE html>
<html>

<head>
    <title>Demande de congé</title>
</head>

<body>
    <p>Bonjour {{ $user['last_name'] }}, prestataire : <strong>{{ $user['last_name'] }}</strong></p>
    <p>Motif de congé :<strong>{{ $user['motif_conge'] }}</strong></p>
    <p>Période : <strong>{{ date('d/m/Y', strtotime($user['date_demande_conge'])) }}</strong> au
        <strong>{{ date('d/m/Y', strtotime($user['date_return_conge'])) }}</strong>
    </p>
    <p>Nombre de jours : <strong>{{ $user['number_day'] }}</strong></p>
    <a href="https://centralresource.net/login">Cliquez ici</a>
    <p>Merci de votre utilisateur de notre plateforme!</p>
</body>

</html>
