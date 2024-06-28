<!DOCTYPE html>
@php
    $ticket = \App\Models\PromoEntry::query()->where('_id', $id)->first();
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #ffffff;
            background: linear-gradient(to bottom, rgba(0, 183, 240, 0.8), rgba(0, 32, 94, 0.8));
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background:  rgba(0,0,0, .2); /* Adjust the rgba values for transparency */
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #00205e;
            font-size: 32px;
            margin-bottom: 15px;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            padding: 12px 32px;
            background-color: #00205e;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0048a3;
        }

        @media only screen and (max-width: 600px) {
            .container {
                width: 100%;
                border-radius: 0;
                box-shadow: none;
                padding: 15px;
            }

            h1 {
                font-size: 15px;
                margin-bottom: 10px;
            }

            p {
                font-size: 16px;
                margin-bottom: 15px;
            }

            .button {
                padding: 10px 24px;
            }
        }

        .gradient-text {
            font-size: 20px;
            color: #00205e;
            background: linear-gradient(to right, rgba(255,255,255, 0.7) 50%,  rgba(255,255,255, 0.7) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body style="height: 100%">
<div class="container">
    <div style="">
        <img src="{{$message->embed(public_path('TP_Koop_en_Win_KopText.png'))}}" style="width: 200px; float: left" width="200px" alt="">
{{--        <img src="{{asset('TP_Koop_en_Win_KopText.png')}}" style="width: 200px; float: left" width="200px" alt="">--}}
        <div>
            <strong class="gradient-text" style="float: right; color: white">#{{$ticket->code}}</strong>
        </div>
    </div>
    <p style="font-size: 20px">Hi {{$ticket->firstname}},</p>
    <p style="font-size: 15px">Your promo code has been submitted</p>
    <div class="footer">
    </div>
</div>
</body>
</html>
