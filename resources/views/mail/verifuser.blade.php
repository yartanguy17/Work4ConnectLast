<!DOCTYPE html>
<html>

<head>
    <title>Welcome Email</title>
</head>

<body>
    <h2>Hello {{ $user['last_name'] }} ! </h2>
    <br />
    Your registered email address is : {{ $user['email'] }} ,Please click the link below to verify your email account 
    <br />
    <a href="{{ url('user/verify', $user['email_token']) }}">{{ url('user/verify', $user['email_token']) }}</a>
    <p>Thank you for your registration.</p>
</body>

</html>
