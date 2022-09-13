<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::where('status', 0)->get();

        return view('admin.reservations.index')->with('reservations', $reservations);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archived()
    {
        $reservations = Reservation::where('status', 1)->get();

        return view('admin.reservations.archived')->with('reservations', $reservations);
    }

    public function changeUserStatus(Request $request)
    {
        $reservation = Reservation::findOrFail($request->reservation_id);
        $reservation->status = $request->status;

        $reservation->save();

        return response()->json(['success' => trans('success.reservsta')]);
    }

    public function take($id)
    {
        return view('admin.reservations.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        $reservations = Reservation::where('user_id', $request->user_id)
            ->where('is_active', 1)
            ->get();

        if ($reservations->isNotEmpty()) {

            return redirect()->back()->with('error', trans('success.alrest'));
        } else {

            $reservation = new Reservation();
            $reservation->user_id = auth()->user()->id;
            $reservation->message = $request->input('message');
            $reservation->reservation_date = Carbon::today();
            $reservation->is_active = 1;

            $reservation->save();

            return redirect()->route('admin.reservations.index')->with('success', trans('success.reserregi'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('admin.reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('admin.reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ReservationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->user_id = auth()->user()->id;
        $reservation->message = $request->input('message');
        $reservation->reservation_date = Carbon::today();
        $reservation->is_active = 1;
        $reservation->save();

        return redirect()->route('admin.reservations.index')->with('success', trans('success.reserupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('success', trans('success.reserdelete'));
    }
}
