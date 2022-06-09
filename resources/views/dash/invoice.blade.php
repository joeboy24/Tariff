
<html>

    <head>
        <meta charset="utf-8">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <link href="/dashdir/css/inv_style.css" rel="stylesheet">
        <link href="/dashdir/css/main.css" rel="stylesheet">
        <link href="/dashdir/css/bootstrap.css" rel="stylesheet">
        <link href="/dashdir/css/font-awesome.min.css" rel="stylesheet">
    </head>
    
    <body style="background: #eee">
    
        <section id="invoice">
            <div class="invoiceContent">
    
                <div class="invHeaderTop">
                    <h1>SPOILED SALLY</h1>
                    <h4>Online Store</h4>
                    <P class="locInfo">$company->address</P>
                    <P class="contactInfo">$company->email</P>
                </div>
    
                <div class="invHeaderMid">
                    <div class="row">
                        <!--div class="col-sm-4 delAdd">
                            <p>Judy Mays</p>
                            <p>Any Streetno. 172</p>
                            <p>Some City, Box 123</p>
                            <p>Canada</p>
                        </div-->
                        <div class="col-sm-4 delAdd2">
                            <h4>Delivery Address</h4>
                            <p>1</p>
                            <p>2</p>
                            <p>3</p>
                            <p>4</p>
                            <p>5</p>
                            <h2>INVOICE</h2>
                        </div>
                        <div class="col-sm-4">
                        
                        </div>
                    </div>
                </div>
    
                <div class="invCenter">
                    <table class="invCenterTbl">
                        <tbody>
                            <tr>
                                <td class="col-sm-3">Invoice No. :<br><br></td>
                                <td class="col-sm-3">$order->invoice_id<br><br></td>
                                
                            </tr>
                            <tr>
                                <td class="col-sm-3">Invoice Date :</td>
                                <td class="col-sm-3">$order->created_at</td>
                                <td class="col-sm-2"><b>Customer No. :</b></td>
                                <td class="col-sm-4">$order->customer_no</td>
                            </tr>
                            <tr>
                                <td class="col-sm-3">Delivery Date :</td>
                                <td class="col-sm-3">$del_date</td>
                            </tr>
                            <tr>
                                <td class="col-sm-3">Order No. :</td>
                                <td class="col-sm-3">$order->order_no</td>
                                <td class="col-sm-2">Sales Person :</td>
                                <td class="col-sm-4">SpoiledSally Export $company->email</td>
                            </tr>
                            <!--tr>
                                <td class="col-sm-3">Payment Method :</td>
                                <td class="col-sm-3">Visa/Credit/Paypal</td>
                                <td class="col-sm-2">Due Date :</td>
                                <td class="col-sm-4">27.04.2021</td>
                            </tr-->
                        </tbody>
                    </table>
                </div>
    
                <div class="invBottom">
                    <table class="invBottomTbl">
                        <thead>
                            <th class="">#</th>
                            <th class="">Description</th>
                            <th class="pr">Size/Color</th>
                            <th class="pr">Qty.</th>
                            <th class="pr">Unit Price</th>
                            <th class="pr">Total</th>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                    <p>&nbsp;</p>
                    <p class="noreply">$add_txt</p>
                </div>
    
                {{-- <div class="mail_footer">
                    <p class="noreply">Please do not reply to this mail</p>
                    <P class="contactInfo">Get support at {{$company->email}}</P>
                </div> --}}
    
            </div>
        </section>
    
    </body>
    
    </html>