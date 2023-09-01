<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Member;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::latest()->simplePaginate(10);
        $members = Member::all();
        $events =  Event::all();
        return view('pages.transaction.index-transaction', compact('transactions', 'members', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $member = Member::firstWhere('id_member', $request->member_id);
        $event = Event::firstWhere('slug', $request->event);
        $randomId       =   rand(1, 999);

        if ($member) {
            $transaksi = Transaction::firstWhere([
                'member_id' => $member->id_member,
                'event_id' => $event->id
            ]);

            if ($transaksi) {
                return redirect('/pembayaran/' . $transaksi->unique_number . '/transfer');
            }

            $transaction = new Transaction();
            $transaction->member_id = $member->id_member;
            $transaction->event_id = $event->id;
            $transaction->pay_method = $request->pay_method;
            $transaction->pay = $event->price;
            $transaction->unique_number = $event->price + $randomId;
            $transaction->status = 0;
            $transaction->check_in = 0;
            $transaction->save();

            return redirect('/pembayaran/' . $transaction->unique_number . '/transfer');
        } else {
            return back()->with('status', 'ID Member tidak terdaftar');
        }
        // Transaction::create([
        //     'member_id' =>
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $transaksi = Transaction::firstWhere('unique_number', $transaction->unique_number);

        return view('transfer-rek', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaksi =  Transaction::firstWhere('unique_number', $transaction->unique_number);

        $transaksi->update([
            'status' => true
        ]);

        return back()->with('success', 'Transaksi terverifikasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::findOrFail($transaction->id)->delete();
        return back()->with('success', 'Transaksi berhasil dihapus!');
    }

    public function all()
    {
        $transactions = Transaction::latest()->simplePaginate(10);
        $members = Member::all();
        $events =  Event::all();
        return view('pages.transaction.all-transaction', compact('transactions', 'members', 'events'));
    }

    public function proses()
    {
        $transactions = Transaction::where('status', 0)->latest()->simplePaginate(10);
        return view('pages.transaction.proses-transaction', compact('transactions'));
    }
    public function selesai()
    {
        $transactions = Transaction::where('status', 1)->latest()->simplePaginate(10);
        return view('pages.transaction.selesai-transaction', compact('transactions'));
    }

    public function checkin()
    {
        $transactions = Transaction::where('status', 1)->latest()->simplePaginate(10);
        return view('pages.transaction.checkin-transaction', compact('transactions'));
    }

    public function checkin_poin(Transaction $transaction)
    {
        $transaksi = Transaction::firstWhere('unique_number', $transaction->unique_number);
        $member = Member::firstWhere('id_member', $transaksi->member_id);
        $dt = Carbon::now();
        $now = $dt->toTimeString();

        $transaksi->update([
            'check_in' => 1
        ]);


        if ($now >= "00:00:00" && $now <= "10:00:00") {
            $member->update([
                'poin' =>  $member->poin + 2,
            ]);
        } else if ($now >= "10:00:01" && $now <= "23:59:59") {
            $member->update([
                'poin' =>  $member->poin + 1,
            ]);
        };
        return back()->with('success', 'Check-in berhasil!');
    }

    public function scan()
    {
        return view('pages.transaction.scan-transaction');
    }

    public function scan_poin()
    {
        $member = Member::firstWhere('id_member', request('id_member'));
        $dt = Carbon::now();
        $now = $dt->toTimeString();
        if ($member) {
            $transaction = Transaction::where([
                'member_id' => $member->id_member,
                'status' => 1,
            ])->get();
            if ($transaction->count()) {
                $transaksi = $transaction->firstWhere('check_in', 0);
                if ($transaksi) {
                    $transaksi->update([
                        'check_in' => 1
                    ]);

                    if ($now >= "00:00:00" && $now <= "10:00:00") {
                        $member->update([
                            'poin' =>  $member->poin + 2,
                        ]);
                    } else if ($now >= "10:00:01" && $now <= "23:59:59") {
                        $member->update([
                            'poin' =>  $member->poin + 1,
                        ]);
                    };

                    return back()->with('success', 'Check-in berhasil!');
                } else {
                    return back()->with('status', 'Transaksi telah terCheck-in!');
                }
            } else {
                return back()->with('status', 'Transaksi tidak ditemukan!');
            }
        } else {
            return back()->with('status', 'Member tidak terdaftar!');
        }
    }
}