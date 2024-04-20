<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Penjualan</title>
    <style>
        #back-wrap {
            margin: 30px auto 0 30px;
            width: 450px;
            display: flex;
            justify-content: flex-end;
        }
        .btn-back {
            width: fit-content;
            padding: 8px 15px;
            color: #fff;
            background: #666;
            border-radius: 5px;
            text-decoration: none;
        }
        #receipt {
            box-shadow: 5px 10px 15px rgba(0, 0, 0, 0.5);
            padding: 20px;
            margin: 30px auto 0 auto;
            width: 500px;
            background: #fff;
        }
        h2 {
            font-size: .9rem;
        }
        p {
            font-size: .8rem;
            color: #666;
            line-height: 1.2rem;
        }
        #top {
            margin-top: 25px;
        }
        #top .info {
            text-align: center;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 5px 0 5px 15px;
            border:  1px dolif #eee;
        }
        .tabletitle {
            font-size: .5rem;
            background: #eee;
        }
        .service {
            border-bottom: 1px solid #eee;
        }
        .itemtext {
            font-size: .7rem;
        }
        #legalcopy {
            margin-top: 15px;
        }
        .btn-print {
            float: right;
            color: #333;
        }
    </style>
</head>
<body>
    <div id="receipt">
        <center id="top">
            <h2>Indo April</h2>
        </center>
        <div id="mid">
            <div class="info">
                <br>
                    Name Customer : {{ $sale->customer->NmCust }}</br>
                </p>
            </div>
        </div>
        <div id="bot">
            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>Product Name</h2>
                        </td>
                        <td class="item">
                            <h2>QTy</h2>
                        </td>
                        <td class="item">
                            <h2>Price</h2>
                        </td>
                        <td class="item">
                            <h2>Sub Total</h2>
                        </td>
                    </tr>
                    @foreach($sale->saleDetails as $saleDetail)
                        <tr class="service">
                            <td class="tableitem">
                                <p class="itemtext">{{ $saleDetail->Product->NmProduct }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">Rp {{ number_format($saleDetail->Product->Harga, 2, ',', '.') }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ $saleDetail->JmlProduct }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">Rp {{ number_format($saleDetail->Subtotal, 2, ',', '.') }}</p>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        <td>
                            <h2>Total Price</h2>
                        </td>
                        <td>
                            <h2>Rp {{ number_format($sale->TtlPrice, 2, ',', '.') }}</h2>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="legalcopy">
                <center>
                    <p>{{ $sale->TglSale }} </p>
                    <p class="legal"><strong>Terima kasih atas pembelian Anda!</strong></p>
                </center>
            </div>
        </div>
    </div>
</body>
</html>