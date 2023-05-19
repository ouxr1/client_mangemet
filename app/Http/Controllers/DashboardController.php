<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Call;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $callsCount = Call::count();
        $customersCount = Customer::count();
        $interestedCustomersCount = Customer::where('interested', 1)->count();
        $nextCallDate = Call::orderBy('call_date', 'asc')->pluck('call_date')->first();
        $nextCallDate = Carbon::parse($nextCallDate)->format('Y-m-d');

        return view('dashboard', compact('callsCount', 'customersCount', 'interestedCustomersCount', 'nextCallDate'));

    }
    public function intersted(Request $request)
    {
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
        $customers = $customers->paginate(10);
        return view('intersted', compact('customers'));
    }
}

