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
            width: 110px;
            max-width: 110px;
        }

        td.quantity,
        th.quantity {
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
        <p class="centered"> 
            Table / Plate
            <br> 
            <span style="font-weight:900 ;">
            @if($data->table)
                {{ $data->table->location ? $data->table->location->name.' | ': '' }}  {{ $data->table->table_number ?? '' }}
            @else
                {{ $data->plate }}
            @endif
            </span>
            <br>
            Order ID  
            <p style="text-align:center;margin: unset;h">
            <svg id="barcode"></svg>
            </p>
            </p>
        <table>
            <thead>
                <tr>
                    <th class="quantity">Q.</th>
                    <th class="description">Name</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data->orderDetail as $item)
            <?php $total += ($item->food->price*$item->piece); ?>
                <tr>
                    <td class="quantity">{{ $item->piece }}</td>
                    <td class="description">{{ $item->food->name }}</td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
    <button id="btnPrint" class="hidden-print">Print</button>
</body>

<!-- this library is used to generate the barcode for the product -->
<script src="{{ asset('assets/dist/js/JsBarcode.all.min.js') }}"></script>
<script>
    const $btnPrint = document.querySelector("#btnPrint");
    $btnPrint.addEventListener("click", () => {
        window.print();
    });

    _appendable = '#barcode';
      _bartext = {{ $data->id }};
    generateBARCODE(_bartext, _appendable);

    function generateBARCODE(_bartext, _appendable)
    {
    JsBarcode(_appendable, _bartext, {
        height: 35,
        width: 2,
        fontSize: 12,
    });
    }

</script>


</html>
