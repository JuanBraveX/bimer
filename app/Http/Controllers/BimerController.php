<?php

namespace App\Http\Controllers;

use App\Models\Bimer;
use App\Models\Fichero;
use App\Models\Rede;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Color\Color;

/**
 * Class BimerController
 * @package App\Http\Controllers
 */
class BimerController extends Controller
{

    public function __construct()
    {
        // Excluir la acción "show" del middleware "auth"
        $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $bimers = Bimer::join('suscripciones', 'bimers.id_suscripcion', '=', 'suscripciones.id')
            ->where('suscripciones.id_cliente', $user->id)
            ->select('bimers.id as id', "bimers.*")
            ->paginate();

        return view('bimer.index', compact('bimers'))
            ->with('i', (request()->input('page', 1) - 1) * $bimers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bimer = new Bimer();
        return view('bimer.create', compact('bimer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bimer::$rules);

        $bimer = Bimer::create($request->all());

        return redirect()->route('bimers.index')
            ->with('success', 'Bimer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bimer = Bimer::find($id);

        return view('bimer.show', compact('bimer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        $bimers = Bimer::join('suscripciones', 'bimers.id_suscripcion', '=', 'suscripciones.id')
        ->where('suscripciones.id_cliente', $user->id)
        ->select('bimers.id as id', "bimers.*")
        ->paginate();
        
        if ($bimers->count() > 0) {
            $bimer = Bimer::find($id);
        return view('bimer.edit', compact('bimer'));
            //return view('bimer.edit', compact('bimer'));
        } else {
             return redirect()->route('bimers.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bimer $bimer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bimer $bimer)
    {
        $user = Auth::user();
        //request()->validate(Bimer::$rules);
        // Verifying 'nombre'
        $rede = Rede::find($bimer->id_redes);

        if ($request->filled('facebook')) {
            $rede->facebook = $request->input('facebook');
        }
        if ($request->filled('linkedin')) {
            $rede->linkedin = $request->input('linkedin');
        }
        if ($request->filled('twitter')) {
            $rede->twitter = $request->input('twitter');
        }
        if ($request->filled('youtube')) {
            $rede->youtube = $request->input('youtube');
        }
        if ($request->filled('tiktok')) {
            $rede->tiktok = $request->input('tiktok');
        }
        if ($request->filled('whatsapp')) {
            $rede->whatsapp = $request->input('whatsapp');
        }
        if ($request->filled('indeed')) {
            $rede->indeed = $request->input('indeed');
        }
        if ($request->filled('instagram')) {
            $rede->instagram = $request->input('instagram');
        }
        if ($request->filled('pagina_web')) {
            $rede->pagina_web = $request->input('pagina_web');
        }
        $rede->save();

        $fichero = Fichero::find($bimer->id_ficheros);

        if ($request->hasFile('foto_perfil')) {
            if (Storage::disk('public')->exists($fichero->foto_perfil)) {
                Storage::disk('public')->delete($fichero->foto_perfil);
            }
        }
        if ($request->hasFile('foto_perfil')) {
            $rutaArchivo = public_path($fichero->foto_perfil);
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);
            }
            $nombreArchivoOriginal = $request->file('foto_perfil')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp . "_foto_perfil" . "_" . $nombreArchivoOriginal;
            $carpetaDestino = './ficheros/' . $user->email . '/' . $fichero->id . "/";
            $request->file('foto_perfil')->move($carpetaDestino, $nuevoNombre);
            $fichero->foto_perfil = ltrim($carpetaDestino, '.') . $nuevoNombre;
        }

        if ($request->hasFile('banner')) {
            if (Storage::disk('public')->exists($fichero->banner)) {
                Storage::disk('public')->delete($fichero->banner);
            }
        }
        if ($request->hasFile('banner')) {
            $rutaArchivo = public_path($fichero->banner);
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);
            }
            $nombreArchivoOriginal = $request->file('banner')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp . "_banner" . "_" . $nombreArchivoOriginal;
            $carpetaDestino = './ficheros/' . $user->email . '/' . $fichero->id . "/";
            $request->file('banner')->move($carpetaDestino, $nuevoNombre);
            $fichero->banner = ltrim($carpetaDestino, '.') . $nuevoNombre;
        }

        if ($request->hasFile('foto_1')) {
            if (Storage::disk('public')->exists($fichero->foto_1)) {
                Storage::disk('public')->delete($fichero->foto_1);
            }
        }
        if ($request->hasFile('foto_1')) {
            $rutaArchivo = public_path($fichero->foto_1);
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);
            }
            $nombreArchivoOriginal = $request->file('foto_1')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp . "_foto_1" . "_" . $nombreArchivoOriginal;
            $carpetaDestino = './ficheros/' . $user->email . '/' . $fichero->id . "/";
            $request->file('foto_1')->move($carpetaDestino, $nuevoNombre);
            $fichero->foto_1 = ltrim($carpetaDestino, '.') . $nuevoNombre;
        }
        if ($request->hasFile('foto_2')) {
            if (Storage::disk('public')->exists($fichero->foto_2)) {
                Storage::disk('public')->delete($fichero->foto_2);
            }
        }
        if ($request->hasFile('foto_2')) {
            $rutaArchivo = public_path($fichero->foto_2);
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);
            }
            $nombreArchivoOriginal = $request->file('foto_2')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp . "_foto_2" . "_" . $nombreArchivoOriginal;
            $carpetaDestino = './ficheros/' . $user->email . '/' . $fichero->id . "/";
            $request->file('foto_2')->move($carpetaDestino, $nuevoNombre);
            $fichero->foto_2 = ltrim($carpetaDestino, '.') . $nuevoNombre;
        }
        if ($request->hasFile('foto_3')) {
            if (Storage::disk('public')->exists($fichero->foto_3)) {
                Storage::disk('public')->delete($fichero->foto_3);
            }
        }
        if ($request->hasFile('foto_3')) {
            $rutaArchivo = public_path($fichero->foto_3);
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);
            }
            $nombreArchivoOriginal = $request->file('foto_3')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp . "_foto_3" . "_" . $nombreArchivoOriginal;
            $carpetaDestino = './ficheros/' . $user->email . '/' . $fichero->id . "/";
            $request->file('foto_3')->move($carpetaDestino, $nuevoNombre);
            $fichero->foto_3 = ltrim($carpetaDestino, '.') . $nuevoNombre;
        }
        if ($request->hasFile('foto_4')) {
            if (Storage::disk('public')->exists($fichero->foto_4)) {
                Storage::disk('public')->delete($fichero->foto_4);
            }
        }
        if ($request->hasFile('foto_4')) {
            $rutaArchivo = public_path($fichero->foto_4);
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);
            }
            $nombreArchivoOriginal = $request->file('foto_4')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp . "_foto_4" . "_" . $nombreArchivoOriginal;
            $carpetaDestino = './ficheros/' . $user->email . '/' . $fichero->id . "/";
            $request->file('foto_4')->move($carpetaDestino, $nuevoNombre);
            $fichero->foto_4 = ltrim($carpetaDestino, '.') . $nuevoNombre;
        }
        if ($request->hasFile('foto_5')) {
            if (Storage::disk('public')->exists($fichero->foto_5)) {
                Storage::disk('public')->delete($fichero->foto_5);
            }
        }
        if ($request->hasFile('foto_5')) {
            $rutaArchivo = public_path($fichero->foto_5);
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);
            }
            $nombreArchivoOriginal = $request->file('foto_5')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp . "_foto_5" . "_" . $nombreArchivoOriginal;
            $carpetaDestino = './ficheros/' . $user->email . '/' . $fichero->id . "/";
            $request->file('foto_5')->move($carpetaDestino, $nuevoNombre);
            $fichero->foto_5 = ltrim($carpetaDestino, '.') . $nuevoNombre;
        }
        if ($request->hasFile('foto_5')) {
            if (Storage::disk('public')->exists($fichero->foto_5)) {
                Storage::disk('public')->delete($fichero->foto_5);
            }
        }
        if ($request->hasFile('pdf')) {
            $rutaArchivo = public_path($fichero->pdf);
            if (file_exists($rutaArchivo)) {
                unlink($rutaArchivo);
            }
            $nombreArchivoOriginal = $request->file('pdf')->getClientOriginalName();
            $nuevoNombre = Carbon::now()->timestamp . "_pdf" . "_" . $nombreArchivoOriginal;
            $carpetaDestino = './ficheros/' . $user->email . '/' . $fichero->id . "/";
            $request->file('pdf')->move($carpetaDestino, $nuevoNombre);
            $fichero->pdf = ltrim($carpetaDestino, '.') . $nuevoNombre;
        }

        if ($request->filled('video_link')) {
            $fichero->video_link = $request->video_link;
        }

        if ($request->filled('qr')) {
            $fichero->qr = $request->qr;
            $rutaArchivo = public_path($fichero->qrImg);
            if (file_exists(public_path($rutaArchivo))) {
                unlink(public_path($rutaArchivo));
            }
            // Create QR code
            $writer = new PngWriter();
            $qrCode = QrCode::create($fichero->qr)
                ->setEncoding(new Encoding('UTF-8'))
                ->setSize(300)
                ->setMargin(10);
            $result = $writer->write($qrCode);
            // Validate the result
            //$writer->validateResult($result, 'Life is too short to be generating QR codes');
            // Save it to a file.
            $carpeta = './ficheros/' . $user->email . '/' . $fichero->id . '/' . Carbon::now()->timestamp . 'qr-code.png';
            $rutaDestino = public_path($carpeta);
            if (!File::isDirectory(public_path('./ficheros/' . $user->email . '/' . $fichero->id))) {
                File::makeDirectory(public_path('./ficheros/' . $user->email . '/' . $fichero->id), 0755, true);
            }
            $result->saveToFile($rutaDestino);

            $fichero->qrImg = $carpeta;
        }
        $fichero->save();

        if ($request->filled('nombre')) {
            // 'nombre' está presente en la solicitud
            $bimer->nombre = $request->input('nombre');
        }
        // Verifying 'apellido'
        if ($request->filled('apellido')) {
            // 'apellido' está presente en la solicitud
            $bimer->apellido = $request->input('apellido');
        }

        // Verifying 'empresa'
        if ($request->filled('empresa')) {
            // 'empresa' está presente en la solicitud
            $bimer->empresa = $request->input('empresa');
        }

        // Verifying 'telefono'
        if ($request->filled('telefono')) {
            // 'telefono' está presente en la solicitud
            $bimer->telefono = $request->input('telefono');
        }

        // Verifying 'puesto'
        if ($request->filled('puesto')) {
            // 'puesto' está presente en la solicitud
            $bimer->puesto = $request->input('puesto');
        }

        // Verifying 'correo'
        if ($request->filled('correo')) {
            // 'correo' está presente en la solicitud
            $bimer->correo = $request->input('correo');
        }

        // Verifying 'ubicacion_text'
        if ($request->filled('ubicacion_text')) {
            // 'ubicacion_text' está presente en la solicitud
            $bimer->ubicacion_text = $request->input('ubicacion_text');
        }

        // Verifying 'ubicacion_mapa'
        if ($request->filled('ubicacion_mapa')) {
            // 'ubicacion_mapa' está presente en la solicitud
            $bimer->ubicacion_mapa = $request->input('ubicacion_mapa');
        }


        if ($bimer->suscripcione->plane->nombre === 'Mine') {
            if ($request->filled('color_texto')) {
                if (
                    $request->color_texto === '#000000' ||
                    $request->color_texto === '#ffffff' ||
                    $request->color_texto === '#94B7BB' ||
                    $request->color_texto === '#F0E991' ||
                    $request->color_texto === '#205C40' ||
                    $request->color_texto === '#800000' ||
                    $request->color_texto === '#6a6a6a' ||
                    $request->color_texto === '#800080'
                ) {
                    $bimer->color_texto = $request->input('color_texto');
                }
            }
            if ($request->filled('color_fondo')) {
                if (
                    $request->color_fondo === '#000000' ||
                    $request->color_fondo === '#ffffff' ||
                    $request->color_fondo === '#94B7BB' ||
                    $request->color_fondo === '#F0E991' ||
                    $request->color_fondo === '#205C40' ||
                    $request->color_fondo === '#800000' ||
                    $request->color_fondo === '#6a6a6a' ||
                    $request->color_fondo === '#800080'
                ) {
                    $bimer->color_fondo = $request->input('color_fondo');
                }
            }
        } else if ($bimer->suscripcione->plane->nombre === 'Ideal') {
            if ($request->filled('color_texto')) {
                if (
                    $request->color_texto === '#000000' ||
                    $request->color_texto === '#ffffff'
                ) {
                    $bimer->color_texto = $request->input('color_texto');
                }
            }
            if ($request->filled('color_fondo')) {
                if (
                    $request->color_fondo === '#000000' ||
                    $request->color_fondo === '#ffffff'
                ) {
                    $bimer->color_fondo = $request->input('color_fondo');
                }
            }
        } else {
            // Verifying 'color_texto'
            if ($request->filled('color_texto')) {
                // 'color_texto' está presente en la solicitud
                $bimer->color_texto = $request->input('color_texto');
            }

            // Verifying 'color_fondo'
            if ($request->filled('color_fondo')) {
                // 'color_fondo' está presente en la solicitud
                $bimer->color_fondo = $request->input('color_fondo');
            }
        }

        $bimer->save();
        //return view('bimer.edit', compact('bimer'));
        //return redirect()->route('bimers.update', $bimer->id);return redirect()->route('bimers.update', $bimer->id);
        $routeString = url('bimers');

        return redirect($routeString . '/' . $bimer->id . '/edit');
        //return redirect()->route('bimers.index')->with('success', 'Ficheros updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bimer = Bimer::find($id)->delete();

        return redirect()->route('bimers.index')
            ->with('success', 'Bimer deleted successfully');
    }


    public function hexToRgb($hex)
    {
        // Eliminar el símbolo "#" si está presente
        $hex = str_replace('#', '', $hex);

        // Verificar la longitud del código hexadecimal
        $hexLength = strlen($hex);
        if ($hexLength === 3) {
            // Si el código hexadecimal es de 3 dígitos, expandir a 6 dígitos duplicando cada dígito
            $hex = str_repeat($hex, 2);
        } elseif ($hexLength !== 6) {
            // Si el código hexadecimal no es válido, devolver variables vacías
            return ['', '', ''];
        }

        // Convertir los componentes hexadecimales a valores decimales
        $red = hexdec(substr($hex, 0, 2));
        $green = hexdec(substr($hex, 2, 2));
        $blue = hexdec(substr($hex, 4, 2));

        // Devolver los componentes RGB como variables individuales
        return [$red, $green, $blue];
    }
}
