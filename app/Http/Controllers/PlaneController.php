<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/**
 * Class PlaneController
 * @package App\Http\Controllers
 */
class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plane::paginate();

        return view('plane.index', compact('planes'));
    }

    public function indexF()
    {
        $planes = Plane::all();
        return response()->json($planes);
    }

    public function indexP()
    {
        session()->forget('payment_token');
        return redirect()->route('planes.index')->with('error', 'Token invalidado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plane = new Plane();
        return view('plane.create', compact('plane'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Plane::$rules);

        $plane = Plane::create($request->all());

        return redirect()->route('planes.index')
            ->with('success', 'Plane created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plane = Plane::find($id);

        return view('plane.show', compact('plane'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plane = Plane::find($id);

        return view('plane.edit', compact('plane'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Plane $plane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plane $plane)
    {
        request()->validate(Plane::$rules);

        $plane->update($request->all());

        return redirect()->route('planes.index')
            ->with('success', 'Plane updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $plane = Plane::find($id)->delete();

        return redirect()->route('planes.index')
            ->with('success', 'Plane deleted successfully');
    }

    public function enlacePago(Request $request)
    {

        if ($request->id_plan == '1') {
            return redirect()->route('suscripciones.store');
        }

        if ($request->cantidad >= 1) {
            $user = Auth::user();
            $clientId = env('CLIP_API_KEY');
            $clientSecret = env('CLIP_SECRET_KEY');
            $token = base64_encode($clientId . ':' . $clientSecret);

            $plane = Plane::find($request->id_plan);
            //echo $token;
            if ($request->cantidad >= 2) {
                $amount = $plane->precio * $request->cantidad - $plane->precio * $request->cantidad * $plane->descuento;
            } else {
                $amount = $plane->precio * $request->cantidad;
            }

            $desciption = $plane->descripcion;

            $clavetoken = Str::random(15);
            session()->put('payment_token', $clavetoken);

            $response = Http::withHeaders([
                'accept' => 'application/vnd.com.payclip.v2+json',
                'content-type' => 'application/json',
                'x-api-key' => 'Basic ' . $token,
            ])->post('https://api-gw.payclip.com/checkout', [
                'amount' => $amount,
                'currency' => 'MXN',
                'purchase_description' => $desciption,
                'redirection_url' => [
                    'success' => route('suscripciones.storeP', ['id_plan' => $request->id_plan, 'cantidad' => $request->cantidad, 'token' => $clavetoken]),
                    'error' => route('planes.indexP'),
                    'default' => route('suscripciones.storeP', ['id_plan' => $request->id_plan, 'cantidad' => $request->cantidad, 'token' => $clavetoken]),
                ],
                'metadata' => [
                    'me_reference_id' => $user->id,
                    'customer_info' => [
                        'name' => $user->name,
                        'email' => $user->email,
                        'phone' => $user->telefono,
                    ],
                ],
                'billing_address' => [
                    'city' => 'Torreón',
                    'State' => 'Coahuila',
                    'country' => 'México',
                ],
                'override_settings' => [
                    'payment_method' => ['CARD'],
                    "enable_tip" => true,
                    'currency' => [
                        'show_currency_code' => true,
                    ],
                ],
                'webhook_url' => 'https://hook.us1.make.com/k5f98kqxuuxgn4td6hgejrnu6lsi362p',
            ]);

            $responseJson = $response->json();
            //echo json_encode($responseJson, JSON_PRETTY_PRINT);
            //echo $request->id_plan;
            $paymentRequestUrl = $responseJson['payment_request_url'];
            //$url = json_encode($paymentRequestUrl);

            return redirect()->away($paymentRequestUrl);
        }
        return redirect()->route('planes.index');
    }
}
