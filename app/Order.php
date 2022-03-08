<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getPdf($type = 'stream')
{
    $pdf = app('dompdf.wrapper')->loadView('order-pdf', ['order' => $this]);

    if ($type == 'stream') {
        return $pdf->stream('invoice.pdf');
    }

    if ($type == 'download') {
        return $pdf->download('invoice.pdf');
    }
}

//return $order->getPdf(); // Returns stream default
//return $order->getPdf('download'); // Returns the PDF as download
}
