<?php

namespace App\Exports;

use App\Models\Book;
use App\Models\BookInventarList;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
 
class BooksExport implements FromView
{
    use Exportable;

    protected $data;
 
    function __construct($data) {
        $this->data = $data;
    }

   
    public function view(): View
    {
        return view('pdf.document', $this->data);
    }

}
