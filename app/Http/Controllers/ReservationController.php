<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ReservationController
 * @package App\Http\Controllers
 */
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::paginate();

        return view('reservation.index', compact('reservations'))
            ->with('i', (request()->input('page', 1) - 1) * $reservations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { //que me devuelva las mesas disponibles que tengan capacidad mayor a 0 y lo guarde en la variable $tables y me devuelva nombre y id
        $tables = Table::where('status', 'available')->where('capacity', '>', 0)->get();
        $clients = Client::all();



        //return $tables;
        return view('reservation.create', compact('tables', 'clients'));
    }
    public function buscarXDNI($dni)
    {
        //like %$dni%
        $client = Client::where('dni', 'like', '%' . $dni )->first();
        //$client = Client::where('dni', $dni)->first();
        return $client;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        request()->validate(Reservation::$rules);


        DB::transaction(function () use ($request){
            $client = Client::firstOrCreate(
                [
                    'DNI' => $request->DNI,
                    'name' => $request->name
                ],
                [
                    'DNI' => $request->DNI,
                    'name' => $request->name,

                ]
            );
            $reservation = Reservation::create(

                [
                    'date' => $request->date,
                    'time' => $request->time,
                    'client_id' => $client->id,
                    'table_id' => $request->table_id,

                ]
            );
            $reservation->table()->update([
                'status' => 'reserved',

            ]);


        });



        return redirect()->route('reservations.index')
            ->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);

        return view('reservation.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::find($id);


        $tables = Table::where('status', 'available')->where('capacity', '>', 0)->orWhere('id', $reservation->table_id)->get();



        $clients = Client::where('id', $reservation->client_id)->get();
        return $clients;


        return view('reservation.edit', compact('reservation',
            'tables', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        request()->validate(Reservation::$rules);

        $reservation->update($request->all());

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id)->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation deleted successfully');
    }
}
