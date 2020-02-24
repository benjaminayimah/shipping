@extends('layouts.admin')
@section('title')
    Dashboard | Airway bill
@stop
@section('pageTitle')
    Airway bill
@endsection
@section('titlemain')
    <li class="breadcrumb-item"><a href="{{ route('get.shipments') }}">Shipments</a></li>
@endsection

@section('second-card')
    <div class="row">
        <div class="col-xl-10 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Airway bill</h3>
                        </div>
                        <div class=" text-right">
                            <a href="{{ route('get.addShipment') }}" class="btn btn-primary btn-sm">Add new shipment</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive card-body">
                    <style>
                        #awb_left{ background-color: #ffffff; border-radius: 5px; padding: 30px 15px}
                        fieldset {
                            display: block;
                            margin-left: 2px;
                            margin-right: 2px;
                            padding-top: 0.35em;
                            padding-bottom: 0.625em;
                            padding-left: 0.75em;
                            padding-right: 0.75em;
                            border: 1px #bbbbbb solid;
                        }
                        fieldset input, textarea{ border: 1px #cccccc solid; border-radius: 2px; padding: 5px 10px; font-size: 13px; width: 100%}
                        legend {width: auto !important;font-size: 13px;padding: 0 5px;text-transform: uppercase;color: #5e72e4;}
                        .awb-row-right{ width: 50%; padding: 10px}
                        .awb-row-left{ width: 50%; padding: 10px}
                        #airwaybill_form td{text-align: left;padding: 5px 0; font-size: 14px; border:none !important; width: auto;}
                        #airwaybill_form tr:nth-child(odd){background-color: #ffffff;border-bottom: none}
                        .descriptn-table td,.descriptn-table th{padding: 5px !important;}
                        .descriptn-table tr{border-bottom: 1px #000000 solid;border-top: 1px #000000 solid; height: 31px !important;}
                        .descriptn-table tr:nth-child(even){ background-color: rgb(238, 238, 238) !important; }
                        table tbody tr th{ font-size: 14px; font-weight: 600; }

                    </style>
                    <script>
                        function addNewrow() {
                            var tm = new Date();
                            var $id = tm.getTime();
                            $('#rate-tbody').append('<tr data-id="'+$id+'">'
                                +'<td>'+'<input name="ratePieces[]" type="text">'+'</td>'+
                                '<td>'+'<input name="rateGross[]" type="text">'+'</td>'+
                                '<td>'+'<select name="rateUnit[]">'+'<option value="">'+'</option>'+'<option value="K">'+'K'+'</option>'+'<option value="L">'+'L'+'</option>'+'</select>'+'</td>'+
                                '<td>'+'<input name="rateItem[]" type="text">'+'</td>'+
                                '<td>'+'<input name="rateChrg[]" type="text">'+'</td>'+
                                '<td>'+'<input name="raterChr[]" type="text">'+'</td>'+
                                '<td>'+'<input name="rateTotal[]" type="text">'+'</td>'+
                                '<td>'+'<textarea rows="1" name="rateNature[]">'+'</textarea>'+'</td>'+
                                '</tr>'
                            );
                        }
                    </script>
                    <div class="row" id="printme">
                        <form id="airwaybill_form"  method="post" action="{{ route('post.admin.awb') }}">
                            @csrf
                            <div id="awb_left" class="pull-left">
                                <div class="awb-row row">
                                    <div class="awb-row-left pull-left">
                                        <fieldset>
                                            <legend>Shipper</legend>
                                            <table>
                                                <tr>
                                                    <td>Account number:</td>
                                                    <td><input name="shipperNumber" id="shipperNumber" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Name & Address:</td>
                                                    <td><textarea rows="4" name="shipperName" id="shipperName"></textarea></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Consignee</legend>
                                            <table class="table">
                                                <tr>
                                                    <td>Account number:</td>
                                                    <td><input name="consigneeNumber" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Name & address:</td>
                                                    <td><textarea name="consigneeName" id="consigneeName" rows="4"></textarea></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Issuing Carrier's Agent</legend>
                                            <table>
                                                <tr>
                                                    <td>Name & City:</td>
                                                    <td><textarea name="issuerName" id="issuerName" rows="4"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>IATA Code:</td>
                                                    <td><input name="issuerIATA" id="issuerIATA" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Account No.:</td>
                                                    <td><input name="issuerAcct" id="issuerAcct" type="text"></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Routing and flight bookings</legend>
                                            <table>
                                                <tr>
                                                    <td>Departure:</td>
                                                    <td><input name="flightDept" id="flightDept" type="text" style="width: 100%"></td>
                                                </tr>
                                            </table>
                                            <table>
                                                <tr>
                                                    <td>Route</td>
                                                    <td>To: <input name="to1" id="to1" type="text"></td>
                                                    <td>By First Carrier<input name="by1" id="by1" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>To: <input name="to2" id="to2" type="text"></td>
                                                    <td>By: <input name="by2" id="by2" type="text"></td>
                                                    <td>To: <input name="to3" id="to3" type="text"></td>
                                                    <td>By: <input name="by3" id="by3" type="text"></td>
                                                </tr>
                                            </table>
                                            <table>
                                                <tr>
                                                    <td>Destination:</td>
                                                    <td><input name="flightDestn" id="flightDestn" type="text" style="width: 100%"></td>
                                                </tr>
                                            </table>
                                            <table>
                                                <tr>
                                                    <td>Flight/Date</td>
                                                    <td><input name="flightname" id="flightname" type="text"></td>
                                                    <td><input name="flightDate" id="flightDate" type="text"></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </div>
                                    <div class="awb-row-right pull-left">
                                        <fieldset>
                                            <legend>AWB consigment details</legend>
                                            <table>
                                                <tr>
                                                    <td>AWB ID:</td>
                                                    <td><input type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Airport of departure:</td>
                                                    <td><input type="text"></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <fieldset style="width: 100%">
                                            <legend>Issuer</legend>
                                            <table>
                                                <tr class="tr">
                                                    <td class="td">Issued By</td>
                                                    <td class="td"><textarea name="issuedBy" id="issuedBy" rows="4"></textarea></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <fieldset style="width: 100%">
                                            <legend>Accounting Informantion</legend>
                                            <table>
                                                <tr>
                                                    <td>Details</td>
                                                    <td><textarea name="issuedAccDetails" id="issuedAccDetails" rows="4"></textarea></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Shipment Reference Information</legend>
                                            <table>
                                                <tr>
                                                    <td>Reference No.:</td>
                                                    @if(!empty($shipmentID))
                                                        <td><input name="shipRefNo" id="shipRefNo" style="font-weight: 700; color: green" value="{{ $shipmentID }}" type="text"></td>
                                                    @elseif(empty($shipmentID))
                                                        <td><input name="shipRefNo" style="font-weight: 700;" id="shipRefNo"  type="text"></td>
                                                    @endif

                                                </tr>
                                                <tr>
                                                    <td>Information:</td>
                                                    <td><textarea name="optInfo" id="optInfo" rows="4"></textarea></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Charges Declaration</legend>
                                            <table>
                                                <tr>
                                                    <td>Currency</td>
                                                    <td><input name="currency" id="currency" type="text"></td>
                                                    <td>CHCG</td>
                                                    <td><input name="CHCG" id="CHCG" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Value for Carriage:</td>
                                                    <td><input name="valueCarriage" id="valueCarriage" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Value for customs:</td>
                                                    <td><input name="valueCustoms" id="valueCustoms" type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Amount of Insurance:</td>
                                                    <td><input name="amtInsurance" id="amtInsurance" type="text"></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </div>
                                    <fieldset style="width: 100%; margin: 0 12px">
                                        <legend>Handling Information</legend>
                                        <table>
                                            <tr>
                                                <td>Requirements</td>
                                                <td><textarea name="handlingInfo" id="handlingInfo" rows="4"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>SCI:</td>
                                                <td><input name="SCI" id="SCI" style="width: 100px"></td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                    <fieldset style="width: 100%; margin: 0 12px; position: relative; max-height: 400px; overflow-y:auto">
                                        <legend>Rate description</legend>
                                        <a href="javascript:void(0)" onclick="addNewrow()" class="add-rate btn-primary btn-sm btn">Add</a>
                                        <table id="rate-tbody" class="descriptn-table">
                                            <tr style="border-bottom: 2px #999999 solid; border-top: none">
                                                <th>Pieces</th>
                                                <th>Gross w.</th>
                                                <th>kg/lb</th>
                                                <th>Item no.</th>
                                                <th>Charg w.</th>
                                                <th>Rate/Charge</th>
                                                <th>Total</th>
                                                <th>Nature & quantity</th>
                                                <input name="ratePieces[]" type="hidden">
                                                <input name="rateGross[]" type="hidden">
                                                <input name="rateUnit[]" type="hidden">
                                                <input name="rateChrg[]" type="hidden">
                                                <input name="rateItem[]" type="hidden">
                                                <input name="raterChr[]" type="hidden">
                                                <input name="rateTotal[]" type="hidden">
                                                <input name="rateNature[]" type="hidden">
                                            </tr>
                                        </table>
                                    </fieldset>
                                    <div class="awb-row-left pull-left">
                                        <fieldset>
                                            <legend>Charges summary</legend>
                                            <table>
                                                <tr>
                                                    <th></th>
                                                    <th>Prepaid</th>
                                                    <th>Collect</th>
                                                </tr>
                                                <tr>
                                                    <td>Weight Charge</td>
                                                    <td><input name="preWcharge" id="preWcharge" type="text" style="width: 100px"></td>
                                                    <td><input name="colWcharge" id="colWcharge" type="text" style="width: 100px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Valuation charge</td>
                                                    <td><input name="preValcharge" id="preValcharge" type="text" style="width: 100px"></td>
                                                    <td><input name="colValcharge" id="colValcharge" type="text" style="width: 100px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Tax</td>
                                                    <td><input name="preTax" id="preTax" type="text" style="width: 100px"></td>
                                                    <td><input name="colTax" id="colTax" type="text" style="width: 100px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Other charges due agent</td>
                                                    <td><input name="preOtherCh" id="preOtherCh" type="text" style="width: 100px"></td>
                                                    <td><input name="colOtherCh" id="colOtherCh" type="text" style="width: 100px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Other charges due carrier</td>
                                                    <td><input name="preChCarrier" id="preChCarrier" type="text" style="width: 100px"></td>
                                                    <td><input name="colChCarrier" id="colChCarrier" type="text" style="width: 100px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td><input name="preTotal" id="preTotal" type="text" style="width: 100px"></td>
                                                    <td><input name="colTotal" id="colTotal" type="text" style="width: 100px"></td>
                                                </tr>
                                            </table>
                                        </fieldset>

                                        <fieldset>
                                            <legend>CC charges in destination currency</legend>
                                            <table>
                                                <tr>
                                                    <td>Currency conv. rates</td>
                                                    <td><input name="preCurrRate" id="preCurrRate" type="text" style="width: 100px"></td>
                                                </tr>
                                                <tr>
                                                    <td>CC charges in dest.</td>
                                                    <td><input name="colCurrRate" id="colCurrRate" type="text" style="width: 100px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Charges at dest.</td>
                                                    <td><input name="chgsDest" id="chgsDest" type="text" style="width: 100px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Total Collect</td>
                                                    <td><input name="totalChgs" id="totalChgs" type="text" style="width: 100px"></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </div>
                                    <div class="awb-row-left pull-left">
                                        <fieldset>
                                            <legend>Other Charges</legend>
                                            <table>
                                                <tr>
                                                    <td>Add Details</td>
                                                    <td><textarea name="otherChags" id="otherChags" rows="4"></textarea></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Shipper's Certification</legend>
                                            <table>
                                                <tr>
                                                    <td>Signature</td>
                                                    <td><input type="text" style="width: 100px"></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Carrier's execution</legend>
                                            <table>
                                                <tr>
                                                    <td>Date</td>
                                                    <td><input name="shpDate" id="shpDate" type="text" style="width: 100px"></td>
                                                    <td>Place</td>
                                                    <td><input name="shpPlace" id="shpPlace" type="text" style="width: 100px"></td>
                                                </tr>
                                                <tr class="tr">
                                                    <td class="td">Signature</td>
                                                    <td class="td"><input type="text" style="width: 100px"></td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">post</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer border-0">
                </div>
            </div>
        </div>
    </div>
@endsection
