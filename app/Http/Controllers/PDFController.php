<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Packages;
use App\Models\Customers;
use PDF;

class PDFController extends Controller
{
    public function createPDF() {

        $sales = User::where('role', 'Sales')->get();
        $packages = Packages::get();
        $customers = Customers::get();

        $data = [
            'title' => 'Laporan',
            'date' => date('m/d/Y'),
            'sales' => $sales,
            'packages' => $packages,
            'customers' => $customers,
        ];

        // share data to view
        view()->share('sales',$data);
        $pdf = PDF::loadView('admin/print', $data);

        return $pdf->download('pdf_file.pdf');
      }
}
