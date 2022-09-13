<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\ReservationAdminMail;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function reservation($id)
    {
        $reservations = Reservation::where('prestataire_id', $id)->where('is_active', 1)->get();

        if ($reservations->isNotEmpty()) {

            return redirect()->back()->with('error', trans('success.reservatres'));
        } else {

            $reservation = new Reservation();
            $reservation->user_id = auth()->user()->id;
            $reservation->prestataire_id = $id;
            $reservation->reservation_date = Carbon::today();
            $reservation->is_active = 1;

            $reservation->save();

            Mail::to('noreply@centralresource.net')->send(new ReservationAdminMail($reservation));

            return redirect()->route('client.confirm_tel')->with('success', trans('success.demancompte'));
        }
    }
}
