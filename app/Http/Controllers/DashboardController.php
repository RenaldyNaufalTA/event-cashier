<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $members = Member::count();
        $transactionPending = Transaction::where('status', 0)->count();
        $transactionDone = Transaction::where('status', 1)->count();
        $events = Event::count();
        return view('dashboard', compact('members', 'transactionPending', 'transactionDone', 'events'));
    }
}
