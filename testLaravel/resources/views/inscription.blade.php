<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<form action='/inscription' method="post">
    {{ csrf_field() }}
    <input type="string" name="pseudo" placeholder="pseudo">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="password" name="passwordConfirmation" placeholder="Mot de passe (confirmation)">
    <input type="submit" value="M'incrire">
</form>

</body>
</html>