<?php

namespace App\Http\Controllers;

use App\DataTables\BooksDataTable;
use App\Models\Book;
use App\Models\BookInventar;
use App\Models\BookInventarList;
use App\Models\BookLanguage;
use App\Models\BookText;
use App\Models\BookTextType;
use App\Models\BookType;
use App\Models\Direction;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    public $book_id = null, $book_inventar_id = null, $faculty_id = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = trim($request->get('search'));
        $perPage = 10;
        if (!empty($keyword)) {
            $books = Book::Where('title', 'LIKE', "%$keyword%")
                ->orWhere('author', 'LIKE', "%$keyword%")
                ->orWhere('isbn', 'LIKE', "%$keyword%")
                ->orWhere('UDK', 'LIKE', "%$keyword%")
                ->orWhere('published_year', 'LIKE', "%$keyword%")
                // ->orWhere('apply_no', 'LIKE', "%$keyword%")
                // ->orWhere('photo', 'LIKE', "%$keyword%") 
                // ->orWhere('organization_of_issue3', 'LIKE', "%$keyword%")
                // ->orWhere('grade3', 'LIKE', "%$keyword%")
                // ->orWhere('score3', 'LIKE', "%$keyword%")
                // ->orWhere('date3', 'LIKE', "%$keyword%")
                // ->orWhere('changed', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $books = Book::select(['id', 'isbn', 'status', 'title', 'author', 'UDK', 'published_year', 'image'])->latest()->where('status', true)->paginate($perPage);
        }

        return view('book.index', compact('books'));
    }

    public function inventars(Request $request)
    {
        $perPage = 10;
        $from = trim($request->get('from'));
        $to = trim($request->get('to'));

        if (!empty($from) && !empty($to)) {
            $inventars = DB::table('book_inventar_lists')->whereBetween(DB::raw('RIGHT(`invertar_number`, 6)'), [intval(substr('' . trim($request->get('from')), -6)), intval(substr('' . trim($request->get('to')), -6))])
                ->orderBy(DB::raw('RIGHT(`invertar_number`, 6)'), 'ASC')->paginate($perPage);
        } elseif (!empty($from)) {
            $inventars = DB::table('book_inventar_lists')->where(DB::raw('RIGHT(`invertar_number`, 6)'), intval(substr('' . trim($request->get('from')), -6)))
                ->orderBy(DB::raw('RIGHT(`invertar_number`, 6)'), 'desc')->paginate($perPage);
        } elseif (!empty($to)) {
            $inventars = DB::table('book_inventar_lists')->where(DB::raw('RIGHT(`invertar_number`, 6)'), intval(substr('' . trim($request->get('to')), -6)))
                ->orderBy(DB::raw('RIGHT(`invertar_number`, 6)'), 'desc')->paginate($perPage);
        } else {
            $inventars = DB::table('book_inventar_lists')->orderBy(DB::raw('RIGHT(`invertar_number`, 6)'), 'desc')->paginate($perPage);
        }
        return view('book.inventars', compact('inventars', 'from', 'to'));
    }

    public function exportInventarAllByFromTo(Request $request)
    {
        $from = trim($request->get('from'));
        $to = trim($request->get('to'));
        if (!empty($from) && !empty($to)) {
            // $inventars = DB::table('book_inventar_numbers')->whereBetween('in_num', [intval(substr('' . trim($request->get('from')), -6)), intval(substr('' . trim($request->get('to')), -6))])
            //     ->get();
            $inventars = DB::table('book_inventar_lists')->whereBetween(DB::raw('RIGHT(`invertar_number`, 6)'), [intval(substr('' . trim($request->get('from')), -6)), intval(substr('' . trim($request->get('to')), -6))])
                ->orderBy(DB::raw('RIGHT(`invertar_number`, 6)'), 'ASC')->get();
            return view('pdf.inventarall', array('items' => $inventars));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book();

        $faculties = Faculty::pluck('name', 'id');
        $book_text_types = BookTextType::active()->pluck('name', 'id');
        $book_types = BookType::active()->pluck('name', 'id');
        $book_languages = BookLanguage::active()->pluck('name', 'id');
        $directions = Direction::active()->pluck('name', 'id');
        $book_texts = BookText::active()->pluck('name', 'id');
        $update_mode = false;
        return view('book.create', compact('book', 'faculties', 'book_text_types', 'book_types', 'book_languages', 'directions', 'book_texts', 'update_mode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required',
            'betlar_soni' => 'required',
            'price' => 'required',
            'file' => 'nullable|mimes:jpg,jpeg,png,svg,gif|max:2048', // 2MB Max
            'full_text' => 'nullable|mimes:pdf,doc,docx', // 2MB Max
            'arrived_year' => 'required|integer',
            'summarka_number' => 'nullable|integer',
            'faculty_id' => 'required',
            'copies' => 'required|integer',
        ];
        if ($request->input('isbn')) {
            $rules['isbn'] = 'nullable|unique:books';
        }

        request()->validate($rules);

        $bookDB = DB::table('books')
            ->where('title', '=', $request->input('title'))
            ->where('author', '=', $request->input('author'))
            ->where('published_year', '=', $request->input('published_year'))
            ->where('betlar_soni', '=', $request->input('betlar_soni'))
            ->where('price', '=', $request->input('price'))
            ->get();
        if (isset($bookDB) && $bookDB->count() > 0) {
            throw ValidationException::withMessages(['Kitob allaqachon bazada bor']);
        }
        $book_coverage_image_name = '';
        if ($request->file('file')) {
            $book_coverage_image_name = Auth::id() . '_' . uniqid() . '_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
            $filePath = $request->file('file')->storeAs('books/coverage', $book_coverage_image_name, 'public');
        }
        $book_coverage_full_text_name = '';
        if ($request->file('full_text')) {
            $book_coverage_full_text_name = Auth::id() . '_pdf_' . uniqid() . '_' . time() . '.' . $request->file('full_text')->getClientOriginalExtension();
            $filePath = $request->file('full_text')->storeAs('books/fulltext', $book_coverage_full_text_name, 'public');
        }

        $bookData = [
            'title' => $request->input('title'),
            'isbn' => $request->input('isbn'),
            'author' => $request->input('author'),
            'city' => $request->input('city'),
            'publisher' => $request->input('publisher'),
            'UDK' => $request->input('UDK'),
            'image' =>  $book_coverage_image_name,
            'full_text' =>  $book_coverage_full_text_name,
            'description' => $request->input('description'),
            'published_year' => $request->input('published_year'),
            'betlar_soni' => $request->input('betlar_soni'),
            'price' => $request->input('price'),
            'book_text_type_id' => $request->input('book_text_type_id'),
            'book_type_id' => $request->input('book_type_id'),
            'book_language_id' => $request->input('book_language_id'),
            'book_text_id' => $request->input('book_text_id'),
            'exists_electron_format' => $request->input('exists_electron_format'),
            'exists_in_library' => $request->input('exists_in_library'),
            'status' => true,
        ];
        // Begin Transaction
        DB::beginTransaction();
        try {
            $book = Book::create($bookData);
            $this->book_id = $book->id;
            $this->faculty_id = $request->input('faculty_id');

            if ($this->book_id && $this->faculty_id) {
                $bookInventarData = [
                    'faculty_id' => $this->faculty_id,
                    // 'direction_id'=>($this->dire)?$this->faculty_id:null,
                    'arrived_year' =>  $request->input('arrived_year'),
                    'summarka_number' => ($request->input('summarka_number')) ? $request->input('summarka_number') : null,
                    'faculty_code' => ($this->faculty_id) ? Faculty::GetById($this->faculty_id)->abbreviation : null,
                    'copies' => $request->input('copies'),
                    'inventar_number_begin' => 1,
                    'inventar_number_end' => 1,
                    'qr_code_lists' => 1,
                    'book_id' => $this->book_id,
                ];
                if ($this->book_inventar_id) {
                    $bookInventar = BookInventar::find($this->book_inventar_id);
                    $bookInventar->update($bookInventarData);
                } else {
                    $bookInventar = BookInventar::create($bookInventarData);
                    $this->book_inventar_id = $bookInventar->id;
                }
            }

            if ($this->book_id > 0 && $this->book_inventar_id > 0) {
                $this->addInvertars($request->input('copies'), $request->input('arrived_year'), $request->input('summarka_number'));
            }

            // Commit Transaction
            DB::commit();
        } catch (\Exception $e) {
            // Rollback Transaction
            DB::rollback();
        }

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $add_inventars_mode = null)
    {
        $book = Book::find($id);
        $faculties = Faculty::pluck('name', 'id');
        $book_text_types = BookTextType::active()->pluck('name', 'id');

        $book_types = BookType::active()->pluck('name', 'id');
        $book_languages = BookLanguage::active()->pluck('name', 'id');
        $directions = Direction::active()->pluck('name', 'id');
        $book_texts = BookText::active()->pluck('name', 'id');

        $bookInventars = BookInventar::where('book_id', $id)->get();
        $qr_lists = BookInventarList::where('book_id', '=', $id)->get();

        return view('book.show', compact('book', 'add_inventars_mode', 'faculties', 'book_text_types', 'book_types', 'book_languages', 'directions', 'book_texts', 'bookInventars', 'qr_lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $faculties = Faculty::pluck('name', 'id');
        $book_text_types = BookTextType::active()->pluck('name', 'id');

        $book_types = BookType::active()->pluck('name', 'id');
        $book_languages = BookLanguage::active()->pluck('name', 'id');
        $directions = Direction::active()->pluck('name', 'id');
        $book_texts = BookText::active()->pluck('name', 'id');

        $bookInventars = BookInventar::where('book_id', $id)->get();
        $qr_lists = BookInventarList::where('book_id', '=', $id)->get();
        $update_mode = true;
        return view('book.edit', compact('book', 'faculties', 'book_text_types', 'book_types', 'book_languages', 'directions', 'book_texts', 'bookInventars', 'update_mode', 'qr_lists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        $rules = [
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required',
            'betlar_soni' => 'required',
            'price' => 'required',
            'file' => 'nullable|mimes:jpg,jpeg,png,svg,gif|max:2048', // 2MB Max
        ];

        request()->validate($rules);
        $book_coverage_image_name = '';
        if ($request->file('file')) {
            $book_coverage_image_name = Auth::id() . '_' . uniqid() . '_' . time() . '.' . $request->file('file')->getClientOriginalExtension();
            $filePath = $request->file('file')->storeAs('books/coverage', $book_coverage_image_name, 'public');
        }
        $book_coverage_full_text_name = '';
        if ($request->file('full_text')) {
            $book_coverage_full_text_name = Auth::id() . '_pdf_' . uniqid() . '_' . time() . '.' . $request->file('full_text')->getClientOriginalExtension();
            $filePath = $request->file('full_text')->storeAs('books/fulltext', $book_coverage_full_text_name, 'public');
        }
        $bookData = [
            'title' => $request->input('title'),
            'isbn' => $request->input('isbn'),
            'author' => $request->input('author'),
            'city' => $request->input('city'),
            'publisher' => $request->input('publisher'),
            'UDK' => $request->input('UDK'),
            'image' =>  $book_coverage_image_name,
            'full_text' =>  $book_coverage_full_text_name,
            'description' => $request->input('description'),
            'published_year' => $request->input('published_year'),
            'betlar_soni' => $request->input('betlar_soni'),
            'price' => $request->input('price'),
            'book_text_type_id' => $request->input('book_text_type_id'),
            'book_type_id' => $request->input('book_type_id'),
            'book_language_id' => $request->input('book_language_id'),
            'book_text_id' => $request->input('book_text_id'),
            'exists_electron_format' => $request->input('exists_electron_format'),
            'exists_in_library' => $request->input('exists_in_library'),
            'status' => true,
        ];
        // Begin Transaction
        DB::beginTransaction();
        try {
            $book->update($bookData);
            // Commit Transaction
            DB::commit();
        } catch (\Exception $e) {
            // Rollback Transaction
            DB::rollback();
        }
        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // ->delete()
        $book = Book::find($id);
        $book->status = false;
        $book->save();
        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function deleteInventar(Request $request)
    {
        $rules = [
            'comment' => 'required',
            'inventar_id' => 'required',
        ];

        request()->validate($rules);
        $book_inventar = BookInventarList::find($request->input('inventar_id'));
        $book_inventar->status = false;
        $book_inventar->is_deleted = true;
        $book_inventar->comment = $request->input('comment');
        $book_inventar->save();
        return Redirect::back()->with('success', 'Inventar deleted successfully');

        //        dd($request->all());
        //
        //        return redirect()->route('books.index')
        //            ->with('success', 'Book deleted successfully');
    }
    public function exportInventar($inventar_id = null)
    {

        $inventars = BookInventarList::where('id', '=', $inventar_id)->get();
        $pdfContent = PDF::loadView('pdf.document', array('loans' => $inventars))->output();
        return response()->streamDownload(
            fn () =>  print($pdfContent),
            $inventar_id . ".pdf"
        );
        return null;
    }
    public function exportInventarAll($book_id = null)
    {
        $inventars = BookInventarList::select('invertar_number', 'qr_img')->where('book_id', '=', $book_id)->get();

        // $pdfContent = PDF::loadView('pdf.inventarall', array('items' => $inventars))->output();
        // return response()->streamDownload(
        //     fn () => print($pdfContent),
        //     $book_id.".pdf"
        // );
        return view('pdf.inventarall', array('items' => $inventars));
    }

    public function addInvertar($id)
    {
        return $this->show($id, true);
        // return view('book.show', compact('book', 'add_inventars_mode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function StoreInvertar(Request $request)
    {
        $rules = [
            'arrived_year' => 'required|integer',
            'summarka_number' => 'nullable|integer',
            'faculty_id' => 'required',
            'copies' => 'required|integer',
        ];
        request()->validate($rules);

        DB::transaction(function () use ($request) {
            $this->book_id = $request->input('book_id');
            $this->faculty_id = $request->input('faculty_id');
            if ($this->book_id && $this->faculty_id) {
                $bookInventarData = [
                    'faculty_id' => $this->faculty_id,
                    // 'direction_id'=>($this->dire)?$this->faculty_id:null,
                    'arrived_year' =>  $request->input('arrived_year'),
                    'summarka_number' => ($request->input('summarka_number')) ? $request->input('summarka_number') : null,
                    'faculty_code' => ($this->faculty_id) ? Faculty::GetById($this->faculty_id)->abbreviation : null,
                    'copies' => $request->input('copies'),
                    'inventar_number_begin' => 1,
                    'inventar_number_end' => 1,
                    'qr_code_lists' => 1,
                    'book_id' => $this->book_id,
                ];
                $bookInventar = BookInventar::create($bookInventarData);
                $this->book_inventar_id = $bookInventar->id;
            }

            if ($this->book_id > 0 && $this->book_inventar_id > 0) {
                $this->addInvertars($request->input('copies'), $request->input('arrived_year'), $request->input('summarka_number'));
            }
        }, 5);
        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }


    public function addInvertars($copies = null, $arrived_year = null, $summarka_number = null)
    {
        $inventar_negins = BookInventarList::count();
        if ($copies > 0) {
            for ($i = 1; $i <= $copies; $i++) {
                $temp_invertar_num = ($arrived_year) ?? $arrived_year;
                // if($arrived_year!=null)
                //     $temp_invertar_num.= '-';

                $temp_invertar_num .= ($summarka_number) ? '-' . $summarka_number : '';

                if ($arrived_year != null | $summarka_number != null)
                    $temp_invertar_num .= '/';
                $inver_numner = str_pad(($i + $inventar_negins), 6, '0', STR_PAD_LEFT);
                $temp_invertar_num .= Faculty::GetById($this->faculty_id)->abbreviation . '-' . $inver_numner;

                \QRcode::png($temp_invertar_num, 'qr_image.png', 'L', 4, 2);
                BookInventarList::create([
                    'invertar_number' => $temp_invertar_num,
                    'is_deleted' => 0,
                    'status' => true,
                    'extra1' => $inver_numner,
                    'book_id' => $this->book_id,
                    'book_inventar_id' => $this->book_inventar_id,
                    'qr_img' => base64_encode(file_get_contents('qr_image.png')),
                ]);
            }
        }
        // if($this->is_add_invertar_mode && $this->book_id>0){
        //     $this->SwalAlertMessage($title = 'Successfully', $text = 'Saved Successfully.', $type = 'success', $icon = 'success', $toast = true, $position = 'top-right');
        //     $this->view($this->book_id);
        //     // return redirect()->to('/books');

        // }
    }
}