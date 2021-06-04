<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
  public function download(Request $request) {
    $image = $request->post('img');
    $data = ['title' => "Testing pdf", 'img' => $image];
    $pdf = PDF::loadView('pdf', $data);
    return $pdf->download("test.pdf");
    // return response()->json($image);
  }
}
