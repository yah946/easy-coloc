<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            background-color: #101828;
            color:aliceblue;
        }
        a{
            background-color: deepskyblue;
            text-decoration: none;
            padding: 4px;
            border-radius: 6px;
        }
    </style>
    <p>Hi there,</p>
    <p>We'd love for you to join our colocation! Click the link below to accept the invitation:</p>
    <a href="{{ $invitationUrl }}">Accept Invitation</a>
    <p>Looking forward to having you with us!</p>
    <p>Best,{{ auth()->user()->name}}</p>
</body>
</html>