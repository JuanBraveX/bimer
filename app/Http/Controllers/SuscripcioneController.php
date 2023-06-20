<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use App\Models\Suscripcione;
use App\Models\Bimer;
use App\Models\Fichero;
use App\Models\Rede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/**
 * Class SuscripcioneController
 * @package App\Http\Controllers
 */
class SuscripcioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $suscripciones = Suscripcione::where('id_cliente', $user->id)->paginate();

        return view('suscripcione.index', compact('suscripciones'))
            ->with('i', (request()->input('page', 1) - 1) * $suscripciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suscripcione = new Suscripcione();
        return view('suscripcione.create', compact('suscripcione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate(Suscripcione::$rules);
        $user = Auth::user();
        $plan = 'Begginer';
        $existeSuscripcion = Suscripcione::join('planes', 'suscripciones.id_plan', '=', 'planes.id')
            ->where('suscripciones.id_cliente', $user->id)
            ->where('planes.nombre', $plan)
            ->exists();
        
        $plan = 'Ideal';
        $existeSuscripcion1 = Suscripcione::join('planes', 'suscripciones.id_plan', '=', 'planes.id')
            ->where('suscripciones.id_cliente', $user->id)
            ->where('planes.nombre', $plan)
            ->exists();
        
        $plan = 'Mine';
        $existeSuscripcion2 = Suscripcione::join('planes', 'suscripciones.id_plan', '=', 'planes.id')
            ->where('suscripciones.id_cliente', $user->id)
            ->where('planes.nombre', $plan)
            ->exists();    
        
        $plan = 'One';
        $existeSuscripcion3 = Suscripcione::join('planes', 'suscripciones.id_plan', '=', 'planes.id')
            ->where('suscripciones.id_cliente', $user->id)
            ->where('planes.nombre', $plan)
            ->exists();

        $idPlan = $request->id_plan;
        $cantidad = $request->cantidad;

        $plan = Plane::find($idPlan);
        $nombrePlan = $plan->nombre;

        if ($existeSuscripcion && $nombrePlan === 'Begginer') {
            // Existe una suscripción con el plan específico
            // Realiza las acciones que desees
            return redirect()->route('suscripciones.index')->with('error', 'Ya tienes una suscripción con el Plan Begginer');
        } else if ($existeSuscripcion3 && $nombrePlan === 'One') {
            // Existe una suscripción con el plan específico
            // Realiza las acciones que desees
            return redirect()->route('suscripciones.index')->with('error', 'Ya tienes una suscripción con el Plan One');
        } else if ($existeSuscripcion2 && $nombrePlan === 'Mine') {
            // Existe una suscripción con el plan específico
            // Realiza las acciones que desees
            return redirect()->route('suscripciones.index')->with('error', 'Ya tienes una suscripción con el Plan Mine');
        } if ($existeSuscripcion1 && $nombrePlan === 'Ideal') {
            // Existe una suscripción con el plan específico
            // Realiza las acciones que desees
            return redirect()->route('suscripciones.index')->with('error', 'Ya tienes una suscripción con el Plan Ideal');
        } else {
            $cantidad = 1;
            $precio_neto = 0;
            $descuento = $plan->descuento;

            //$cantidad = $request->cantidad;

            $precio_real = $precio_neto * $cantidad - $precio_neto * $descuento * $cantidad;

            $inicio_en = now(); // Fecha actual
            $finaliza_en = now()->addYear(); // Suma un año a partir de la fecha actual

            $suscripcione = Suscripcione::create(array_merge($request->all(), [
                'precio_real' => $precio_real,
                'precio_neto' => $precio_neto,
                'inicio_en' => $inicio_en,
                'descuento' => $descuento,
                'finaliza_en' => $finaliza_en,
                'id_cliente' => $user->id,
                'cantidad' => $cantidad
            ]));
            //$suscripcione = Suscripcione::create($request->all());
            
                // Crear un nuevo registro en la tabla redes
                $redes = Rede::create([
                    // Asignar los valores correspondientes para los campos en la tabla redes
                    'facebook' => 'vacio', 'linkedin' => 'vacio', 'twitter' => 'vacio', 'youtube' => 'vacio', 'tiktok' => 'vacio', 'whatsapp' => 'vacio', 'indeed' => 'vacio', 'instagram' => 'vacio', 'pagina_web' => 'vacio'
                ]);

                // Crear un nuevo registro en la tabla ficheros
                $fichero = Fichero::create([
                    // Asignar los valores correspondientes para los campos en la tabla ficheros
                    'foto_perfil' => 'vacio', 'banner' => 'vacio', 'foto_1' => 'vacio', 'foto_2' => 'vacio', 'foto_3' => 'vacio', 'foto_4' => 'vacio', 'foto_5' => 'vacio', 'qr' => 'vacio', 'pdf' => 'vacio', 'video_link' => 'vacio'
                ]);

                // Crear un nuevo registro en la tabla bimers y establecer la relación con suscripciones, redes y ficheros
                $bimer = Bimer::create([
                    // Asignar los valores correspondientes para los campos en la tabla bimers
                    'id_suscripcion' => $suscripcione->id,
                    'id_redes' => $redes->id,
                    'id_ficheros' => $fichero->id
                ]);
            
            $destinatario = $user->email;
            Mail::send('mails.index', [
                'producto' => $nombrePlan,
                'cantidad' => $cantidad,
                'precio' => $precio_real,
                'ini' => $inicio_en,
                'fin' => $finaliza_en
            ], function ($message) use ($destinatario) {
                $message->to($destinatario)
                    ->subject('Nuevas BIMERS');
            });
            return redirect()->route('suscripciones.index')->with('success', 'Has adquirido una nueva suscripcion una ' . $nombrePlan);
        }
    }

    public function storeP(Request $request, $id, $cantidad, $token)
    {
        //request()->validate(Suscripcione::$rules);
        $user = Auth::user();

        $tokenURL = $token;
        $tokenSession = session()->get('payment_token');

        if ($tokenURL == $tokenSession) {
            $plan = 'Begginer';
            $existeSuscripcion = Suscripcione::join('planes', 'suscripciones.id_plan', '=', 'planes.id')
                ->where('suscripciones.id_cliente', $user->id)
                ->where('planes.nombre', $plan)
                ->exists();

            $idPlan = $id;

            $plan = Plane::find($idPlan);
            $nombrePlan = $plan->nombre;


            if ($existeSuscripcion && $nombrePlan == 'Begginer') {
                // Existe una suscripción con el plan específico
                // Realiza las acciones que desees
                return redirect()->route('suscripciones.index')->with('error', 'Ya tienes una suscripción con el Plan Begginer');
            }

            //$cantidad = $request->cantidad;
            $precio_neto = $plan->precio;
            $descuento = $plan->descuento;

            //$cantidad = $request->cantidad;

            $precio_real = $precio_neto * $cantidad - $precio_neto * $descuento * $cantidad;

            $inicio_en = now(); // Fecha actual
            $finaliza_en = now()->addYear(); // Suma un año a partir de la fecha actual

            $suscripcion = Suscripcione::create([
                'id_plan' => $id,
                'precio_real' => $precio_real,
                'precio_neto' => $precio_neto,
                'inicio_en' => $inicio_en,
                'descuento' => $descuento,
                'finaliza_en' => $finaliza_en,
                'id_cliente' => $user->id,
                'cantidad' => $cantidad,
                'suspendida' => 0
            ]);
            //$suscripcione = Suscripcione::create($request->all());


            for ($i = 0; $i < $cantidad; $i++) {
                // Crear un nuevo registro en la tabla redes
                $redes = Rede::create([
                    // Asignar los valores correspondientes para los campos en la tabla redes
                    'facebook' => 'vacio', 'linkedin' => 'vacio', 'twitter' => 'vacio', 'youtube' => 'vacio', 'tiktok' => 'vacio', 'whatsapp' => 'vacio', 'indeed' => 'vacio', 'instagram' => 'vacio', 'pagina_web' => 'vacio'
                ]);

                // Crear un nuevo registro en la tabla ficheros
                $fichero = Fichero::create([
                    // Asignar los valores correspondientes para los campos en la tabla ficheros
                    'foto_perfil' => 'vacio', 'banner' => 'vacio', 'foto_1' => 'vacio', 'foto_2' => 'vacio', 'foto_3' => 'vacio', 'foto_4' => 'vacio', 'foto_5' => 'vacio', 'qr' => 'vacio', 'pdf' => 'vacio', 'video_link' => 'vacio'
                ]);

                // Crear un nuevo registro en la tabla bimers y establecer la relación con suscripciones, redes y ficheros
                $bimer = Bimer::create([
                    // Asignar los valores correspondientes para los campos en la tabla bimers
                    'id_suscripcion' => $suscripcion->id,
                    'id_redes' => $redes->id,
                    'id_ficheros' => $fichero->id
                ]);
            }
            $destinatario = $user->email;
            Mail::send('mails.index', [
                'producto' => $nombrePlan,
                'cantidad' => $cantidad,
                'precio' => $precio_real,
                'ini' => $inicio_en,
                'fin' => $finaliza_en
            ], function ($message) use ($destinatario) {
                $message->to($destinatario)
                    ->subject('Nuevas BIMERS');
            });
            session()->forget('payment_token');
            return redirect()->route('suscripciones.index')->with('success', 'Has adquirida una Suscripcion de ' . $nombrePlan);
        } else {
            return redirect()->route('planes.index')->with('error', 'Token inválido');
        }
        //return redirect()->route('suscripciones.index')->with('success', 'Suscripcione created successfully.');
        //echo $id . "entro" . $cantidad;
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suscripcione = Suscripcione::find($id);

        return view('suscripcione.show', compact('suscripcione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suscripcione = Suscripcione::find($id);

        return view('suscripcione.edit', compact('suscripcione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Suscripcione $suscripcione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscripcione $suscripcione)
    {
        request()->validate(Suscripcione::$rules);

        $suscripcione->update($request->all());

        return redirect()->route('suscripciones.index')
            ->with('success', 'Suscripcione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $suscripcione = Suscripcione::find($id)->delete();

        return redirect()->route('suscripciones.index')
            ->with('success', 'Suscripcione deleted successfully');
    }
}
