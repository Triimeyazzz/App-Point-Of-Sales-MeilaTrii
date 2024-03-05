@extends('layouts.app')

@section('title')
    Purchase Details
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
<script nonce="22199d7c-8deb-47c8-b9d3-11635113c5e2">try{(function(w,d){!function(ct,cu,cv,cw){ct[cv]=ct[cv]||{};ct[cv].executed=[];ct.zaraz={deferred:[],listeners:[]};ct.zaraz.q=[];ct.zaraz._f=function(cx){return async function(){var cy=Array.prototype.slice.call(arguments);ct.zaraz.q.push({m:cx,a:cy})}};for(const cz of["track","set","debug"])ct.zaraz[cz]=ct.zaraz._f(cz);ct.zaraz.init=()=>{var cA=cu.getElementsByTagName(cw)[0],cB=cu.createElement(cw),cC=cu.getElementsByTagName("title")[0];cC&&(ct[cv].t=cu.getElementsByTagName("title")[0].text);ct[cv].x=Math.random();ct[cv].w=ct.screen.width;ct[cv].h=ct.screen.height;ct[cv].j=ct.innerHeight;ct[cv].e=ct.innerWidth;ct[cv].l=ct.location.href;ct[cv].r=cu.referrer;ct[cv].k=ct.screen.colorDepth;ct[cv].n=cu.characterSet;ct[cv].o=(new Date).getTimezoneOffset();if(ct.dataLayer)for(const cG of Object.entries(Object.entries(dataLayer).reduce(((cH,cI)=>({...cH[1],...cI[1]})),{})))zaraz.set(cG[0],cG[1],{scope:"page"});ct[cv].q=[];for(;ct.zaraz.q.length;){const cJ=ct.zaraz.q.shift();ct[cv].q.push(cJ)}cB.defer=!0;for(const cK of[localStorage,sessionStorage])Object.keys(cK||{}).filter((cM=>cM.startsWith("_zaraz_"))).forEach((cL=>{try{ct[cv]["z_"+cL.slice(7)]=JSON.parse(cK.getItem(cL))}catch{ct[cv]["z_"+cL.slice(7)]=cK.getItem(cL)}}));cB.referrerPolicy="origin";cB.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(ct[cv])));cA.parentNode.insertBefore(cB,cA)};["complete","interactive"].includes(cu.readyState)?zaraz.init():ct.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>

<div class="callout callout-info">
<h5><i class="fas fa-info"></i> Note:</h5>
This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
</div>

<div class="invoice p-3 mb-3">

<div class="row">
<div class="col-12">
<h4>
<i class="fas fa-globe"></i> AdminLTE, Inc.
<small class="float-right">Date: 2/10/2014</small>
</h4>
</div>

</div>

<div class="row invoice-info">
<div class="col-sm-4 invoice-col">
From
<address>
<strong>Admin, Inc.</strong><br>
795 Folsom Ave, Suite 600<br>
San Francisco, CA 94107<br>
Phone: (804) 123-5432<br>
Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0861666e6748696465697b696d6d6c7b7c7d6c6167266b6765">[email&#160;protected]</a>
</address>
</div>

<div class="col-sm-4 invoice-col">
To
<address>
<strong>John Doe</strong><br>
795 Folsom Ave, Suite 600<br>
San Francisco, CA 94107<br>
Phone: (555) 539-1037<br>
Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d6bcb9beb8f8b2b9b396b3aeb7bba6bab3f8b5b9bb">[email&#160;protected]</a>
</address>
</div>

<div class="col-sm-4 invoice-col">
<b>Invoice #007612</b><br>
<br>
<b>Order ID:</b> 4F3S8J<br>
<b>Payment Due:</b> 2/22/2014<br>
<b>Account:</b> 968-34567
</div>

</div>


<div class="row">
<div class="col-12 table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>Qty</th>
<th>Product</th>
<th>Serial #</th>
<th>Description</th>
<th>Subtotal</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Call of Duty</td>
<td>455-981-221</td>
<td>El snort testosterone trophy driving gloves handsome</td>
<td>$64.50</td>
</tr>
<tr>
<td>1</td>
<td>Need for Speed IV</td>
<td>247-925-726</td>
<td>Wes Anderson umami biodiesel</td>
<td>$50.00</td>
</tr>
<tr>
<td>1</td>
<td>Monsters DVD</td>
<td>735-845-642</td>
<td>Terry Richardson helvetica tousled street art master</td>
<td>$10.70</td>
</tr>
<tr>
<td>1</td>
<td>Grown Ups Blue Ray</td>
<td>422-568-642</td>
<td>Tousled lomo letterpress</td>
<td>$25.99</td>
</tr>
</tbody>
</table>
</div>

</div>

<div class="row">

<div class="col-6">
<p class="lead">Payment Methods:</p>
<img src="../../dist/img/credit/visa.png" alt="Visa">
<img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
<img src="../../dist/img/credit/american-express.png" alt="American Express">
<img src="../../dist/img/credit/paypal2.png" alt="Paypal">
<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
plugg
dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
</p>
</div>

<div class="col-6">
<p class="lead">Amount Due 2/22/2014</p>
<div class="table-responsive">
<table class="table">
<tr>
<th style="width:50%">Subtotal:</th>
<td>$250.30</td>
</tr>
<tr>
<th>Tax (9.3%)</th>
<td>$10.34</td>
</tr>
<tr>
<th>Shipping:</th>
<td>$5.80</td>
</tr>
<tr>
<th>Total:</th>
<td>$265.24</td>
</tr>
</table>
</div>
</div>

</div>


<div class="row no-print">
<div class="col-12">
<a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
<button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
Payment
</button>
<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
<i class="fas fa-download"></i> Generate PDF
</button>
</div>
</div>
</div>

</div>
</div>
</div>
</section>

</div>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="../../dist/js/demo.js"></script>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
