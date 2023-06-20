<?php

namespace App\Http\Controllers;

use App\Models\Rede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class RedeController
 * @package App\Http\Controllers
 */
class RedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $redes = Rede::join('bimers', 'redes.id', '=', 'bimers.id_ficheros')
            ->join('suscripciones', 'bimers.id_suscripcion', '=', 'suscripciones.id')
            ->join('users', 'suscripciones.id_cliente', '=', 'users.id')
            ->where('users.id', $user->id)
            ->select('redes.id as id')
            ->paginate(10);

        return view('rede.index', compact('redes'))
            ->with('i', (request()->input('page', 1) - 1) * $redes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rede = new Rede();
        return view('rede.create', compact('rede'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Rede::$rules);

        $rede = Rede::create($request->all());

        return redirect()->route('redes.index')->with('success', 'Rede created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rede = Rede::find($id);

        return view('rede.show', compact('rede'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rede = Rede::find($id);

        return view('rede.edit', compact('rede'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Rede $rede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rede $rede)
    {
        request()->validate(Rede::$rules);

        $rede->update($request->all());

        return redirect()->route('bimers.index')->with('success', 'Redes updated successfully');
        //return redirect()->route('redes.index')->with('success', 'Rede updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rede = Rede::find($id)->delete();

        return redirect()->route('redes.index')
            ->with('success', 'Rede deleted successfully');
    }
}
