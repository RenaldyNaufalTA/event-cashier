<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;

class EventController extends Controller
{

    public $message = [
        'max' => ':attribute maksimal :max Karakter!',
        'image' => ':attribute harus berupa Foto!',
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
        $events = Event::orderBy('start_date', 'desc')->get();
        return view('pages.event.index-event', compact('events'));
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
            'title' => 'required|max:255',
            'slug' => 'required|unique:events|max:255',
            'image' => 'image|max:5024',
            'place' => 'required|max:255',
            'address' => 'required|max:255',
            'price' => 'required|numeric',
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255',
        ], $this->message);

        $image       = $request->file('image');
        $filename    = time() . '_' . str_replace(" ", "_", $image->getClientOriginalName());
        $image->storeAs('public/event-images', $filename);

        Event::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'image' => $filename,
            'place' => $request->place,
            'address' => $request->address,
            'price' => $request->price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return back()->with('success', 'Event berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $event = Event::where('slug', $event->slug)->firstOrFail();
        return view('pages.event.edit-event', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|max:5024',
            'place' => 'required|max:255',
            'address' => 'required|max:255',
            'price' => 'required|numeric',
            'start_date' => 'required|max:255',
            'end_date' => 'required|max:255',
        ];

        if ($request->slug != $event->slug) {
            $rules['slug'] = 'required|unique:events|max:255';
        }

        $validate = $request->validate($rules, $this->message);

        if (request()->hasFile('image') && request('image') != '') {
            // delete old image
            $imagePath = public_path('storage/event-images/' . $event->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $image = request()->file('image');
            $imagename    = time() . '_' . str_replace(" ", "_", $image->getClientOriginalName());
            $image->storeAs('public/event-images', $imagename);

            $validate['image'] = $imagename;
        }
        $event = Event::where('slug', $event->slug)->update($validate);

        return redirect('/event')->with('success', 'Event berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {

        $imagePath = public_path('storage/event-images/' . $event->image);
        if (File::exists($imagePath)) {
            unlink($imagePath);
        }
        Event::findOrFail($event->id)->delete();

        return back()->with('status', 'Event berhasil dihapus!!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Event::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function pembayaran(Request $request, Event $event)
    {
        $event = Event::firstWhere('slug', $event->slug);

        return view('pembayaran', compact('event'));
    }
}
