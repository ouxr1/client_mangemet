<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $query = $request->input('query');
        $customers = Customer::query();
        if ($query) {
            $customers = $customers->where('full_name', 'LIKE', '%' . $query . '%')
                                   ->orWhere('email', 'LIKE', '%' . $query . '%')
                                   ->orWhere('phone_number', 'LIKE', '%' . $query . '%')
                                   ->orWhere('company_name', 'LIKE', '%' . $query . '%')
                                   ->orWhere('linkedin_profile', 'LIKE', '%' . $query . '%')
                                   ->orWhere('interested', 'LIKE', '%' . $query . '%')
                                   ->orWhere('Position', 'LIKE', '%' . $query . '%')
                                   ->orWhere('purchase', 'LIKE', '%' . $query . '%')
                                   ->orWhere('country', 'LIKE', '%' . $query . '%');
        }
        $customers = $customers->paginate(7);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone_number' => 'required|string',
            'company_name' => 'required|string|max:255',
            'linkedin_profile' => 'nullable|string|max:255',
            'interested' => 'required|string|max:255',
            'Position' => 'required|string|max:255',
            'purchase' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $customer = new Customer;
        $customer->full_name = $request->input('full_name');
        $customer->email = $request->input('email');
        $customer->phone_number = $request->input('phone_number');
        $customer->company_name = $request->input('company_name');
        $customer->linkedin_profile = $request->input('linkedin_profile');
        $customer->interested = $request->input('interested');
        $customer->Position = $request->input('Position');
        $customer->purchase = $request->input('purchase');
        $customer->country = $request->input('country');
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show')->with([
            'customer'=>$customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
            $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|unique:customers,email,' . $customer->id,
                'phone_number' => 'required|string',
                'company_name' => 'required|string|max:255',
                'linkedin_profile' => 'nullable|string|max:255',
                'interested' => 'required|string|max:255',
                'Position' => 'required|string|max:255',
                'purchase' => 'required|string|max:255',
                'country' => 'required|string|max:255',
            ]);
            $customer->update([
                'full_name' => strip_tags($request->input('full_name')),
                'email' => strip_tags($request->input('email')),
                'phone_number' => strip_tags($request->input('phone_number')),
                'company_name' => strip_tags($request->input('company_name')),
                'linkedin_profile' => strip_tags($request->input('linkedin_profile')),
                'interested' => strip_tags($request->input('interested')),
                'Position' => strip_tags($request->input('Position')),
                'purchase' => strip_tags($request->input('purchase')),
                'country' => strip_tags($request->input('country')),
            ]);
            return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index',)->with('success', 'Customer has been deleted.');
    }

}
