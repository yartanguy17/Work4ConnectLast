<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContratRequest;
use App\Models\Contrat;
use App\Models\Facture;
use App\Models\TypeContrat;
use App\Models\Ville;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContratController extends Controller
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
        $contrats = Contrat::where('is_active', 1)->orderBy('created_at', 'desc')->get();

        return view('admin.contrats.index')->with('contrats', $contrats);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archived()
    {
        $contrats = Contrat::where('date_fin', '<', \Carbon\Carbon::today())->orderBy('created_at', 'desc')->get();

        // dd($contrats);
        return view('admin.contrats.archived')->with('contrats', $contrats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypeContrat::all();
        $villes = Ville::all();

        return view('admin.contrats.create', compact('types', 'villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ContratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratRequest $request)
    {
        $contrat = new Contrat();
        $contrat->client_id = $request->input('client_id');
        $contrat->prestataire_id = $request->input('prestataire_id');
        $contrat->compteur = 0;
        $contrat->type_contrat = $request->input('type_contrat');
        $contrat->date_effet = $request->input('date_effet');
        $contrat->daily_hourly_rate = $request->input('daily_hourly_rate');
        $contrat->working_day_week = $request->input('working_day_week');
        $contrat->nbreheure = $request->input('nbreheure');
        $contrat->working_description = $request->input('working_description');
        $contrat->pay_per_hour = $request->input('pay_per_hour');
        $contrat->type_versement = $request->input('type_versement');
        $contrat->status = $request->input('status');
        $contrat->name_cnss = $request->input('name_cnss');
        $contrat->type_contrat_id = $request->input('type_contrat_id');
        $contrat->is_active = true;
        $contrat->ville_id = $request->input('ville_id');
        $contrat->admin_id = auth('admin')->user()->id;
        $type = TypeContrat::findOrFail($request->type_contrat_id);

        $heur = Carbon::now();
        //dd($heur->hour);
        if ($type->title_type_con == 'CDI') {
            $contrat->date_fin = null;
        } else {
            $contrat->date_fin = Carbon::parse($request->input('date_effet'))->addDays($type->number_type_con);
        }

        if ($request->input('client_id') == null && $request->input('prestataire_id') == null) {

            return redirect()->back()->with('error', trans('success.namefound'));
        } else {

            $contrat->save();

            return redirect()->route('admin.contrats.index')->with('success', trans('success.contratregist'));
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
        $contrat = Contrat::findOrFail($id);

        return view('admin.contrats.show', compact('contrat'));
    }

    public function allClients(Request $request)
    {
        // check if ajax request is coming or not
        if ($request->ajax()) {
            $query = $request->get('client');

            $data = DB::table('users')
                ->where('type_users', 'client')
                ->where('last_name', 'like', $query . '%')
                ->orWhere('first_name', 'like', $query . '%')
                ->get();
            //dd($data);
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data) > 0) {
                // concatenate output to the array
                $output = '<ul class="list-group" id="clients" style="display: block; position: relative; z-index: 1">';
                // loop through the result array
                foreach ($data as $row) {
                    // concatenate output to the array
                    $output .= '<li class="list-group-item client_li" data-id="' . $row->id . '">' . $row->last_name . ' ' . $row->first_name . ' ' . $row->email . '</li>';
                }
                // end of output
                $output .= '</ul>';
            } else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item client_li"><a class="client">' . 'Customer not found' . '</a></li>';
            }
            // return output result array
            return $output;
        }
    }

    public function allPrestataires(Request $request)
    {
        // check if ajax request is coming or not
        if ($request->ajax()) {
            $query = $request->get('prestataire');
            // select country name from database
            $data = DB::table('users')
                ->where('type_users', 'prestataire')
                ->where('last_name', 'like', $query . '%')
                ->orWhere('first_name', 'like', $query . '%')
                ->get();
            //dd($data);
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data) > 0) {
                // concatenate output to the array
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                // loop through the result array
                foreach ($data as $row) {
                    // concatenate output to the array
                    $output .= '<li class="list-group-item prestataire_li" data-id="' . $row->id . '">' . $row->last_name . ' ' . $row->first_name . ' ' . $row->email . '</li>';
                }
                // end of output
                $output .= '</ul>';
            } else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item li-prestataire_li">' . 'No jobseeker found' . '</li>';
            }
            // return output result array
            return $output;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = TypeContrat::all();
        $contrat = Contrat::findOrFail($id);
        $villes = Ville::all();

        return view('admin.contrats.edit', compact('types', 'contrat', 'villes'));
    }

    function print($id) {
        $contrat = Contrat::findOrFail($id);

        return view('admin.factures.print', compact('contrat'));
    }

    public function factureSave($id)
    {
        $contrat = Contrat::where('id', $id)->get();

        $facture = new Facture();
        $ref = rand(1000, 9999);

        foreach ($contrat as $ss) {

            $payByHuer = $ss->pay_per_hour;

            $amount = (int) $payByHuer * 30;

            $facture->contrat_id = $id;
            $facture->amount = $amount;
            $facture->reference = $ref;
            $facture->date_facture = Carbon::now()->toDateTimeString();

            $facture->save();
        }

        return redirect()->route('admin.factures.index')->with('success', trans('success.invoicegener'));
    }

    public function facture(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $end_date = Carbon::parse($request->end_date)->toDateTimeString();
        $query = '';
        $facture = DB::table('factures')
            ->join('contrats', 'factures.contrat_id', '=', 'contrats.id')
            ->where(function ($query) use ($request) {
                return $query->whereBetween('date_facture', [$request->start_date, $request->end_date]);
            })
            ->select('contrats.*')
            ->get();

        return View('admin.factures.generate', compact('facture', 'start_date', 'end_date'));
    }

    public function indexfacture(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $end_date = Carbon::parse($request->end_date)->toDateTimeString();

        $query = '';

        $facture = Facture::where('status', 0)
            ->where(function ($query) use ($request) {
                return $query->whereBetween('date_facture', [$request->start_date, $request->end_date]);
            })->get();

        return View('admin.factures.tri', compact('facture', 'start_date', 'end_date'));
    }

    public function indexfactureOk(Request $request)
    {
        $factures = Facture::join('contrats', 'factures.contrat_id', '=', 'contrats.id')
            ->where('factures.status', 1)
            ->get(['factures.*', 'contrats.*']);

        return View('admin.factures.facture-non-ok', compact('factures'));
    }

    public function indexfactureNonOk(Request $request)
    {
        $factures = Facture::join('contrats', 'factures.contrat_id', '=', 'contrats.id')
            ->where('factures.status', 0)
            ->get(['factures.*', 'contrats.*']);

        return View('admin.factures.facture', compact('factures'));
    }

    public function affiche($id)
    {

        $facture = Facture::findOrFail($id);
        $contrat = $facture->contrat;

        return view('admin.factures.print', compact('facture', 'contrat'));
    }

    public function pdf($id)
    {
        $contrat = Contrat::findOrFail($id);
        $date = Carbon::now();

        $data = [
            'contrat' => $contrat,
            'date' => $date,
        ];

        $pdf = PDF::loadView('admin.contrats.pdf', $data);

        return $pdf->stream('Contrat' . $date . '.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ContratRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratRequest $request, $id)
    {
        $contrat = Contrat::findOrFail($id);
        $contrat->client_id = $request->input('client_id');
        $contrat->prestataire_id = $request->input('prestataire_id');
        $contrat->type_contrat = $request->input('type_contrat');
        $contrat->date_effet = $request->input('date_effet');
        $contrat->date_fin = $request->input('date_fin');
        $contrat->daily_hourly_rate = $request->input('daily_hourly_rate');
        $contrat->working_day_week = $request->input('working_day_week');
        $contrat->nbreheure = $request->input('nbreheure');
        $contrat->working_description = $request->input('working_description');
        $contrat->pay_per_hour = $request->input('pay_per_hour');
        $contrat->type_versement = $request->input('type_versement');
        $contrat->status = $request->input('status');
        $contrat->name_cnss = $request->input('name_cnss');
        $contrat->type_contrat_id = $request->input('type_contrat_id');
        $contrat->is_active = true;
        $contrat->ville_id = $request->input('ville_id');
        $type = TypeContrat::findOrFail($request->type_contrat_id);

        if ($type->title_type_con == 'CDI') {
            $contrat->date_fin = null;
        } else {
            $contrat->date_fin = Carbon::parse($request->input('date_effet'))->addDays($type->number_type_con);
        }

        if ($request->input('client_id') == null && $request->input('prestataire_id') == null) {
            return redirect()->back()->with('error', trans('success.namefound'));
        } else {

            $contrat->save();

            return redirect()->route('admin.contrats.index')->with('success', trans('success.contratupd'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrat = Contrat::findOrFail($id);
        $contrat->delete(); //Mettre le contrat à la corbeille

        return redirect()->route('admin.contrats.index')->with('success', trans('success.contratdel'));
    }
}
