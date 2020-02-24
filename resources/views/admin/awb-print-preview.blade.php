<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - AWB Print Preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <meta charset="utf-8">
</head>

<style>
    .copy1 div,.copy1,.copy1 span,.copy1 th,.copy1 td{ border-color: #4CAF50 !important; color: #4CAF50}
    .copy2 div,.copy2,.copy2 span,.copy2 th,.copy2 td{ border-color: #C2185B !important; color: #C2185B}
    .copy3 div,.copy3,.copy3 span,.copy3 th,.copy3 td{ border-color: #5E35B1 !important; color: #5E35B1}
    .copy4 div,.copy4,.copy4 span,.copy4 th,.copy4 td{ border-color: #FFAB00 !important; color: #FFAB00}
    .color-me1{background-color: #C8E6C9 !important;}
    .color-me2{background-color: #F8BBD0 !important;}
    .color-me3{background-color: #cccccc !important;}
    .color-me4{background-color: #FFF9C4 !important;}
    .bd-rgt{border-right:none !important;}
    .main-holder{height: 950px; margin-bottom: 30px !important; width: 710px; padding: 0; border: 2px #000000 solid;border-left: 2px #000000 solid; background-color: #ffffff; margin: 0 auto}
    #printDivbtn{ position: fixed; right:15px; top: 50px; box-shadow: rgb(204, 204, 204) 0px 1px 0px 0px; padding: 20px 30px; background-color: #ffffff; border-radius: 4px;}
    #printDivbtn button{box-shadow:rgb(204, 204, 204) 0px 2px 3px 0px; color: rgb(4, 93, 210);background-color: rgb(204, 204, 204)}
    body{background-attachment: fixed; background-repeat: repeat; background-size: cover; background-position: 50% 50%}

    .main-left{ width: 353px; border-right: 2px #000000 solid; height: 385px}
    .main-right{ width: 353px;height: 385px}
    .mid-div{width: 100%; border-bottom:none;padding:0 5px; height: 70px; position: relative; line-height: 13px}
    .left-div1,.right-div1{ height: 70px; border-bottom: 2px #000 solid; padding-left: 5px}
    .div-mini{ width: 50%; border-bottom: 2px #000 solid; border-left: 2px #000 solid; text-align: center}
    .just-div{padding:0 5px; text-align: left; height: 45px; border-bottom: 2px #000 solid}
    .left-eql{height: 40px; border-bottom: 2px #000 solid}
    .left-eql div{width: 50%; height: 40px; padding: 0 5px}
    span{font-size: 11px;} .main-left div{ line-height: 13px !important;}
    .just-div-list{ height: 70px;border-bottom: 2px #000 solid}
    .just-div-list div{ float: left; width: 36px; border-right: 2px #000 solid; height: 70px; padding-left: 3px}
    .just-div-list div:nth-child(2){ width: 170px;}
    .just-div-list div:nth-child(6){ border-right: none}
    .sci{ bottom: 0; right: 0; height: 40px; width: 120px; border-top: 2px #000 solid; margin-top: 30px; margin-right: -5px; border-left: 2px #000 solid; text-align: center}
    td, th{ font-weight: 400; border:2px #000 solid; font-size: 11px; padding: 0 5px}
    td{ height: 165px; text-align: center; font-size: 14px}
    td:nth-child(1), th:nth-child(1){ width: 40px; border-left: none !important;}
    td:nth-child(3), th:nth-child(3){ width: 20px}
    td:nth-child(7), th:nth-child(7){ width: 99px}
    td:nth-child(8), th:nth-child(8){ border-right: none !important;}
    td:nth-child(3), th:nth-child(3),td:nth-child(4), th:nth-child(4),td:nth-child(5), th:nth-child(5),td:nth-child(6), th:nth-child(6),td:nth-child(7), th:nth-child(7){ border-right: 6px #777777 solid}
    .btm-div-left{ width: 40%}
    .btm-div-right{width: 60%; position: relative}
    .btm-list{ position: relative; height:35px;border-bottom: 1px #000 solid}
    .btm-sub2{width: 50%; height: 35px; text-align:center;border-right: 2px #000 solid; z-index: 2;  padding-top: 15px; padding-left: 5px;padding-right: 5px}
    .btm-sub1{ width: 50%; height: 35px; text-align:center;border-right: 1px #000 solid; z-index: 2;  padding-top: 15px; padding-left: 5px;padding-right: 5px}
    .btm-flt{ left: 50px;position: absolute; top: -1px; z-index: 999; border-bottom-left-radius: 7px;border-bottom-right-radius: 7px}
    .btm-flt span{border:1px #000 solid; padding:1px 5px; background-color: #ffffff; float: left;border-bottom-left-radius: 7px;border-bottom-right-radius: 7px}
    .btm-rght-lst1{height: 105px; line-height: 13px; padding: 0 5px; border-bottom: 2px #000000 solid; }
    .btm-rght-lst-bt{height: 15px; line-height: 13px; padding: 0 5px;}
    .sign-row{text-align: left; margin-top: 20px}
    .sign-row span:nth-child(2){ padding-right: 40px !important;}
    .sign-row span:nth-child(3){ padding-right: 40px !important;}
    .copy{ position: absolute; bottom: 10px; right: 10px; text-align: center; line-height: 11px}
    .copy span{ font-size: 13px; color: #8c150c}
    .right-div1{ line-height: 16px}
    .rgt-ins{font-size: 9px; width: 353px; border-top: 1px #000 solid; margin-left: -5px; padding-left: 5px; }
    .right-div2,.right-div3,.right-div4{ line-height: 6px;padding: 0 3px; border-bottom: 2px #000 solid; text-align: justify}
    .right-div2{height: 75px}
    .right-div2 span{font-size: 7px;}
    .right-div3{height: 85px; padding: 3px;font-size: 10px !important; line-height: 9px}
    .right-div3 span:nth-child(3){ font-size: 10px}
    .right-div4,.right-div6{height: 45px;}
    .rigt-flt-lft{ width: 40%; border-right: 2px #000 solid; height: 45px; padding: 5px}
    .rigt-flt-lft2{ height: 45px; width: 60%; padding: 5px}
    .ref-no{margin-top: 5px}
    .rigt-flt-lft3{ width: 32%; height: 65px; border-right: 2px #000 solid; padding: 5px; line-height: 8px}
    .right-div5{ border-bottom: 2px #000 solid; height: 65px; line-height: 7px}
    .discptn-hold{padding-top: 3px;}
    .right-div6{line-height: 8px;padding: 0 3px; height: 45px}
    .right-div6 .rigt-flt-lft{ width: 30%; border-right: 2px #000 solid; height: 45px; padding: 5px}
    .right-div6 .rigt-flt-lft2{ height: 45px; width: 70%; padding: 5px; text-align: justify}
    .right-div6 .rigt-flt-lft2 span{font-size: 10px}
    .results-holder { font-family: 'Special Elite' !important; color: #999999 !important;font-size: 14px;}
    .copy span {
        font-size: 13px;
        font-family: 'Special Elite' !important;
        color: #8c150c;
    }
</style>
<body>
<div id="printDivbtn"><button onclick="printlayer('printable')" id="printBtn" class="btn printBtn"><i class="zmdi zmdi-print"></i> Print / <i class="zmdi zmdi-download"></i> Download</button></div>
<div class="container-fluid" id="printable" style="">
    <div class="container copy1 main-holder">
        <div style="height: 385px; border-bottom: 2px #000000 solid">
            <div class="main-left pull-left">
                <div class="left-div1">
                    <div class="pull-left" style="width: 50%"><span>Shipper's Name and Address</span><br /><span class="results-holder"><?php echo $previews->shipperName ?></span></div>
                    <div class="pull-right div-mini"><span>Shipper's Account Number</span><br /><span class="results-holder"><?php echo $previews->shipperNumber ?></span></div>
                </div>
                <div class="left-div1">
                    <div class="pull-left" style="width: 50%"><span>Consignee's Name and Address</span><br /><span class="results-holder"><?php echo $previews->consigneeName ?></span></div>
                    <div class="pull-right div-mini"><span>Consignee's Account Number</span><br /><span class="results-holder"><?php echo $previews->consigneeNumber ?></span></div>
                </div>
                <div class="just-div"><span>Issuing Carrier's Agent Name and City</span><br /><span class="results-holder"><?php echo $previews->issuerName ?></span></div>
                <div class="left-eql">
                    <div class="pull-left" style="border-right: 2px #000 solid"><span>Agent's IATA Code</span><br /><span class="results-holder"><?php echo $previews->issuerIATA ?></span></div>
                    <div class="pull-right"><span>Account No.</span><br /><span class="results-holder"><?php echo $previews->issuerAcct ?></span></div>
                </div>
                <div class="just-div"><span>Airport of Departure (Addr. of First Carrier) and Requested Routing</span><br /><span class="results-holder"><?php echo $previews->flightDept ?></span></div>
                <div class="just-div-list">
                    <div><span>To</span><br /><span><?php echo $previews->to1 ?></span></div>
                    <div><span>By First Carrier : Routing and Destination</span><br /><span><?php echo $previews->by1 ?></span></div>
                    <div><span>to</span><br /><span><?php echo $previews->to2 ?></span></div>
                    <div><span>by</span><br /><span><?php echo $previews->by2 ?></span></div>
                    <div><span>to</span><br /><span><?php echo $previews->to3 ?></span></div>
                    <div><span>by</span><br /><span><?php echo $previews->by3 ?></span></div>
                </div>
                <div class="just-div">
                    <div class="pull-left" style="border-right: 2px #000 solid; width: 50%; height: 45px"><span>Airport of Destination</span><br /><span class="results-holder"><?php echo $previews->flightDestn ?></span></div>
                    <div class="pull-right" style="width: 50%; padding-left: 5px"><span>Requested Flight/Date</span><br /><span><?php echo $previews->flightname ?><?php echo "- $previews->flightDate" ?></span></div>
                </div>
            </div>
            <!--main right bill-->
            <div class="main-right pull-right">
                <div class="right-div1">
                    <span>Not Negotiable</span>
                    <div><strong>Air Waybill</strong></div>
                    <span><strong>Issued by:</strong></span><span><?php echo $previews->issuedBy ?></span><br />
                    <div class="rgt-ins color-me1"><i>Copies 1,2 and 3 of this Air  Waybill are original and have the same validity.</i></div>
                </div>
                <div class="right-div2">
                    <span>It is agreed that the goods described herein are accepted in apparent good order and condition (except as noted)
                     for carriage SUBJECT TO THE CONDITIONS OF CONTRACT ON THE REVERSE HEREOF. ALL GOODS MY BE CARRIED BY ANY OTHER MEANS
                     INCLUDDING ROAD OR ANY OTHER CARRIER UNLESS SPECIFIC CONRARY INSTRUCTIONS ARE GIVEN HEREON BY THE SHIPPER, AND
                     SHIPPER AGREES THAT THE SHIPMENT MAY BE CARRIED VIA INTERMEDIATE STOPPING PLACES WHICH THE CARRIER DEEMS APPROPRIATE. THE
                     SHIPPER'S ATTENTION IS DRAWN TO THE NOTICE CONCERNING CARRIER'S LIMITATION OF LIABILITY. Shipper may increase such limitation
                     of liability by declaring a higher value for carriage and paying a supplemental charge if required.</span>
                </div>
                <div class="right-div3">
                    <span>Account Information</span><br />
                    <div class="discptn-hold"><span><?php echo $previews->issuedAccDetails ?></span></div>
                </div>
                <div class="right-div4">
                    <div class="rigt-flt-lft pull-left">
                        <span>Reference Number</span><div class="ref-no"><span class="results-holder"><strong><?php echo $previews->shipRefNo ?></strong></span></div>
                    </div>
                    <div class="pull-left bd-rgt rigt-flt-lft2">
                        <span>Optional Shipping Info:</span><br />
                        <div class="discptn-hold"><span><?php echo $previews->optInfo ?></span></div>
                    </div>
                </div>
                <div class="right-div5">
                    <div class="rigt-flt-lft3 pull-left">
                        <span>Currency & (CHCG):</span><br />
                        <div class="discptn-hold"><span><?php echo $previews->currency ?><?php echo " ($previews->CHCG)"  ?></span></div>
                    </div>
                    <div class="rigt-flt-lft3 pull-left">
                        <span>Declared Value for Carrier:</span><br />
                        <div class="discptn-hold" class="discptn-hold"><span class="results-holder"><?php echo $previews->valueCarriage ?></span></div>
                    </div>
                    <div class="rigt-flt-lft3 pull-left bd-rgt">
                        <span>Declared Value for Customs:</span><br />
                        <div class="discptn-hold"><span class="results-holder"><?php echo $previews->valueCustoms ?></span></div>
                    </div>
                </div>
                <div class="right-div6">
                    <div class="rigt-flt-lft pull-left">
                        <span>Amount of Insurance</span><div class="ref-no"><?php echo $previews->amtInsurance ?></div>
                    </div>
                    <div class="pull-left bd-rgt rigt-flt-lft2">
                        <div><span>INSURANCE:- If carrier offers insurance, and such insurance is requested in accordance
                             with the conditions thereof, indicate amount to be insured in figures in box marked "Amount of Insurance".</span></div>
                    </div>
                </div>
            </div>
            <!--main right ends-->
        </div>
        <!--main middle bill-->
        <div class="mid-div">
            <div class="pull-left" style="width: 570px;height: 70px"><span>Handling Information</span><br /><span><?php echo $previews->handlingInfo ?></span></div><div class="sci pull-right"><span>SCI</span><br /><span class="results-holder"><?php echo $previews->SCI ?></span></div>
        </div>
        <!--main middle bill ends-->

        <table>
            <tr>
                <th>No. of Pieces RCP</th>
                <th>Gross Weight</th>
                <th class="td-colr1">Kg<br />lb</th>
                <th>Item No. (Rate Class)</th>
                <th>Chargeable Weight</th>
                <th>Rate / Charge</th>
                <th>Total</th>
                <th>Nature & Quantity of Goods<br />(inches, Dimensions or Volume)</th>
            </tr>
            <tr>
                <td>
                    @foreach($pieces as $piece)
                        <?php echo $piece ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratGross as $gross)
                        <?php echo $gross ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratUnit as $unit)
                        <?php echo $unit ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratItem as $item)
                        <?php echo $item ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratChrg as $Chrg)
                        <?php echo $Chrg ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratChr as $Chr)
                        <?php echo $Chr ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratTotal as $total)
                        <?php echo $total ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratNature as $nature)
                        <?php echo $nature ?><br />
                    @endforeach
                </td>
            </tr>
        </table>
        <!--main bottom bill-->
        <div class="btm-div">
            <!--main bottom left-->
            <div class="btm-div-left pull-left">
                <div class="btm-list">
                    <div class="btm-flt"><span class="bd-rgt">Prepaid</span><span class="bd-rgt">Weight Charge</span><span>Collect</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preWcharge ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colWcharge ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 95px"><span>Valuation Charge</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preValcharge ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colValcharge ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 125px"><span>Tax</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preTax ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colTax ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 60px"><span>Total Other Charges Due Agent</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preOtherCh ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colOtherCh ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 60px"><span>Total Other Charges Due Carrier</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preChCarrier ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colChCarrier ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 75px"><span class="bd-rgt color-me1">Prepaid</span><span class="bd-rgt color-me1"><strong>Total</strong></span><span class="color-me1">Collect</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preTotal ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colTotal ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left:6px;"><span class="bd-rgt" style="font-size: 10px">Currency Conversion Rates</span><span style="font-size: 10px">CC Chgs. in Dest. Currency</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preCurrRate ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colCurrRate ?></span>
                    </div>
                </div>
                <div class="btm-list" style="height: 32px">
                    <div class="btm-flt" style="right:0px; text-align: right;"><span class="pull-right" style="margin-right: 2px">Charges at Destination</span></div>
                    <div class="btm-sub1 pull-left" style="padding-top: 5px; line-height: 10px; font-size: 13px;height: 32px">
                        <span><strong>For Carrier's Use Only at Destination.</strong></span><br />
                        <span></span>
                    </div>
                    <div class="btm-sub2 pull-left" style="height: 32px">
                        <span><?php echo $previews->chgsDest ?></span>
                    </div>
                </div>
            </div>
            <!--main bottom div ends-->
            <!--main bottom right-->
            <div class="btm-div-right pull-right">
                <div class="btm-rght-lst1"><span>Other Charges</span><br /><span><?php echo $previews->otherChags ?></span></div>
            </div>
            <div class="btm-div-right pull-right">
                <div class="btm-rght-lst1"><span>Shipper certifies that the particulars on the face hereof are correct and that<strong> insofar as any
                        part of the consignment contains dangerous goods, such part is properly described by name and is in proper condition for carriage by air
                         according to the applicable Dangerous Goods Regulations.</strong></span>
                    <div style="text-align: center; margin-top: 25px">
                        <div style="width: 100%; border-bottom: 2px #000000 dashed"></div>
                        <span>Signature of Shipper or his Agent</span>
                    </div>
                </div>
                <div class="btm-rght-lst-bt">
                    <div class="sign-row">
                        <div style="width: 100%; position: relative; border-bottom: 2px #000000 dashed">
                            <div style="position: absolute; top:-15px"><span><?php echo $previews->shpDate ?></span><span style="padding-left: 100px"><?php echo $previews->shpPlace ?></span></div>
                        </div>
                        <span>Executed on(date)</span><span>at (place)</span><span>Signature of Issuing Carrier or its Agent</span>
                    </div>
                </div>
                <div class="btm-list" style="width: 142px; height: 33px; margin-top: -1px; border: 2px #000 solid; border-left:none;border-bottom:1px #000 solid">
                    <div class="btm-flt" style="left:0px; text-align: right;"><span class="color-me1" style="border-left: none; padding-top: 0"><strong>Total Collect Charges</strong></span></div>
                    <div style="width: 100%; height: 32px; padding: 15px 0 0 5px">
                        <span><?php echo $previews->totalChgs ?></span>
                    </div>
                </div>
                <div class="copy"><span>Original 1</span><br /><span>(for Issuing Carrier)</span></div>
            </div>
            <!--main bottom right ends-->
        </div>
    </div>


    <!-- copy2-->
    <div class="container copy2 main-holder">
        <div style="height: 385px; border-bottom: 2px #000000 solid">
            <div class="main-left pull-left">
                <div class="left-div1">
                    <div class="pull-left" style="width: 50%"><span>Shipper's Name and Address</span><br /><span class="results-holder"><?php echo $previews->shipperName ?></span></div>
                    <div class="pull-right div-mini"><span>Shipper's Account Number</span><br /><span class="results-holder"><?php echo $previews->shipperNumber ?></span></div>
                </div>
                <div class="left-div1">
                    <div class="pull-left" style="width: 50%"><span>Consignee's Name and Address</span><br /><span class="results-holder"><?php echo $previews->consigneeName ?></span></div>
                    <div class="pull-right div-mini"><span>Consignee's Account Number</span><br /><span class="results-holder"><?php echo $previews->consigneeNumber ?></span></div>
                </div>
                <div class="just-div"><span>Issuing Carrier's Agent Name and City</span><br /><span class="results-holder"><?php echo $previews->issuerName ?></span></div>
                <div class="left-eql">
                    <div class="pull-left" style="border-right: 2px #000 solid"><span>Agent's IATA Code</span><br /><span class="results-holder"><?php echo $previews->issuerIATA ?></span></div>
                    <div class="pull-right"><span>Account No.</span><br /><span class="results-holder"><?php echo $previews->issuerAcct ?></span></div>
                </div>
                <div class="just-div"><span>Airport of Departure (Addr. of First Carrier) and Requested Routing</span><br /><span class="results-holder"><?php echo $previews->flightDept ?></span></div>
                <div class="just-div-list">
                    <div><span>To</span><br /><span><?php echo $previews->to1 ?></span></div>
                    <div><span>By First Carrier : Routing and Destination</span><br /><span><?php echo $previews->by1 ?></span></div>
                    <div><span>to</span><br /><span><?php echo $previews->to2 ?></span></div>
                    <div><span>by</span><br /><span><?php echo $previews->by2 ?></span></div>
                    <div><span>to</span><br /><span><?php echo $previews->to3 ?></span></div>
                    <div><span>by</span><br /><span><?php echo $previews->by3 ?></span></div>
                </div>
                <div class="just-div">
                    <div class="pull-left" style="border-right: 2px #000 solid; width: 50%; height: 45px"><span>Airport of Destination</span><br /><span class="results-holder"><?php echo $previews->flightDestn ?></span></div>
                    <div class="pull-right" style="width: 50%; padding-left: 5px"><span>Requested Flight/Date</span><br /><span><?php echo $previews->flightname ?><?php echo "- $previews->flightDate" ?></span></div>
                </div>
            </div>
            <!--main right bill-->
            <div class="main-right pull-right">
                <div class="right-div1">
                    <span>Not Negotiable</span>
                    <div><strong>Air Waybill</strong></div>
                    <span><strong>Issued by:</strong></span><span><?php echo $previews->issuedBy ?></span><br />
                    <div class="rgt-ins color-me2"><i>Copies 1,2 and 3 of this Air  Waybill are original and have the same validity.</i></div>
                </div>
                <div class="right-div2">
                    <span>It is agreed that the goods described herein are accepted in apparent good order and condition (except as noted)
                     for carriage SUBJECT TO THE CONDITIONS OF CONTRACT ON THE REVERSE HEREOF. ALL GOODS MY BE CARRIED BY ANY OTHER MEANS
                     INCLUDDING ROAD OR ANY OTHER CARRIER UNLESS SPECIFIC CONRARY INSTRUCTIONS ARE GIVEN HEREON BY THE SHIPPER, AND
                     SHIPPER AGREES THAT THE SHIPMENT MAY BE CARRIED VIA INTERMEDIATE STOPPING PLACES WHICH THE CARRIER DEEMS APPROPRIATE. THE
                     SHIPPER'S ATTENTION IS DRAWN TO THE NOTICE CONCERNING CARRIER'S LIMITATION OF LIABILITY. Shipper may increase such limitation
                     of liability by declaring a higher value for carriage and paying a supplemental charge if required.</span>
                </div>
                <div class="right-div3">
                    <span>Account Information</span><br />
                    <div class="discptn-hold"><span><?php echo $previews->issuedAccDetails ?></span></div>
                </div>
                <div class="right-div4">
                    <div class="rigt-flt-lft pull-left">
                        <span>Reference Number</span><div class="ref-no"><span class="results-holder"><strong><?php echo $previews->shipRefNo ?></strong></span></div>
                    </div>
                    <div class="pull-left bd-rgt rigt-flt-lft2">
                        <span>Optional Shipping Info:</span><br />
                        <div class="discptn-hold"><span><?php echo $previews->optInfo ?></span></div>
                    </div>
                </div>
                <div class="right-div5">
                    <div class="rigt-flt-lft3 pull-left">
                        <span>Currency & (CHCG):</span><br />
                        <div class="discptn-hold"><span><?php echo $previews->currency ?><?php echo " ($previews->CHCG)"  ?></span></div>
                    </div>
                    <div class="rigt-flt-lft3 pull-left">
                        <span>Declared Value for Carrier:</span><br />
                        <div class="discptn-hold" class="discptn-hold"><span class="results-holder"><?php echo $previews->valueCarriage ?></span></div>
                    </div>
                    <div class="rigt-flt-lft3 pull-left bd-rgt">
                        <span>Declared Value for Customs:</span><br />
                        <div class="discptn-hold"><span class="results-holder"><?php echo $previews->valueCustoms ?></span></div>
                    </div>
                </div>
                <div class="right-div6">
                    <div class="rigt-flt-lft pull-left">
                        <span>Amount of Insurance</span><div class="ref-no"><?php echo $previews->amtInsurance ?></div>
                    </div>
                    <div class="pull-left bd-rgt rigt-flt-lft2">
                        <div><span>INSURANCE:- If carrier offers insurance, and such insurance is requested in accordance
                             with the conditions thereof, indicate amount to be insured in figures in box marked "Amount of Insurance".</span></div>
                    </div>
                </div>
            </div>
            <!--main right ends-->
        </div>
        <!--main middle bill-->
        <div class="mid-div">
            <div class="pull-left" style="width: 570px;height: 70px"><span>Handling Information</span><br /><span><?php echo $previews->handlingInfo ?></span></div><div class="sci pull-right"><span>SCI</span><br /><span class="results-holder"><?php echo $previews->SCI ?></span></div>
        </div>
        <!--main middle bill ends-->

        <table>
            <tr>
                <th>No. of Pieces RCP</th>
                <th>Gross Weight</th>
                <th>Kg<br />lb</th>
                <th>Item No. (Rate Class)</th>
                <th>Chargeable Weight</th>
                <th>Rate / Charge</th>
                <th>Total</th>
                <th>Nature & Quantity of Goods<br />(inches, Dimensions or Volume)</th>
            </tr>
            <tr>
                <td>
                    @foreach($pieces as $piece)
                        <?php echo $piece ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratGross as $gross)
                        <?php echo $gross ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratUnit as $unit)
                        <?php echo $unit ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratItem as $item)
                        <?php echo $item ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratChrg as $Chrg)
                        <?php echo $Chrg ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratChr as $Chr)
                        <?php echo $Chr ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratTotal as $total)
                        <?php echo $total ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratNature as $nature)
                        <?php echo $nature ?><br />
                    @endforeach
                </td>
            </tr>
        </table>
        <!--main bottom bill-->
        <div class="btm-div">
            <!--main bottom left-->
            <div class="btm-div-left pull-left">
                <div class="btm-list">
                    <div class="btm-flt"><span class="bd-rgt">Prepaid</span><span class="bd-rgt">Weight Charge</span><span>Collect</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preWcharge ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colWcharge ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 95px"><span>Valuation Charge</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preValcharge ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colValcharge ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 125px"><span>Tax</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preTax ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colTax ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 60px"><span>Total Other Charges Due Agent</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preOtherCh ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colOtherCh ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 60px"><span>Total Other Charges Due Carrier</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preChCarrier ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colChCarrier ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 75px"><span class="bd-rgt color-me2">Prepaid</span><span class="bd-rgt color-me2"><strong>Total</strong></span><span class="color-me2">Collect</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preTotal ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colTotal ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left:6px;"><span class="bd-rgt" style="font-size: 10px">Currency Conversion Rates</span><span style="font-size: 10px">CC Chgs. in Dest. Currency</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preCurrRate ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colCurrRate ?></span>
                    </div>
                </div>
                <div class="btm-list" style="height: 32px">
                    <div class="btm-flt" style="right:0px; text-align: right;"><span class="pull-right" style="margin-right: 2px">Charges at Destination</span></div>
                    <div class="btm-sub1 pull-left" style="padding-top: 5px; line-height: 10px; font-size: 13px;height: 32px">
                        <span><strong>For Carrier's Use Only at Destination.</strong></span><br />
                        <span></span>
                    </div>
                    <div class="btm-sub2 pull-left" style="height: 32px">
                        <span><?php echo $previews->chgsDest ?></span>
                    </div>
                </div>
            </div>
            <!--main bottom div ends-->
            <!--main bottom right-->
            <div class="btm-div-right pull-right">
                <div class="btm-rght-lst1"><span>Other Charges</span><br /><span><?php echo $previews->otherChags ?></span></div>
            </div>
            <div class="btm-div-right pull-right">
                <div class="btm-rght-lst1"><span>Shipper certifies that the particulars on the face hereof are correct and that<strong> insofar as any
                        part of the consignment contains dangerous goods, such part is properly described by name and is in proper condition for carriage by air
                         according to the applicable Dangerous Goods Regulations.</strong></span>
                    <div style="text-align: center; margin-top: 25px">
                        <div style="width: 100%; border-bottom: 2px #000000 dashed"></div>
                        <span>Signature of Shipper or his Agent</span>
                    </div>
                </div>
                <div class="btm-rght-lst-bt">
                    <div class="sign-row">
                        <div style="width: 100%; position: relative; border-bottom: 2px #000000 dashed">
                            <div style="position: absolute; top:-15px"><span><?php echo $previews->shpDate ?></span><span style="padding-left: 100px"><?php echo $previews->shpPlace ?></span></div>
                        </div>
                        <span>Executed on(date)</span><span>at (place)</span><span>Signature of Issuing Carrier or its Agent</span>
                    </div>
                </div>
                <div class="btm-list" style="width: 142px; height: 33px; margin-top: -1px; border: 2px #000 solid; border-left:none;border-bottom:1px #000 solid">
                    <div class="btm-flt" style="left:0px; text-align: right;"><span class="color-me2" style="border-left: none; padding-top: 0"><strong>Total Collect Charges</strong></span></div>
                    <div style="width: 100%; height: 32px; padding: 15px 0 0 5px">
                        <span><?php echo $previews->totalChgs ?></span>
                    </div>
                </div>
                <div class="copy"><span>Original 2</span><br /><span>(for Consignee)</span></div>
            </div>
            <!--main bottom right ends-->
        </div>
    </div>



    <!--copy3-->
    <div class="container copy3 main-holder">
        <div style="height: 385px; border-bottom: 2px #000000 solid">
            <div class="main-left pull-left">
                <div class="left-div1">
                    <div class="pull-left" style="width: 50%"><span>Shipper's Name and Address</span><br /><span class="results-holder"><?php echo $previews->shipperName ?></span></div>
                    <div class="pull-right div-mini"><span>Shipper's Account Number</span><br /><span class="results-holder"><?php echo $previews->shipperNumber ?></span></div>
                </div>
                <div class="left-div1">
                    <div class="pull-left" style="width: 50%"><span>Consignee's Name and Address</span><br /><span class="results-holder"><?php echo $previews->consigneeName ?></span></div>
                    <div class="pull-right color-me3 div-mini"><span>Consignee's Account Number</span><br /><span class="results-holder"><?php echo $previews->consigneeNumber ?></span></div>
                </div>
                <div class="just-div"><span>Issuing Carrier's Agent Name and City</span><br /><span class="results-holder"><?php echo $previews->issuerName ?></span></div>
                <div class="left-eql">
                    <div class="pull-left" style="border-right: 2px #000 solid"><span>Agent's IATA Code</span><br /><span class="results-holder"><?php echo $previews->issuerIATA ?></span></div>
                    <div class="pull-right"><span>Account No.</span><br /><span class="results-holder"><?php echo $previews->issuerAcct ?></span></div>
                </div>
                <div class="just-div"><span>Airport of Departure (Addr. of First Carrier) and Requested Routing</span><br /><span class="results-holder"><?php echo $previews->flightDept ?></span></div>
                <div class="just-div-list">
                    <div><span>To</span><br /><span><?php echo $previews->to1 ?></span></div>
                    <div><span>By First Carrier : Routing and Destination</span><br /><span><?php echo $previews->by1 ?></span></div>
                    <div><span>to</span><br /><span><?php echo $previews->to2 ?></span></div>
                    <div><span>by</span><br /><span><?php echo $previews->by2 ?></span></div>
                    <div><span>to</span><br /><span><?php echo $previews->to3 ?></span></div>
                    <div><span>by</span><br /><span><?php echo $previews->by3 ?></span></div>
                </div>
                <div class="just-div">
                    <div class="pull-left" style="border-right: 2px #000 solid; width: 50%; height: 45px"><span>Airport of Destination</span><br /><span class="results-holder"><?php echo $previews->flightDestn ?></span></div>
                    <div class="pull-right" style="width: 50%; padding-left: 5px"><span>Requested Flight/Date</span><br /><span><?php echo $previews->flightname ?><?php echo "- $previews->flightDate" ?></span></div>
                </div>
            </div>
            <!--main right bill-->
            <div class="main-right pull-right">
                <div class="right-div1 color-me">
                    <span>Not Negotiable</span>
                    <div><strong>Air Waybill</strong></div>
                    <span><strong>Issued by:</strong></span><span><?php echo $previews->issuedBy ?></span><br />
                    <div class="rgt-ins color-me3"><i>Copies 1,2 and 3 of this Air  Waybill are original and have the same validity.</i></div>
                </div>
                <div class="right-div2">
                    <span>It is agreed that the goods described herein are accepted in apparent good order and condition (except as noted)
                     for carriage SUBJECT TO THE CONDITIONS OF CONTRACT ON THE REVERSE HEREOF. ALL GOODS MY BE CARRIED BY ANY OTHER MEANS
                     INCLUDDING ROAD OR ANY OTHER CARRIER UNLESS SPECIFIC CONRARY INSTRUCTIONS ARE GIVEN HEREON BY THE SHIPPER, AND
                     SHIPPER AGREES THAT THE SHIPMENT MAY BE CARRIED VIA INTERMEDIATE STOPPING PLACES WHICH THE CARRIER DEEMS APPROPRIATE. THE
                     SHIPPER'S ATTENTION IS DRAWN TO THE NOTICE CONCERNING CARRIER'S LIMITATION OF LIABILITY. Shipper may increase such limitation
                     of liability by declaring a higher value for carriage and paying a supplemental charge if required.</span>
                </div>
                <div class="right-div3">
                    <span>Account Information</span><br />
                    <div class="discptn-hold"><span><?php echo $previews->issuedAccDetails ?></span></div>
                </div>
                <div class="right-div4">
                    <div class="rigt-flt-lft pull-left">
                        <span>Reference Number</span><div class="ref-no"><span class="results-holder"><strong><?php echo $previews->shipRefNo ?></strong></span></div>
                    </div>
                    <div class="pull-left bd-rgt rigt-flt-lft2">
                        <span>Optional Shipping Info:</span><br />
                        <div class="discptn-hold"><span><?php echo $previews->optInfo ?></span></div>
                    </div>
                </div>
                <div class="right-div5">
                    <div class="rigt-flt-lft3 pull-left">
                        <span>Currency & (CHCG):</span><br />
                        <div class="discptn-hold"><span><?php echo $previews->currency ?><?php echo " ($previews->CHCG)"  ?></span></div>
                    </div>
                    <div class="rigt-flt-lft3 pull-left">
                        <span>Declared Value for Carrier:</span><br />
                        <div class="discptn-hold" class="discptn-hold"><span class="results-holder"><?php echo $previews->valueCarriage ?></span></div>
                    </div>
                    <div class="rigt-flt-lft3 pull-left bd-rgt">
                        <span>Declared Value for Customs:</span><br />
                        <div class="discptn-hold"><span class="results-holder"><?php echo $previews->valueCustoms ?></span></div>
                    </div>
                </div>
                <div class="right-div6">
                    <div class="rigt-flt-lft pull-left">
                        <span>Amount of Insurance</span><div class="ref-no"><?php echo $previews->amtInsurance ?></div>
                    </div>
                    <div class="pull-left bd-rgt rigt-flt-lft2">
                        <div><span>INSURANCE:- If carrier offers insurance, and such insurance is requested in accordance
                             with the conditions thereof, indicate amount to be insured in figures in box marked "Amount of Insurance".</span></div>
                    </div>
                </div>
            </div>
            <!--main right ends-->
        </div>
        <!--main middle bill-->
        <div class="mid-div">
            <div class="pull-left" style="width: 570px; height: 70px"><span>Handling Information</span><br /><span><?php echo $previews->handlingInfo ?></span></div><div class="sci pull-right"><span>SCI</span><br /><span class="results-holder"><?php echo $previews->SCI ?></span></div>
        </div>
        <!--main middle bill ends-->

        <table>
            <tr>
                <th>No. of Pieces RCP</th>
                <th>Gross Weight</th>
                <th>Kg<br />lb</th>
                <th>Item No. (Rate Class)</th>
                <th>Chargeable Weight</th>
                <th>Rate / Charge</th>
                <th>Total</th>
                <th>Nature & Quantity of Goods<br />(inches, Dimensions or Volume)</th>
            </tr>
            <tr>
                <td>
                    @foreach($pieces as $piece)
                        <?php echo $piece ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratGross as $gross)
                        <?php echo $gross ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratUnit as $unit)
                        <?php echo $unit ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratItem as $item)
                        <?php echo $item ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratChrg as $Chrg)
                        <?php echo $Chrg ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratChr as $Chr)
                        <?php echo $Chr ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratTotal as $total)
                        <?php echo $total ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratNature as $nature)
                        <?php echo $nature ?><br />
                    @endforeach
                </td>
            </tr>
        </table>
        <!--main bottom bill-->
        <div class="btm-div">
            <!--main bottom left-->
            <div class="btm-div-left pull-left">
                <div class="btm-list">
                    <div class="btm-flt"><span class="bd-rgt">Prepaid</span><span class="bd-rgt">Weight Charge</span><span>Collect</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preWcharge ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colWcharge ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 95px"><span>Valuation Charge</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preValcharge ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colValcharge ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 125px"><span>Tax</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preTax ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colTax ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 60px"><span>Total Other Charges Due Agent</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preOtherCh ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colOtherCh ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 60px"><span>Total Other Charges Due Carrier</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preChCarrier ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colChCarrier ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 75px"><span class="bd-rgt color-me3">Prepaid</span><span class="bd-rgt color-me3"><strong>Total</strong></span><span class="color-me3">Collect</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preTotal ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colTotal ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left:6px;"><span class="bd-rgt color-me3" style="font-size: 10px">Currency Conversion Rates</span><span class="color-me3" style="font-size: 10px">CC Chgs. in Dest. Currency</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preCurrRate ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colCurrRate ?></span>
                    </div>
                </div>
                <div class="btm-list" style="height: 32px">
                    <div class="btm-flt" style="right:0px; text-align: right;"><span class="pull-right color-me3" style="margin-right: 2px">Charges at Destination</span></div>
                    <div class="btm-sub1 pull-left" style="padding-top: 5px; line-height: 10px; font-size: 13px;height: 32px">
                        <span><strong>For Carrier's Use Only at Destination.</strong></span><br />
                        <span></span>
                    </div>
                    <div class="btm-sub2 pull-left" style="height: 32px">
                        <span><?php echo $previews->chgsDest ?></span>
                    </div>
                </div>
            </div>
            <!--main bottom div ends-->
            <!--main bottom right-->
            <div class="btm-div-right pull-right">
                <div class="btm-rght-lst1"><span>Other Charges</span><br /><span><?php echo $previews->otherChags ?></span></div>
            </div>
            <div class="btm-div-right pull-right">
                <div class="btm-rght-lst1"><span>Shipper certifies that the particulars on the face hereof are correct and that<strong> insofar as any
                        part of the consignment contains dangerous goods, such part is properly described by name and is in proper condition for carriage by air
                         according to the applicable Dangerous Goods Regulations.</strong></span>
                    <div style="text-align: center; margin-top: 25px">
                        <div style="width: 100%; border-bottom: 2px #000000 dashed"></div>
                        <span>Signature of Shipper or his Agent</span>
                    </div>
                </div>
                <div class="btm-rght-lst-bt">
                    <div class="sign-row">
                        <div style="width: 100%; position: relative; border-bottom: 2px #000000 dashed">
                            <div style="position: absolute; top:-15px"><span><?php echo $previews->shpDate ?></span><span style="padding-left: 100px"><?php echo $previews->shpPlace ?></span></div>
                        </div>
                        <span>Executed on(date)</span><span>at (place)</span><span>Signature of Issuing Carrier or its Agent</span>
                    </div>
                </div>
                <div class="btm-list" style="width: 142px; height: 33px; margin-top: -1px; border: 2px #000 solid; border-left:none;border-bottom:1px #000 solid">
                    <div class="btm-flt" style="left:0px; text-align: right;"><span class="color-me3" style="border-left: none; padding-top: 0"><strong>Total Collect Charges</strong></span></div>
                    <div style="width: 100%; height: 32px; padding: 15px 0 0 5px">
                        <span><?php echo $previews->totalChgs ?></span>
                    </div>
                </div>
                <div class="copy"><span>Original 3</span><br /><span>(for Shipper)</span></div>
            </div>
            <!--main bottom right ends-->
        </div>
    </div>



    <!--copy4-->

    <div class="container copy4 main-holder">
        <div style="height: 385px; border-bottom: 2px #000000 solid">
            <div class="main-left pull-left">
                <div class="left-div1">
                    <div class="pull-left" style="width: 50%"><span>Shipper's Name and Address</span><br /><span class="results-holder"><?php echo $previews->shipperName ?></span></div>
                    <div class="pull-right div-mini"><span>Shipper's Account Number</span><br /><span class="results-holder"><?php echo $previews->shipperNumber ?></span></div>
                </div>
                <div class="left-div1">
                    <div class="pull-left" style="width: 50%"><span>Consignee's Name and Address</span><br /><span class="results-holder"><?php echo $previews->consigneeName ?></span></div>
                    <div class="pull-right div-mini"><span>Consignee's Account Number</span><br /><span class="results-holder"><?php echo $previews->consigneeNumber ?></span></div>
                </div>
                <div class="just-div"><span>Issuing Carrier's Agent Name and City</span><br /><span class="results-holder"><?php echo $previews->issuerName ?></span></div>
                <div class="left-eql">
                    <div class="pull-left" style="border-right: 2px #000 solid"><span>Agent's IATA Code</span><br /><span class="results-holder"><?php echo $previews->issuerIATA ?></span></div>
                    <div class="pull-right"><span>Account No.</span><br /><span class="results-holder"><?php echo $previews->issuerAcct ?></span></div>
                </div>
                <div class="just-div"><span>Airport of Departure (Addr. of First Carrier) and Requested Routing</span><br /><span class="results-holder"><?php echo $previews->flightDept ?></span></div>
                <div class="just-div-list">
                    <div><span>To</span><br /><span><?php echo $previews->to1 ?></span></div>
                    <div><span>By First Carrier : Routing and Destination</span><br /><span><?php echo $previews->by1 ?></span></div>
                    <div><span>to</span><br /><span><?php echo $previews->to2 ?></span></div>
                    <div><span>by</span><br /><span><?php echo $previews->by2 ?></span></div>
                    <div><span>to</span><br /><span><?php echo $previews->to3 ?></span></div>
                    <div><span>by</span><br /><span><?php echo $previews->by3 ?></span></div>
                </div>
                <div class="just-div">
                    <div class="pull-left" style="border-right: 2px #000 solid; width: 50%; height: 45px"><span>Airport of Destination</span><br /><span class="results-holder"><?php echo $previews->flightDestn ?></span></div>
                    <div class="pull-right" style="width: 50%; padding-left: 5px"><span>Requested Flight/Date</span><br /><span><?php echo $previews->flightname ?><?php echo "- $previews->flightDate" ?></span></div>
                </div>
            </div>
            <!--main right bill-->
            <div class="main-right pull-right">
                <div class="right-div1">
                    <span>Not Negotiable</span>
                    <div><strong>Air Waybill</strong></div>
                    <span><strong>Issued by:</strong></span><span><?php echo $previews->issuedBy ?></span><br />
                    <div class="rgt-ins color-me4"><i>Copies 1,2 and 3 of this Air  Waybill are original and have the same validity.</i></div>
                </div>
                <div class="right-div2">
                    <span>It is agreed that the goods described herein are accepted in apparent good order and condition (except as noted)
                     for carriage SUBJECT TO THE CONDITIONS OF CONTRACT ON THE REVERSE HEREOF. ALL GOODS MY BE CARRIED BY ANY OTHER MEANS
                     INCLUDDING ROAD OR ANY OTHER CARRIER UNLESS SPECIFIC CONRARY INSTRUCTIONS ARE GIVEN HEREON BY THE SHIPPER, AND
                     SHIPPER AGREES THAT THE SHIPMENT MAY BE CARRIED VIA INTERMEDIATE STOPPING PLACES WHICH THE CARRIER DEEMS APPROPRIATE. THE
                     SHIPPER'S ATTENTION IS DRAWN TO THE NOTICE CONCERNING CARRIER'S LIMITATION OF LIABILITY. Shipper may increase such limitation
                     of liability by declaring a higher value for carriage and paying a supplemental charge if required.</span>
                </div>
                <div class="right-div3">
                    <span>Account Information</span><br />
                    <div class="discptn-hold"><span><?php echo $previews->issuedAccDetails ?></span></div>
                </div>
                <div class="right-div4">
                    <div class="rigt-flt-lft pull-left">
                        <span>Reference Number</span><div class="ref-no"><span class="results-holder"><strong><?php echo $previews->shipRefNo ?></strong></span></div>
                    </div>
                    <div class="pull-left bd-rgt rigt-flt-lft2">
                        <span>Optional Shipping Info:</span><br />
                        <div class="discptn-hold"><span><?php echo $previews->optInfo ?></span></div>
                    </div>
                </div>
                <div class="right-div5">
                    <div class="rigt-flt-lft3 pull-left">
                        <span>Currency & (CHCG):</span><br />
                        <div class="discptn-hold"><span><?php echo $previews->currency ?><?php echo " ($previews->CHCG)"  ?></span></div>
                    </div>
                    <div class="rigt-flt-lft3 pull-left">
                        <span>Declared Value for Carrier:</span><br />
                        <div class="discptn-hold" class="discptn-hold"><span class="results-holder"><?php echo $previews->valueCarriage ?></span></div>
                    </div>
                    <div class="rigt-flt-lft3 pull-left bd-rgt">
                        <span>Declared Value for Customs:</span><br />
                        <div class="discptn-hold"><span class="results-holder"><?php echo $previews->valueCustoms ?></span></div>
                    </div>
                </div>
                <div class="right-div6">
                    <div class="rigt-flt-lft pull-left">
                        <span>Amount of Insurance</span><div class="ref-no"><?php echo $previews->amtInsurance ?></div>
                    </div>
                    <div class="pull-left bd-rgt rigt-flt-lft2">
                        <div><span>INSURANCE:- If carrier offers insurance, and such insurance is requested in accordance
                             with the conditions thereof, indicate amount to be insured in figures in box marked "Amount of Insurance".</span></div>
                    </div>
                </div>
            </div>
            <!--main right ends-->
        </div>
        <!--main middle bill-->
        <div class="mid-div">
            <div class="pull-left" style="width: 570px;height: 70px"><span>Handling Information</span><br /><span><?php echo $previews->handlingInfo ?></span></div><div class="sci pull-right"><span>SCI</span><br /><span class="results-holder"><?php echo $previews->SCI ?></span></div>
        </div>
        <!--main middle bill ends-->

        <table>
            <tr>
                <th>No. of Pieces RCP</th>
                <th>Gross Weight</th>
                <th>Kg<br />lb</th>
                <th>Item No. (Rate Class)</th>
                <th>Chargeable Weight</th>
                <th>Rate / Charge</th>
                <th>Total</th>
                <th>Nature & Quantity of Goods<br />(inches, Dimensions or Volume)</th>
            </tr>
            <tr>
                <td>
                    @foreach($pieces as $piece)
                        <?php echo $piece ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratGross as $gross)
                        <?php echo $gross ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratUnit as $unit)
                        <?php echo $unit ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratItem as $item)
                        <?php echo $item ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratChrg as $Chrg)
                        <?php echo $Chrg ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratChr as $Chr)
                        <?php echo $Chr ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratTotal as $total)
                        <?php echo $total ?><br />
                    @endforeach
                </td>
                <td>
                    @foreach($ratNature as $nature)
                        <?php echo $nature ?><br />
                    @endforeach
                </td>
            </tr>
        </table>
        <!--main bottom bill-->
        <div class="btm-div">
            <!--main bottom left-->
            <div class="btm-div-left pull-left">
                <div class="btm-list">
                    <div class="btm-flt"><span class="bd-rgt">Prepaid</span><span class="bd-rgt">Weight Charge</span><span>Collect</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preWcharge ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colWcharge ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 95px"><span>Valuation Charge</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preValcharge ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colValcharge ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 125px"><span>Tax</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preTax ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colTax ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 60px"><span>Total Other Charges Due Agent</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preOtherCh ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colOtherCh ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 60px"><span>Total Other Charges Due Carrier</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preChCarrier ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colChCarrier ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left: 75px"><span class="bd-rgt color-me4">Prepaid</span><span class="bd-rgt color-me4"><strong>Total</strong></span><span class="color-me4">Collect</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preTotal ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colTotal ?></span>
                    </div>
                </div>
                <div class="btm-list">
                    <div class="btm-flt" style="left:6px;"><span class="bd-rgt color-me4" style="font-size: 10px">Currency Conversion Rates</span><span class="color-me4" style="font-size: 10px">CC Chgs. in Dest. Currency</span></div>
                    <div class="btm-sub1 pull-left">
                        <span><?php echo $previews->preCurrRate ?></span>
                    </div>
                    <div class="btm-sub2 pull-left">
                        <span><?php echo $previews->colCurrRate ?></span>
                    </div>
                </div>
                <div class="btm-list" style="height: 32px">
                    <div class="btm-flt" style="right:0px; text-align: right;"><span class="pull-right color-me4" style="margin-right: 2px">Charges at Destination</span></div>
                    <div class="btm-sub1 pull-left" style="padding-top: 5px; line-height: 10px; font-size: 13px;height: 32px">
                        <span><strong>For Carrier's Use Only at Destination.</strong></span><br />
                        <span></span>
                    </div>
                    <div class="btm-sub2 pull-left" style="height: 32px">
                        <span><?php echo $previews->chgsDest ?></span>
                    </div>
                </div>
            </div>
            <!--main bottom div ends-->
            <!--main bottom right-->
            <div class="btm-div-right pull-right">
                <div class="btm-rght-lst1"><span>Other Charges</span><br /><span><?php echo $previews->otherChags ?></span></div>
            </div>
            <div class="btm-div-right pull-right">
                <div class="btm-rght-lst1"><span>Shipper certifies that the particulars on the face hereof are correct and that<strong> insofar as any
                        part of the consignment contains dangerous goods, such part is properly described by name and is in proper condition for carriage by air
                         according to the applicable Dangerous Goods Regulations.</strong></span>
                    <div style="text-align: center; margin-top: 25px">
                        <div style="width: 100%; border-bottom: 2px #000000 dashed"></div>
                        <span>Signature of Shipper or his Agent</span>
                    </div>
                </div>
                <div class="btm-rght-lst-bt">
                    <div class="sign-row">
                        <div style="width: 100%; position: relative; border-bottom: 2px #000000 dashed">
                            <div style="position: absolute; top:-15px"><span><?php echo $previews->shpDate ?></span><span style="padding-left: 100px"><?php echo $previews->shpPlace ?></span></div>
                        </div>
                        <span>Executed on(date)</span><span>at (place)</span><span>Signature of Issuing Carrier or its Agent</span>
                    </div>
                </div>
                <div class="btm-list" style="width: 142px; height: 33px; margin-top: -1px; border: 2px #000 solid; border-left:none;border-bottom:1px #000 solid">
                    <div class="btm-flt" style="left:0px; text-align: right;"><span class="color-me4" style="border-left: none; padding-top: 0"><strong>Total Collect Charges</strong></span></div>
                    <div style="width: 100%; height: 32px; padding: 15px 0 0 5px">
                        <span><?php echo $previews->totalChgs ?></span>
                    </div>
                </div>
                <div class="copy"><span>Original 4</span><br /><span>(Delivery Receipt )</span></div>
            </div>
            <!--main bottom right ends-->
        </div>
    </div>


    <style>
        .mainbk-left{width: 49%; font-size: 10px; float: left}
        .mainbk-right{width: 49%; font-size: 10px; float: right;}
    </style>
    <!-- backpage-->
    <div class="container  main-holder" style="border:none; color: #333333; padding:0 5px; line-height: 13px; text-align: justify">
        <div style="text-align: center" ><img style="height: 60px" src="{{ URL::to('images/JRMS_web_logo_black.png') }}" /></div>
        <h4 style="font-size: 10px; text-align: center; margin: 2px 0"><strong>NOTICE CONCERNING CARRIER'S LIMITATION OF LIABILITY</strong></h4>
        <span style="text-align: justify; font-size: 10px">If the carriage involves an ultimate destination or stop in a country other than the country of departure, the Montreal Convention or the Warsaw Convention may be applicable
to the liability of the Carrier in respect of loss of, damage or delay to cargo. Carrier's limitation of liability in accordance with those Conventions shall be as set forth in
subparagraph 4 unless a higher value is declared.</span>
        <h4 style="font-size: 10px;text-align: center; margin: 2px 0"><strong>CONDITIONS OF CONTRACT</strong></h4>
        <div class="mainbk-left pull-left">
            1. In this contract and the Notices appearing hereon:
            CARRIER includes the air carrier issuing this air waybill and all carriers that
            carry or undertake to carry the cargo or perform any other services related to
            such carriage.
            SPECIAL DRAWING RIGHT (SDR) is a Special Drawing Right as defined by
            the International Monetary Fund.
            WARSAW CONVENTION means whichever of the following instruments is
            applicable to the contract of carriage:
            the Convention for the Unification of Certain Rules Relating to International
            Carriage by Air, signed at Warsaw, 12 October 1929;
            that Convention as amended at The Hague on 28 September 1955;
            that Convention as amended at The Hague 1955 and by Montreal Protocol No.
            1, 2, or 4 (1975) as the case may be.
            MONTREAL CONVENTION means the Convention for the Unification of
            Certain Rules for International Carriage by Air, done at Montreal on 28 May
            1999.<br/>
            <br/>
            2. 2.1 Carriage is subject to the rules relating to liability established by the
            Warsaw Convention or the Montreal Convention unless such carriage is
            not "international carriage" as defined by the applicable Conventions.<br/>
            2.2 To the extent not in conflict with the foregoing, carriage and other related
            services performed by each Carrier are subject to:<br/>
            2.2.1 applicable laws and government regulations;<br/>
            2.2.2 provisions contained in the air waybill, Carrier's conditions of
            carriage and related rules, regulations, and timetables (but not
            the times of departure and arrival stated therein) and applicable
            tariffs of such Carrier, which are made part hereof, and which
            may be inspected at any airports or other cargo sales offices
            from which it operates regular services. When carriage is to/from
            the USA, the shipper and the consignee are entitled, upon
            request, to receive a free copy of the Carrier's conditions of
            carriage. The Carrier's conditions of carriage include, but are not
            limited to:<br/>
            2.2.2.1 limits on the Carrier's liability for loss, damage or delay
            of goods, including fragile or perishable goods;<br/>
            2.2.2.2 claims restrictions, including time periods within which
            shippers or consignees must file a claim or bring an
            action against the Carrier for its acts or omissions, or
            those of its agents;<br/>
            2.2.2.3 rights, if any, of the Carrier to change the terms of the
            contract;<br/>
            2.2.2.4 rules about Carrier's right to refuse to carry;<br/>
            2.2.2.5 rights of the Carrier and limitations concerning delay or
            failure to perform service, including schedule changes,
            substitution of alternate Carrier or aircraft and rerouting.<br/>
            <br/>
            3. The agreed stopping places (which may be altered by Carrier in case of
            necessity) are those places, except the place of departure and place of
            destination, set forth on the face hereof or shown in Carrier's timetables as
            scheduled stopping places for the route. Carriage to be performed hereunder
            by several successive Carriers is regarded as a single operation.<br/>
            <br/>
            4. For carriage to which the Montreal Convention does not apply, Carrier's liability
            limitation for cargo lost, damaged or delayed shall be 19 SDRs per kilogram
            unless a greater per kilogram monetary limitis provided in any applicable
            Convention or in Carrier's tariffs or general conditions of carriage.<br/>
            <br/>
            5. 5.1 Except when the Carrier has extended credit to the consignee without the
            written consent of the shipper, the shipper guarantees payment of all
            charges for the carriage due in accordance with Carrier's tariff, conditions
            of carriage and related regulations, applicable laws (including national
            laws implementing the Warsaw Convention and the Montreal
            Convention), government regulations, orders and requirements.
            5.2 When no part of the consignment is delivered, a claim with respect to
            such consignment will be considered even though transportation charges
            thereon are unpaid.<br/>
            <br/>
            6. 6.1 For cargo accepted for carriage, the Warsaw Convention and the
            Montreal Convention permit shipper to increase the limitation of liability
            by declaring a higher value for carriage and paying a supplemental
            charge if required.
        </div>
        <!--main right bill-->
        <div class="mainbk-right pull-right">
            6.2 In carriage to which neither the Warsaw Convention nor the Montreal
            Convention applies Carrier shall, in accordance with the procedures set
            forth in its general conditions of carriage and applicable tariffs, permit
            shipper to increase the limitation of liability by declaring a higher value for
            carriage and paying a supplemental charge if so required.<br/>
            <br/>
            7. 7.1 In cases of loss of, damage or delay to part of the cargo, the weight to be
            taken into account in determining Carrier's limit of liability shall be only
            the weight of the package or packages concerned.
            7.2 Notwithstanding any other provisions, for "foreign air transportation" as
            defined by the U.S. Transportation Code:<br/>
            7.2.1 in the case of loss of, damage or delay to a shipment, the weight
            to be used in determining Carrier's limit of liability shall be the
            weight which is used to determine the charge for carriage of such
            shipment; and<br/>
            7.2.2 in the case of loss of, damage or delay to a part of a shipment,
            the shipment weight in 7.2.1 shall be prorated to the packages
            covered by the same air waybill whose value is affected by the
            loss, damage or delay. The weight applicable in the case of loss
            or damage to one or more articles in a package shall be the
            weight of the entire package.<br/>
            <br/>
            8. Any exclusion or limitation of liability applicable to Carrier shall apply to Carrier's
            agents, employees, and representatives and to any person whose aircraft or
            equipment is used by Carrier for carriage and such person's agents, employees
            and representatives.<br/>
            <br/>
            9. Carrier undertakes to complete the carriage with reasonable dispatch. Where
            permitted by applicable laws, tariffs and government regulations, Carrier may
            use alternative carriers, aircraft or modes of transport without notice but with
            due regard to the interests of the shipper. Carrier is authorized by the shipper
            to select the routing and all intermediate stopping places that it deems
            appropriate or to change or deviate from the routing shown on the face hereof.<br/>
            <br/>
            10. Receipt by the person entitled to delivery of the cargo without complaint shall
            be prima facie evidence that the cargo has been delivered in good condition
            and in accordance with the contract of carriage.<br/>
            10.1 In the case of loss of, damage or delay to cargo a written complaint must
            be made to Carrier by the person entitled to delivery. Such complaint
            must be made:<br/>
            10.1.1 in the case of damage to the cargo, immediately after discovery
            of the damage and at the latest within 14 days from the date of
            receipt of the cargo;<br/>
            10.1.2 in the case of delay, within 21 days from the date on which the
            cargo was placed at the disposal of the person entitled to
            delivery.<br/>
            10.1.3 in the case of non-delivery of the cargo, within 120 days from the
            date of issue of the air waybill, or if an air waybill has not been
            issued, within 120 days from the date of receipt of the cargo for
            transportation by the Carrier.<br/>
            10.2 Such complaint may be made to the Carrier whose air waybill was used,
            or to the first Carrier or to the last Carrier or to the Carrier, which
            performed the carriage during which the loss, damage or delay took
            place.<br/>
            10.3 Unless a written complaint is made within the time limits specified in 10.1
            no action may be brought against Carrier.<br/>
            10.4 Any rights to damages against Carrier shall be extinguished unless an
            action is brought within two years from the date of arrival at the
            destination, or from the date on which the aircraft ought to have arrived,
            or from the date on which the carriage stopped.<br/>
            11. Shipper shall comply with all applicable laws and government regulations of any
            country to or from which the cargo may be carried, including those relating to
            the packing, carriage or delivery of the cargo, and shall furnish such information
            and attach such documents to the air waybill as may be necessary to comply
            with such laws and regulations. Carrier is not liable to shipper and shipper shall
            indemnify Carrier for loss or expense due to shipper's failure to comply with this
            provision.<br/>
            12. No agent, employee or representative of Carrier has authority to alter, modify or
            waive any provisions of this contract.
        </div>
    </div>




</div>
</body>
<script>
    function printlayer(el) {
        var restorepage = document.body.innerHTML;
        var printContent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = restorepage;

    }
</script>
</html>
