<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>TK Paud</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body onload="window.print()">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="">
                                <h1 style="width:100%; max-width:300px;">TK PAUD</h1>
                            </td>
                            
                            <td>
                                Tanggal: {{ date('d M Y',strtotime(@$data[0]->tanggal)) }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                JL. Peritis Kemerdekaan KM. 18 No. 237<br>
                                Telp. (0411) 553300
                            </td>
                            
                            <td>
                                {{ucwords(@$data[0]->getSiswaById->nama)}}.<br>
                                {{@$data[0]->getSiswaById->no_hp}}<br>
                                {{@$data[0]->getSiswaById->alamat}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Bayar
                </td>
            </tr>
            @php
                $bayar=0;
            @endphp
            @foreach ($data as $item)    
                <tr class="item">
                    <td>
                        {{ucwords($item->jenis_pembayaran)}} {{$kwitansi ? ' + Denda' : ''}}
                    </td>
                    {{-- @if ($kwitansi)    
                        <td>
                            {{ucwords($item->jenis_pembayaran)}}
                        </td>
                    @endif --}}

                    <td>
                        {{\GeneralHelper::toRupiah($item->bayar)}} {{$kwitansi ? ' + '.\GeneralHelper::toRupiah($item->total_denda) : ''}}
                    </td>
                </tr>
                @php
                if ($kwitansi) {
                    $bayar = $bayar + $item->bayar + $item->total_denda;
                }else{
                    $bayar = $bayar + $item->bayar;
                }
                @endphp
            @endforeach
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: {{\GeneralHelper::toRupiah($bayar)}}
                </td>
            </tr>
        </table>
        <br><br>
        <table>
            <tr>
                <td>
                    Mengetahui<br>
                    Kepala TK Asoka Makassar
                    <br><br><br>
                </td>
            </tr>
            <tr>
                <td>({{\GeneralHelper::getNameOf()->kepsek}})</td>
            </tr>
        </table>
    </div>
</body>
</html>