<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contrat;
use App\Models\Facture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $end_date = Carbon::parse($request->end_date)->toDateTimeString();

        $client = $request->input('client');
        $query = '';

        $facture = Contrat::query()->where(function ($query) use ($request) {
            return $query->whereBetween('date_effet', [$request->start_date, $request->end_date])
                ->orWhereBetween('date_fin', [$request->start_date, $request->end_date]);
        })->get();

        return View('admin.factures.index', compact('facture', 'start_date', 'end_date', 'client'));
    }

    function print($id) {
        $contrat = Contrat::findOrFail($id)
            ->where('date_fin', '<', Carbon::now())
            ->get();

        return view('admin.factures.print', compact('contrat'));
    }

    public function facture($id)
    {
        $contrat = Contrat::findOrFail($id);

        return view('admin.factures.print', compact('contrat'));
    }

    public function factures(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $end_date = Carbon::parse($request->end_date)->toDateTimeString();
        $query = '';

        $facture = Facture::query()->where(function ($query) use ($request) {
            return $query->whereBetween('date_facture', [$request->start_date, $request->end_date]);
        })->get();

        return View('admin.factures.generate', compact('facture', 'start_date', 'end_date'));
    }

    public function allClients(Request $request)
    {
        // check if ajax request is coming or not
        if ($request->ajax()) {
            $query = $request->get('client');
            // select country name from database
            $data = DB::table('users')
                ->where('type_users', 'client')
                ->where('last_name', 'like', $query . '%')
                ->orWhere('first_name', 'like', $query . '%')
                ->get();
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data) > 0) {
                // concatenate output to the array
                $output = '<ul class="list-group" id="clients" style="display: block; position: relative; z-index: 1">';
                // loop through the result array
                foreach ($data as $row) {
                    // concatenate output to the array
                    $output .= '<li class="list-group-item client_li" data-id="' . $row->id . '">' . $row->last_name . ' ' . $row->first_name . '</li>';
                }
                // end of output
                $output .= '</ul>';
            } else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item client_li"><a class="client">' . 'No customer found' . '</a></li>';
            }
            // return output result array
            return $output;
        }
    }
}
