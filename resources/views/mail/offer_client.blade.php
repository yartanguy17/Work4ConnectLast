<!DOCTYPE html>
<html>

<head>
    <title>Demande de validation d'offre </title>
</head>

<body>
    <p>Bonjour {{ $user['last_name'] }}, client : <strong>{{ $user['last_name'] }}</strong></p>
    <p>Titre de l'offre  :<strong>{{ $user['title_offer'] }}</strong></p>
    <p>Profile   :<strong>{{ $user['profile'] }}</strong></p>
    <p>Période : <strong>{{ date('d/m/Y', strtotime($user['start_date'])) }}</strong>
    </p>
    <p>Date delait  : <strong>{{ date('d/m/Y', strtotime($user['end_date_delai'])) }}</strong>
    </p>
    
    <a href="https://centralresource.net/login">Cliquez ici</a>
    <p>Merci pour l'utilisation de notre plateforme!</p>
</body>

</html>
