<!DOCTYPE html>
<html>

<head>
    <title>Ad validation request </title>
</head>

<body>
    <p>Company : </strong>{{ $user['last_name'] }}</strong></p>
    <p>Title  :<strong>{{ $user['title_offer'] }}</strong></p>
    <p>Start date : <strong>{{ date('d/m/Y', strtotime($user['start_date'])) }}</strong>
    </p>
    <!-- <p>Date delai  : <strong>{{ date('d/m/Y', strtotime($user['end_date_delai'])) }}</strong></p> -->
    
    
    <a href="https://work4connect.com/admin/login">Click here for more details</a>
   
</body>

</html>
