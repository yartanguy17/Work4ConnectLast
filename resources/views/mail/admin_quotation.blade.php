<!DOCTYPE html>
<html>

<head>
    <title>Notification de requête d'un visiteur</title>
</head>

<body>
    <h2>Bonjour Admin</h2>
    {{-- <p>Un visiteur souhaite {{ $quotation->type['title_type_quo'] }}.</p> --}}
    <p>La requête ID est le : {{ $quotation['id'] }} </p>
    <p>Veuillez vous connecter à votre espace d'administration pour consulter sa requête svp!</p>
</body>

</html>
