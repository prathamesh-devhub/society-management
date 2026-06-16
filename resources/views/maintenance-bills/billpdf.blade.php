<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Bill - {{ $maintenanceBill->member->flat_number }}</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace, Arial, sans-serif;
            color: #000;
            margin: 0;
            padding: 10px;
            font-size: 13px;
            line-height: 1.3;
            background-color: #ffffff;
        }
        .bill-container {
            max-width: 750px;
            margin: 0 auto;
            background: #fff;
            padding: 15px;
            border: 1px solid #000;
        }
        .header {
            text-align: center;
            border-bottom: 1px dashed #000;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }
        .society-name {
            font-size: 18px;
            font-weight: bold;
            margin: 0 0 3px 0;
        }
        .society-reg {
            font-size: 11px;
            font-weight: bold;
            margin: 0 0 3px 0;
        }
        .society-address {
            font-size: 11px;
            margin: 0 0 5px 0;
        }
        .bill-title {
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 10px 0 3px 0;
        }
        .bill-period {
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            margin-bottom: 10px;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            border-bottom: 1px solid #000;
        }
        .meta-table td {
            padding: 3px 0;
            vertical-align: top;
            font-size: 12px;
        }
        .particulars-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px;
        }
        .particulars-table th, .particulars-table td {
            border: 1px solid #000;
            padding: 5px 8px;
            font-size: 12px;
        }
        .particulars-table th {
            background-color: #f2f2f2;
            text-align: left;
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .split-section {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .split-section td {
            vertical-align: top;
            border: 1px solid #000;
            border-top: none;
        }
        .arrears-box {
            padding: 8px;
            font-size: 12px;
        }
        .summary-table {
            width: 100%;
            border-collapse: collapse;
        }
        .summary-table td {
            border: none;
            border-bottom: 1px solid #000;
            border-left: 1px solid #000;
            padding: 5px 8px;
            font-size: 12px;
        }
        .summary-table tr:last-child td {
            border-bottom: none;
        }
        .amount-words {
            font-weight: bold;
            margin-bottom: 15px;
            padding: 6px;
            border: 1px solid #000;
            font-size: 12px;
            background-color: #fafafa;
        }
        .notes {
            font-size: 11px;
            color: #000;
            margin-bottom: 10px;
        }
        .notes ol {
            padding-left: 15px;
            margin: 4px 0;
        }
        .notes li {
            margin-bottom: 3px;
        }
        .bank-details {
            margin-top: 8px;
            font-weight: bold;
            border: 1px dashed #000;
            padding: 6px;
        }
        .computer-generated-notice {
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            font-style: italic;
            margin-top: 20px;
            border-top: 1px dashed #000;
            padding-top: 8px;
            letter-spacing: 0.5px;
        }
        
        @media print {
            body {
                padding: 0;
            }
            .bill-container {
                border: 1px solid #000;
                box-shadow: none;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="bill-container">
    <div class="header">
        <div class="society-name">{{ strtoupper($settings->society_name) }}</div> [cite: 1]
        <div class="society-reg">{{ $settings->registration_no }}</div> [cite: 2]
        <div class="society-address">
            Survey No.58, Hissa No.4/1, Survey No.49, Hissa No. 2C & Survey No.57, Hissa No.2, Mauje Pale, Near Jainam Residency, Ambernath (E), Dist-Thane [cite: 2]<br>
            Email: {{ $settings->email }} [cite: 3]
        </div>
        
        <div class="bill-title">BILL / DEMAND NOTICE</div> [cite: 4]
        <div class="bill-period">BILL FOR THE PERIOD OF {{ $maintenanceBill->bill_period }}</div> [cite: 5]
    </div>

    <table class="meta-table">
        <tr>
            <td style="width: 18%;"><strong>{{ $maintenanceBill->member->name }}</strong></td> [cite: 6]
            <td style="width: 42%;"></td>
            <td style="width: 15%;"><strong>BILL NO. :</strong></td> [cite: 7]
            <td style="width: 25%;">{{ $maintenanceBill->bill_no }}</td>
        </tr>
        <tr>
            <td><strong>FLAT NO.:</strong></td> [cite: 8]
            <td>{{ $maintenanceBill->member->flat_number }}</td>
            <td><strong>BILL DATE:</strong></td> [cite: 9]
            <td>{{ $maintenanceBill->bill_date }}</td>
        </tr>
        <tr>
            <td><strong>AREA(Carpet):</strong></td> [cite: 9]
            <td>{{ $maintenanceBill->square_feet }} SQ.FEET</td> [cite: 9]
            <td><strong>DUE DATE:</strong></td> [cite: 9]
            <td>{{ $maintenanceBill->due_date }}</td>
        </tr>
    </table>

    <table class="particulars-table">
        <thead>
            <tr>
                <th style="width: 75%;">PARTICULARS [cite: 10]</th>
                <th style="width: 10%;" class="text-center">Sr. [cite: 10]</th>
                <th style="width: 15%;" class="text-right">AMOUNT [cite: 10]</th>
            </tr>
        </thead>
        <tbody>
            @php $sr = 1; @endphp
            @foreach($particulars as $item)
            <tr>
                <td>{{ $item['name'] }}</td> [cite: 10]
                <td class="text-center">{{ $sr++ }}</td> [cite: 10]
                <td class="text-right">{{ number_format($item['amount'], 2) }}</td> [cite: 10]
            </tr>
            @endforeach
            <tr style="font-weight: bold;">
                <td>TOTAL</td> [cite: 10]
                <td></td>
                <td class="text-right">{{ number_format( $maintenanceBill->current_bill_total , 2) }}</td> [cite: 10]
            </tr>
        </tbody>
    </table>

    <table class="split-section">
        <tr>
            <td style="width: 55%;">
                <div class="arrears-box">
                    <strong>PRINCIPAL ARREARS:</strong> <br><br> [cite: 11]
                    <strong>INTEREST ARREARS:</strong>  [cite: 12]
                </div>
            </td>
            <td style="width: 45%; padding: 0;">
                <table class="summary-table">
                    <tr>
                        <td style="width: 60%;"><strong>ADD: INTEREST</strong></td> [cite: 13]
                        <td style="width: 40%;" class="text-right">{{ number_format( $maintenanceBill->interest_amount , 2) }}</td> [cite: 13]
                    </tr>
                    <tr>
                        <td><strong>ARREARS</strong></td> [cite: 13]
                        <td class="text-right">{{ number_format($maintenanceBill->previous_due, 2) }}</td> [cite: 13]
                    </tr>
                    <tr>
                        <td><strong>Less: ADVANCE</strong></td> [cite: 13]
                        <td class="text-right">
                            @if($maintenanceBill->advance_amount > 0)
                                {{ number_format( $maintenanceBill->advance_amount , 2) }}
                            @endif
                        </td>
                    </tr>
                    <tr style="font-weight: bold; background-color: #f2f2f2;">
                        <td>GRAND TOTAL</td> [cite: 13]
                        <td class="text-right">{{ number_format( $maintenanceBill->grand_total , 2) }}</td> [cite: 13]
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="amount-words">
        Amount in Words: Rs. {{ $maintenanceBill->amount_in_words }} ONLY. [cite: 15]
    </div>

    <div class="notes">
        <strong>NOTE:</strong><br>
        <ol>
            <li>Payment should be made in favour of PATELS SIGNATURE TYPE-A CHS LTD & A/c PAYEE ONLY. [cite: 16]</li>
            <li>Payment must be made on or before due date of every month. No post dated cheques are accepted. [cite: 17]</li>
            <li>Members are requested to write their Name, Flat No. & Mobile No. on the reverse of the Cheque or any mode of Payment. [cite: 18]</li>
            <li>If you or your tenant make a transaction through NEFT / Google pay / No broker or any other mode kindly send Screenshot to office number "+91 89562 85467" [cite: 19]</li>
            <li>For any query or complaint kindly contact society manager or drop a " patelsignature2022@gmail.com" [cite: 20]</li>
            <li>Please inform to society office in case of any discrepancy in this bill within 7 days [cite: 21]</li>
        </ol>
        
        <div class="bank-details">
            Bank & Branch: SARASWAT CO-OP BANK, AMBERNATH (Ε)<br> [cite: 22]
            A/c No. : 510000000169167 IFS Code: SRCB0000411 [cite: 22]
        </div>
        <div style="margin-top: 4px; font-size: 11px;">Ε.& Ο.Ε.</div> [cite: 14]
    </div>

    <div class="computer-generated-notice">
        This is a computer-generated document. No physical signature is required. 
    </div>
</div>

</body>
</html>