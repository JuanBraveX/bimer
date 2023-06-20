<?php

namespace App\Http\Controllers;

use App\Models\Fichero;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;


/**
 * Class FicheroController
 * @package App\Http\Controllers
 */
class FicheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $ficheroes = Fichero::join('bimers', 'ficheroes.id', '=', 'bimers.id_ficheros')
            ->join('suscripciones', 'bimers.id_suscripcion', '=', 'suscripciones.id')
            ->join('users', 'suscripciones.id_cliente', '=', 'users.id')
            ->where('users.id', $user->id)
            ->select('ficheroes.id as id', "ficheroes.*")
            ->paginate(10);

        return view('fichero.index', compact('ficheroes'))
            ->with('i', (request()->input('page', 1) - 1) * $ficheroes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fichero = new Fichero();
        return view('fichero.create', compact('fichero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Fichero::$rules);

        $fichero = Fichero::create($request->all());


        return redirect()->route('ficheroes.index')
            ->with('success', 'Fichero created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fichero = Fichero::find($id);

        return view('fichero.show', compact('fichero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fichero = Fichero::find($id);

        return view('fichero.edit', compact('fichero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Fichero $fichero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fichero $fichero)
    {
        $user = Auth::user();
        //request()->validate(Fichero::$rules);
        request()->validate(Fichero::$rules);
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

        $fichero->video_link = $request->video_link;
        $fichero->qr = $request->qr;
        if (file_exists(public_path('./ficheros/' . $user->email . '/' . $fichero->id . '/qr-code.png'))) {
            unlink(public_path('./ficheros/' . $user->email . '/' . $fichero->id . '/qr-code.png'));
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
        $rutaDestino = public_path('./ficheros/' . $user->email . '/' . $fichero->id . '/qr-code.png');
        if (!File::isDirectory(public_path('./ficheros/' . $user->email . '/' . $fichero->id))) {
            File::makeDirectory(public_path('./ficheros/' . $user->email . '/' . $fichero->id), 0755, true);
        }
        $result->saveToFile($rutaDestino);

        $fichero->qrImg = './ficheros/' . $user->email . '/' . $fichero->id . '/qr-code.png';


        $fichero->save();
        return redirect()->route('bimers.index')->with('success', 'Ficheros updated successfully');
        //return redirect()->route('ficheroes.index')->with('success', 'Fichero updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fichero = Fichero::find($id)->delete();

        return redirect()->route('ficheroes.index')
            ->with('success', 'Fichero deleted successfully');
    }


    public function deleteFolder($path)
    {
        if (File::exists(public_path('ficheros/' . $path))) {
            File::deleteDirectory(public_path('ficheros/' . $path));
            return true;
        }
        return false;
    }

    public function deleteFicher($path, $id)
    {
        if (File::exists(public_path('ficheros/' . $path . '/' . $id))) {
            $file = public_path('ficheros/' . $path . '/' . $id);
            File::deleteDirectory($file);
            return true;
        }
        return false;
    }
}
