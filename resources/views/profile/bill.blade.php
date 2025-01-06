<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .invoice-header {
            background-color: #f8f9fa;
            padding: 20px;
            border-bottom: 2px solid #dee2e6;
        }
        .invoice-title {
            font-weight: bold;
        }
        .invoice-section {
            margin-top: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="container my-4">
    <div class="invoice-header d-flex justify-content-between align-items-center">
        <div>
            <h1 class="invoice-title">Invoice <span class="text-muted">With Credit</span></h1>
            <p>NO: 554775/R1 | Date: 01/01/2015</p>
        </div>
        <div class="text-end">
            <h4>Acme Corporation</h4>
            <p>Software Development<br>Field 3, Moon<br>info@acme.com</p>
        </div>
    </div>

    <div class="row invoice-section">
        <div class="col-md-6">
            <h5>Company Details</h5>
            <p><strong>Name:</strong> Acme Corporation</p>
            <p><strong>Industry:</strong> Software Development</p>
            <p><strong>Address:</strong> Field 3, Moon</p>
            <p><strong>Phone:</strong> 123.4456.4567</p>
            <p><strong>Email:</strong> mail@acme.com</p>
            <p><strong>Tax NO:</strong> 123456789</p>
            <p><strong>Tax Office:</strong> A' Moon</p>
        </div>
        <div class="col-md-6">
            <h5>Customer Details</h5>
            <p><strong>Name:</strong> Microsoft Corporation</p>
            <p><strong>Industry:</strong> Software Development</p>
            <p><strong>Address:</strong> One Microsoft Way, Redmond, WA 98052-7329, USA</p>
            <p><strong>Phone:</strong> (425) 882-8080</p>
            <p><strong>Email:</strong> contact@microsoft.com</p>
            <p><strong>Tax NO:</strong> 123456789</p>
        </div>
    </div>

    <div class="invoice-section">
        <h5>Room Details</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item / Details</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Tax</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <strong>Lorem Ipsum Dolor</strong><br>
                    The best lorem in town, try it now or leave forever
                </td>
                <td>$18,000.00<br><small>18 Units</small></td>
                <td>$1,800.00<br><small>Special -10%</small></td>
                <td>$3,240.00<br><small>VAT 20%</small></td>
                <td>$19,440.00</td>
            </tr>
            
            </tbody>
            <tfoot>
            <tr>
                <th colspan="4">Sub Total</th>
                {{-- <td>$1,800.00</td>
                <td>$3,312.00</td> --}}
                <td>$19,752.00</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div class="row invoice-section">
        <div class="col-md-12">
            <h5>Comments / Notes</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odit repudiandae numquam sit facere blanditiis, quasi distinctio ipsam? Libero odit ex expedita.</p>
        </div>
        
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
