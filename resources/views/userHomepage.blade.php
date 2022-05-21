<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Booking System</title>

    <style>
        .home{
            background-color: grey;
            margin: 1%;
            padding: 1%;
            padding-left: 2%;
            padding-right: 2%;
        
        }

        #page-container{
            position: relative;
            min-height: 100vh;
        }

        h1{
            font-family: Arial, Helvetica, sans-serif;
            color: blue;
            text-align: center;

        }

        .Display table{
            width: 1800px;
            height: 500px;
            border: 2px solid;
        }

        .Display img{
            width: 350px;
            height: 450px;
            display: inline-block;
            padding: 25px;
        }

        .Display td{
            font-size: 15px;
            color: #30BCED;
            text-align: center;
            padding-top: 0px;

        }

        .Display th{
            font-family: Arial, Helvetica, sans-serif;
            color: #191D32;
            font-size: 18px;
            text-align: left;;
        }

    </style>

</head>
<body style="background-color: rgb(173, 173, 173);">
    {{ View::make('userHeader') }}

    <div class="home">
        <div class="Display">
            <table>
                <tr>
                    <th colspan="4" style="color: rgb(0, 0, 0); font-size: 30px;text-align:center" >New Release</th>
                </tr>
                <tr>
                    <td rowspan="3" ><img src="{{ url('/Picture/Dark Psycho.jpg') }}" /></td>
                    <th style="width: 530px;">DARK PSYCHOLOGY: Dark Hypnosis Technique To Manipulation Human Psychology, Deception, Subliminal Persuasion And Mind Control</th>
                    <td rowspan="3" ><img src="{{ url('/Picture/Screenshot 2022-05-20 103621.png') }}"/></td>
                    <th>THE ART OF A LAWYER - CROSS EXAMINATION | ADVOCACY | COURTMANSHIP</th>
                </tr>
                <tr>
                    <th>By :Ryan Watson<br><br></th>
                    <th>By :Chief Justice M. Monir , Dr. B. Malik</th>
                </tr>
                <tr>
                    <th>Price : 60.00</th>
                    <th>Price : 250.00</th>
                </tr>   
            </table>
        </div>
        <br>
        <div class="Display">
            <table >
                <tr>
                    <th colspan="4" style="color: rgb(0, 0, 0); font-size: 30px;text-align:center">Top Sale</th>
                </tr>
                <tr>
                    <td rowspan="3"><img src="{{ url('/Picture/Screenshot 2022-05-20 104415.png') }}" /></td>
                    <th>MODERN ADVOCACY - MORE PERSPECTIVES FROM<br> SINGAPORE</th>
                    <td rowspan="3"><img src="{{ url('/Picture/Screenshot 2022-05-20 104600.png') }}" /></td>
                    <th>FUNDAMENTALS OF TRIAL TECHNIQUE 4TH AUSTRALIAN ED</th>
                </tr>
                <tr>
                    <th>By :Elearnor Wong, Lok Vi Ming,<br> The Honourable Justice Vinodh Coomaraswamy</th>
                    <th>By : Thomas A Mauet, Les A. McCrimmon</th>
                </tr>
                <tr>
                    <th>Price : 310.00</th>
                    <th>Price : 350.00</th>
                </tr>   
            </table>
        </div>
    </div>

    {{ View::make('footer') }}
</body>
</html>