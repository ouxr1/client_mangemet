<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Call;
use Illuminate\Http\Request;

class CallsController extends Controller
{
    /**
     * Display a listing of the calls for a customer.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        $calls = $customer->call()->paginate(7);
        return view('calls.index', compact('customer', 'calls'));
    }



    /**
     * Show the form for creating a new call.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        return view('calls.create', compact('customer'));
    }

    /**
     * Store a newly created call in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        $request->validate([
            'call_date' => 'required|date',
            'comment' => 'required|string|max:255',
            'next_call_date' => 'string|max:255',
        ]);

        $call = new Call;
        $call->call_date = $request->input('call_date');
        $call->comment = $request->input('comment');
        $call->next_call_date = $request->input('next_call_date');
        $call->customer_id = $customer->id;
        $call->save();

        return redirect()->route('calls.index', $customer)->with('success', 'Call scheduled successfully.');
    }

    /**
     * Display the specified call.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Call $call)
    {
        return view('calls.show', compact('customer', 'call'));
    }
    public function edit (Customer $customer,Call $call){
        return view('calls.edit',compact('customer','call'));
    }
    public function update(Request $request, Customer $customer, Call $call)
    {
        $request->validate([
            'call_date' => 'required|date',
            'comment' => 'required|string|max:255',
            'next_call_date' => 'string|max:255',
        ]);
        $call->update([
            'call_date' => strip_tags($request->input('call_date')),
            'comment' => strip_tags($request->input('comment')),
            'next_call_date' => strip_tags($request->input('next_call_date')),
        ]);
        return redirect()->route('calls.index', $customer)->with('success', 'Call updated successfully.');
    }

    public function destroy(Customer $customer, Call $call)
{
    $call->delete();
    return redirect()->route('calls.index', $customer->id)
        ->with('status', 'Call deleted successfully.');
}


}
