<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Call;
use Illuminate\Support\Facades\DB;

class NextCallDateController extends Controller
{
    public function next_call_date()
    {
        $customers = Customer::all();

        // Get the most recent next call date for each customer
        $lastNextCallDates = Call::select('customer_id', DB::raw('MAX(next_call_date) as last_next_call_date'))
                                  ->groupBy('customer_id')
                                  ->pluck('last_next_call_date', 'customer_id');

        return view('next_call_date', compact('customers', 'lastNextCallDates'));
    }
}

