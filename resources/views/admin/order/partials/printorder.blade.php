<?php $total = 0;  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Receipt</title>
    <style>
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
        }
        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
            text-align:center;
        }

        td.description,
        th.description {
            width: 75px;
            max-width: 75px;
        }

        td.quantity,
        th.quantity {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 155px;
            max-width: 155px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

            @media print {
            .hidden-print,
                .hidden-print * {
                display: none !important;
                } 
                
            }
        

    </style>
</head>

<body>
    <div class="ticket">
        <img src="{{ asset('logo.jpg') }}" alt="Logo">
        <p class="centered">Naeem Kiosk, Hauptstrasse 40 
            <br>4438 Langenbruck
            <br>Table / Plate
            <br> 
            <span style="font-weight:900 ;">
            @if($data->table)
                {{ $data->table->location ? $data->table->location->name.' | ': '' }}  {{ $data->table->table_number ?? '' }}
            @else
                {{ $data->plate }}
            @endif
            </span>
            </p>
        <table>
            <thead>
                <tr>
                    <th class="quantity">Q.</th>
                    <th class="name">Name</th>
                    <th class="price">$$</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data->orderDetail as $item)
            <?php $total += ($item->food->price*$item->piece); ?>
                <tr>
                    <td class="quantity">{{ $item->piece }}</td>
                    <td class="foodname">{{ $item->food->name }}</td>
                    <td class="price">{{ $item->food->price }}</td>
                </tr>
               @endforeach
                <tr>
                    <td class="quantity"></td>
                    <td class="description">TOTAL</td>
                    <td class="price"> {{$total}}</td>
                </tr>
            </tbody>
        </table>
        <p class="centered">Thanks for your purchase!
            <br>parzibyte.me/blog</p>
    </div>
    <button id="btnPrint" class="hidden-print">Print</button>
</body>
<script>
    const $btnPrint = document.querySelector("#btnPrint");
    $btnPrint.addEventListener("click", () => {
        window.print();
    });

</script>

</html>
