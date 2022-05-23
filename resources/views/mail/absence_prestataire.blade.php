<!DOCTYPE html>
<html>

<head>
    <title>Demande d'absence</title>
</head>

<body>
    <p>Bonjour {{ $user['last_name'] }} ,prestataire : <strong>{{ $user['last_name'] }}</strong></p>
    <p>Motif d'absence :<strong>{{ $user['motif_demande'] }}</strong></p>
    <p>Période : <strong>{{ date('d/m/Y', strtotime($user['date_demande'])) }}</strong> au
        <strong>{{ date('d/m/Y', strtotime($user['date_reprise'])) }}</strong>
    </p>
    <p>Durée : <strong>{{ date('H:i', strtotime($user['dure_absence'])) }}</strong></p>
    <a href="https://centralresource.net/login">Cliquez ici</a>
    <p>Merci de votre utilisateur de notre plateforme!</p>
</body>

</html>
