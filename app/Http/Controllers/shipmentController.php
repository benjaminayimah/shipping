<?php

namespace App\Http\Controllers;

use App\Option;
use App\Quote;
use App\Shipment;
use http\QueryString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use function Psy\sh;

class shipmentController extends Controller{

    public function getShipments(){

        $query = DB::table('shipments')->where('publish_status', '1')->orderBy('id', 'DESC')->paginate('10');

        return view('admin.shipments', [
            'shipments' => $query,
        ]);
    }
    public function getDraft(){
        $query = DB::table('shipments')->where('publish_status', '0')->orderBy('id', 'DESC')->paginate('10');
        return view('admin.draft', [
            'drafts' => $query
        ]);
    }
    public function getAddShipment(){

        $options = DB::table('options')->orderBy('value')->get();

        return view('admin.add-shipment', [
            'options' => $options
        ]);
    }
    public function getEditShipment($id){

        $options = DB::table('options')->orderBy('value')->get();
        $shipment = DB::table('shipments')->where('tracking_id', $id)->first();

        return view('admin.edit-shipment', [
            'options' => $options,
            'shipment' => $shipment
        ]);
    }
    public function getShipmentDetails($id){

        $shipment = DB::table('shipments')->where('tracking_id', $id)->first();

        return view('admin.shipment-details', [
            'shipment' => $shipment
        ]);
    }
    public function posDelshipment(Request $request){
        //check if user has credentials
        $id = $request['inputId'];
        $del = Shipment::find($id);
        $del->delete();

        return redirect()->back();
    }
    public function postOption(Request $request){

        $this->validate($request, [
            'contentInput' => 'required',
            'type' => 'required'
        ]);
        $type = null;
        $value = $request['contentInput'];
        if ($request['type'] == 11){
            $type = 'shipmentType';
        }elseif ($request['type'] == 22){
            $type = 'cargoType';
        }elseif ($request['type'] == 33){
            $type = 'PackagingType';
        }elseif ($request['type'] == 44){
            $type = 'WeightUnit';
        }elseif ($request['type'] == 55){
            $type = 'ShipmentStatus';
        }elseif ($request['type'] == 66){
            $type = 'location';
        }elseif ($request['type'] == 77){
            $type = 'currency';
        }elseif ($request['type'] == 111){
            $type = 'section';
        }
        else{
            return 'error';
        }
        $chkQuery = DB::table('options')->where([
            ['type', '=', $type],
            ['value', '=', $value]
        ])->first();
        if ($chkQuery){
            return 'already exist';
        }else{
            $option = new Option();
            $option->type = $type;
            $option->value = $value;
            $option->save();

            return redirect()->back()->with('status', 'success');
        }
    }
    public function postDelOpt(Request $request){
        //check if authorised to del
        $del = Option::find($request['dataID']);
        $del->delete();
        return redirect()->back();
    }
    public function postEditOpt(Request $request){
        $this->validate($request, [
            'input' => 'required',
            'optID' => 'required'
        ]);
        $edit = Option::find($request['optID']);
        $edit->value = $request['input'];
        $edit->update();
        return response()->json(['msg' => $request], 200);
    }
    public function postShipment(Request $request){

        $this->validate($request, [
            'tracking_id' => 'required|unique:shipments',
            'title' => 'required'
        ]);
        $status = null;
        if($request['status'] == '0'){
            $status = '0';
        }elseif($request['status'] == '1'){
            $status = '1';
        }else{
            return 'error';
        }

        $shipment = new Shipment();
        $shipment->title = $request['title'];
        $shipment->email = $request['customerEmail'];
        $shipment->order_status = $request['orderStatus'];
        $shipment->pick_up = $request['pickUp'];
        $shipment->price = $request['amount'];
        $shipment->currency = $request['currency'];
        $shipment->tracking_id = $request['tracking_id'];
        $shipment->shipment_type = $request['shipmentType'];
        $shipment->cargo_name = $request['cargoName'];
        $shipment->est_weight = $request['estimatedWeight'];
        $shipment->weight_unit = $request['weightUnit'];
        $shipment->packaging = $request['packaging'];
        $shipment->quantity = $request['quantity'];
        $shipment->cargo_type = $request['cargoType'];
        $shipment->insurance = $request['insurance'];
        $shipment->sender_country = $request['senderCountry'];
        $shipment->sender_state = $request['senderstate'];
        $shipment->sender_city = $request['senderCity'];
        $shipment->sender_zipcode = $request['senderZipcode'];
        $shipment->sender_streetadd = $request['senderAddress'];
        $shipment->sender_apartment = $request['senderApartment'];
        $shipment->sender_name = $request['senderName'];
        $shipment->sender_number = $request['senderNumber'];
        $shipment->receiver_country = $request['receiverCountry'];
        $shipment->receiver_state = $request['receiverstate'];
        $shipment->receiver_city = $request['receiverCity'];
        $shipment->receiver_zipcode = $request['receiverZipcode'];
        $shipment->receiver_streetadd = $request['receiverAddress'];
        $shipment->receiver_apartment = $request['receiverApartment'];
        $shipment->receiver_name = $request['receiverName'];
        $shipment->receiver_number = $request['receiverNumber'];
        $shipment->pickup_name = $request['pickUpName'];
        $shipment->pickup_number = $request['pickUpPhoneNumber'];
        $shipment->pickup_date = $request['pickUpDate'];
        $shipment->additional_details = $request['additionalInfo'];
        $shipment->publish_status = $status;
        $shipment->author = Auth::user()->name;
        $shipment->save();

        return redirect()->back();

    }
    public function postShipmentEdit(Request $request){
        $id = $request['id'];
        $this->validate($request, [
            'title' => 'required'
        ]);
        $status = null;
        if($request['status'] == '0'){
            $status = '0';
        }elseif($request['status'] == '1'){
            $status = '1';
        }else{
            return 'error';
        }
        $shipment = Shipment::find($id);
        $shipment->title = $request['title'];
        $shipment->email = $request['customerEmail'];
        $shipment->order_status = $request['orderStatus'];
        $shipment->pick_up = $request['pickUp'];
        $shipment->price = $request['amount'];
        $shipment->currency = $request['currency'];
        $shipment->shipment_type = $request['shipmentType'];
        $shipment->cargo_name = $request['cargoName'];
        $shipment->est_weight = $request['estimatedWeight'];
        $shipment->weight_unit = $request['weightUnit'];
        $shipment->packaging = $request['packaging'];
        $shipment->quantity = $request['quantity'];
        $shipment->cargo_type = $request['cargoType'];
        $shipment->insurance = $request['insurance'];
        $shipment->sender_country = $request['senderCountry'];
        $shipment->sender_state = $request['senderstate'];
        $shipment->sender_city = $request['senderCity'];
        $shipment->sender_zipcode = $request['senderZipcode'];
        $shipment->sender_streetadd = $request['senderAddress'];
        $shipment->sender_apartment = $request['senderApartment'];
        $shipment->sender_name = $request['senderName'];
        $shipment->sender_number = $request['senderNumber'];
        $shipment->receiver_country = $request['receiverCountry'];
        $shipment->receiver_state = $request['receiverstate'];
        $shipment->receiver_city = $request['receiverCity'];
        $shipment->receiver_zipcode = $request['receiverZipcode'];
        $shipment->receiver_streetadd = $request['receiverAddress'];
        $shipment->receiver_apartment = $request['receiverApartment'];
        $shipment->receiver_name = $request['receiverName'];
        $shipment->receiver_number = $request['receiverNumber'];
        $shipment->pickup_name = $request['pickUpName'];
        $shipment->pickup_number = $request['pickUpPhoneNumber'];
        $shipment->pickup_date = $request['pickUpDate'];
        $shipment->additional_details = $request['additionalInfo'];
        $shipment->publish_status = $status;
        $shipment->author = Auth::user()->name;
        $shipment->update();

        return redirect()->back();
    }
    public function postQuote(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
        $shipping_mode = null;
        if($request['airFreighting'] == 'on' && $request['seaFreighting'] == 'on'){
            $shipping_mode = 'air freighting, sea freighting';
        } elseif ($request['airFreighting'] == 'on'){
            $shipping_mode = 'air freighting';
        }elseif($request['seaFreighting'] == 'on'){
            $shipping_mode = 'sea freighting';
        }
        $insert = new Quote();
        $insert->name = $request['name'];
        $insert->email = $request['email'];
        $insert->phone = $request['phone'];
        $insert->company =$request['company'];
        $insert->departure_city = $request['departureCity'];
        $insert->delivery_city = $request['deliveryCity'];
        $insert->weight = $request['weight'];
        $insert->dimensions = $request['dimension'];
        $insert->shipping_mode = $shipping_mode;
        $insert->addition_info = $request['additionalInfo'];
        $insert->save();

        return redirect()->back()->with('status', 'Success! Your quote is submitted. Thank you.');
    }
    public function getAdminAirwaybill(){

        return view('admin.awb');
    }
    public function postAdminAWB(Request $request){

        $piece = $_POST['ratePieces'];
        $rateGross = $_POST['rateGross'];
        $rateUnit = $_POST['rateUnit'];
        $rateItem = $_POST['rateItem'];
        $rateChrg = $_POST['rateChrg'];
        $raterChr = $_POST['raterChr'];
        $rateTotal = $_POST['rateTotal'];
        $rateNature = $_POST['rateNature'];

        return view('admin.awb-print-preview', [
            'previews' => $request,
            'pieces' => $piece,
            'ratGross' => $rateGross,
            'ratUnit' => $rateUnit,
            'ratItem' => $rateItem,
            'ratChrg' => $rateChrg,
            'ratChr' => $raterChr,
            'ratTotal' => $rateTotal,
            'ratNature' => $rateNature
        ]);
    }
}
