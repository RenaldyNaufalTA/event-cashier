<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public $message = [
        'max' => ':attribute maksimal :max Karakter!',
        'unique' => ':attribute sudah digunakan!',
        'required' => ':attribute harus di isi!',
        'numeric' => ':attribute harus berisi angka!',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('pages.member.index-member', compact('members'));
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
        $this->validate($request, [
            'id_member' => 'required|numeric|unique:members',
            'name' => 'required|max:255',
            'poin' => 'numeric'
        ], $this->message);

        Member::create($request->all());

        return back()->with('success', 'Member berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $member = Member::firstWhere('id_member', $member->id_member);
        return view('pages.member.edit-member', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $rule = [
            'name' => 'required|max:255',
            'poin' => 'numeric'
        ];
        if ($request->id_member != $member->id_member) {
            $rule['id_member'] = 'required|numeric|unique:members';
        }
        $validate = $request->validate($rule, $this->message);

        $member = Member::firstWhere('id_member', $member->id_member)->update($validate);

        return redirect('/member')->with('success', 'Member berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        Member::findOrFail($member->id)->delete();
        return back()->with('status', 'Member berhasil dihapus!');
    }

    public function checkPoinForm()
    {
        $member = "";
        if (request('search')) {
            $member = Member::where('id_member', 'like', request('search'))
                ->orWhere('name', 'like', '%' . request('search') . '%')->first();
            if ($member) {
                return view('pages.member.check-poin-member', compact('member'));
            } else {
                $member = "";
                return redirect('/cek-poin-member')->with(['member' => $member])->with('status', 'Member tidak ditemukan!');
            }
        };
        return view('pages.member.check-poin-member', compact('member'));
    }
}