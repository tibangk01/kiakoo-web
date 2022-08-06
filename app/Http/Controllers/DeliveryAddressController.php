<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Services\ShippingCostService;
use Illuminate\Support\Facades\Validator;

class DeliveryAddressController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $user->load(['customer.human', 'customer.addresses.district']);

        // get shipping cost:
        session([
            'kiakoo_shipping_cost' => [
                // 'amount' => (new ShippingCostService)->get(), // calculation coming 🕐
                'amount' => 0,
            ]
        ]);

        return view('delivery-addresses.index', [
            'userInfos' => [
                'first_name' => $user->customer->human->first_name,
                'last_name' => $user->customer->human->last_name,
                'phone_number' => $user->customer->phone_number,
                'address' => $user->customer->addresses->last()->value,
                'district' => $user->customer->addresses->last()->district->name,
            ],
        ]);
    }

    public function create()
    {
        $user = Auth::user();

        $user->load(['customer.human', 'customer.addresses.district']);

        // get shipping cost:
        session([
            'kiakoo_shipping_cost' => [
                'amount' => (new ShippingCostService)->get(), // calculation coming 🕐
                'amount' => 0,
            ]
        ]);

        return view('delivery-addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $customer = $user->customer;

        $validator = Validator::make($request->all(), [
            'phone_number' => ['required', 'string', 'max:25', Rule::unique('customers')->ignore($customer->id)],
            'district_id' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:1024'],
        ]);

        if ($validator->fails()) {

            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        DB::beginTransaction();
        try {
            // update phone
            $customer->update(['phone_number' => $request->phone_number]);

            // insert address + district_id
            Address::create([
                'customer_id' => $customer->id,
                'value' => $request->address,
                'district_id' => $request->district_id,

            ]);

            DB::commit();

            session()->flash('address_added', true);
            return response()->json(['status' => 1, 'success' => route('delivery-address.index')]);

        } catch (\Throwable $e) {

            DB::rollBack();

            //TODO: send message to developer email ...
            Log::warning($e->getMessage());

            return response()->json(['status' => 2, 'error' => "Erreur interne, veuillez réessayer plus tard. Merci!"]);
        }









    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    public function update(Request $request, Address $address)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => ['required', 'string', 'max:25', Rule::unique('customers')->ignore($request->customer_id)],
            'district_id' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:1024'],
        ]);

        if ($validator->fails()) {

            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        DB::beginTransaction();
        try {

            // update phone
            $customer = Customer::findOrFail($request->customer_id);
            $customer->update(['phone_number' => $request->phone_number]);

            // update address + district_id,
            $address->update([
                'value' => $request->address,
                'district_id' => $request->district_id,
            ]);

            DB::commit();

            return response()->json(['status' => 1, 'success' => URL::previous()]);
        } catch (\Throwable $e) {

            DB::rollBack();

            //TODO: refoctor this server error message
            return response()->json(['status' => 2, 'error' => "Une erreur s'est produite."]);
        }
    }

    public function delete(Address $address)
    {
        //
    }

    public function destroy(Address $address)
    {
        //
    }

    /**
     * Display a listing of the deleted resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleted()
    {
        //
    }

    /**
     * Restore a trashed resource from storage.
     *
     * @param  int  $address
     * @return \Illuminate\Http\Response
     */
    public function restore($address)
    {
        //
    }
}
