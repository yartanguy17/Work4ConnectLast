<!DOCTYPE html>
<html>
  <head>
    <title>Notification de publication</title>
  </head>
  <body>
    <h2>Bonjour {{$user['first_name']}}</h2>
    <p>Votre publication d'offre de prestation dont le titre est : {{$offer['title_offer']}} soumis le : {{$offer->created_at->format('d/mY')]}}
    vient d'être publiée sur notre site.</p>
    <p>Vous pourriez la consulter via ce<a href="https://centralresource.net/login">lien</a></p>
    <p>Merci de nous avoir fais confiance!</p>
  </body>
</html>
