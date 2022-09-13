<!DOCTYPE html>
<html>

<head>
    <title>Demande de formation</title>
</head>

<body>
    <p>Bonjour {{ $user['last_name'] }}, prestataire : <strong>{{ $user['last_name'] }}</strong></p>
    <p>Motif de formation :<strong>{{ $user['motif_dem_for'] }}</strong></p>
    <p>Description : <strong>{{$user['description_dem_for'] }}</strong> </p>

    <a href="https://centralresource.net/login">Cliquez ici</a>
    <p>Merci pour votre utilisation de notre plateforme!</p>
</body>

</html>
