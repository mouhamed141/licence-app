<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function telechargerPDF($id)
    {
        $demande = Demande::with(['armateur', 'navire'])->findOrFail($id);

        $pdf = Pdf::loadView('download_pdf.pdf', ['demande' => $demande]);

        return $pdf->download('demande-' . $demande->id . '.pdf');
    }
}
