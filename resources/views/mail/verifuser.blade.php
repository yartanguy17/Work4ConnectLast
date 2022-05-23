<!DOCTYPE html>
<html>

<head>
    <title>E-mail de bienvenue</title>
</head>

<body>
    <h2>Bonjour {{ $user['last_name'] }}</h2>
    <br />
    Votre adresse e-mail enregistrée est : {{ $user['email'] }} ,Veuillez cliquer sur le lien ci-dessous pour vérifier
    votre compte de messagerie
    <br />
    <a href="{{ url('user/verify', $user['email_token']) }}">{{ url('user/verify', $user['email_token']) }}</a>
    <p>Merci pour votre inscription.</p>
</body>

</html>
