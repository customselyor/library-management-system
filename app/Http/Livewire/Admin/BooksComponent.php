<?php

namespace App\Http\Livewire\Admin;

use App\Exports\BooksExport;
use App\Models\Book;
use App\Models\BookInventar;
use App\Models\BookInventarList;
use App\Models\BookLanguage;
use App\Models\BookText;
use App\Models\BookTextType;
use App\Models\BookType;
use App\Models\Direction;
use App\Models\Faculty;
use Barryvdh\DomPDF\Facade as PDF;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class BooksComponent extends Component
{
    
    protected $paginationTheme = 'bootstrap'; 
    use WithPagination;


    public $updateMode = false, $show_create = false, $is_update_mode = false, $is_view_mode = false;
    public   $faculty, $copy, $user_id;
    public $years=[], $qr_lists=[], $inputs = [];
    public $i = 1;
    use WithFileUploads;
    public $photo;
    public $old_image, $bookInventars;
    
    public $qr_code, $faculty_id, $direction_id, $faculties, $directions, $book_types, 
    $book_languages, $book_texts, $books, $book_id, $book_inventar_id;
    public $title, $author, $subject, $isbn, $author_lists, $date, $description, $contributor, 
        $rights, $relation, $publisher, $format, $source, $identifier, $coverage, $city, $UDK, 
        $published_year, $copies, $image,  $arrived_year, $summarka_number, $faculty_code,
        $inventar_number_begin, $inventar_number_end, $inventar_number_removed, $full_text,
        $qr_code_lists, $status=true, $book_type_id, $book_language_id, $book_text_id, $betlar_soni;
    public $book_text_types, $is_add_invertar_mode=false, $book_text_type_id;
    public $sortField = 'id';
//    public $sortDirection='asc';
    public $sortAsc = false;
    public $search = '';
    public $s_isbn, $s_status, $s_title, $s_author, $perpage=10;

    public function render()
    {
        $this->faculties = Faculty::all();
        $this->book_text_types=BookTextType::active()->get();
        $this->book_types=BookType::active()->get();
        $this->book_languages=BookLanguage::active()->get();
        $this->directions= Direction::active()->get();
        $this->book_texts=BookText::active()->get();
 
        $books = Book::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perpage);
        if($this->s_isbn){
            $books = Book::where('isbn','=',trim($this->s_isbn))->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perpage);
        }
        if($this->s_status != null){
            $books = Book::where('status','=',trim($this->s_status))->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perpage);
        }
        if($this->s_title){
            $books = Book::where('title','=',trim($this->s_title))->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perpage);
        }
        if($this->s_author){
            $books = Book::where('author','=',trim($this->s_author))->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perpage);
        }

        return view('livewire.admin.books-component', [
            'data' => $books
        ])->layout('layouts.master');

    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
      
    
    public function store()
    {
        $booksData  = $this->validate([
            'title' => 'required',
            'author' => 'required',
            'city' => 'required',
            'publisher' => 'required',
            'photo' => 'nullable|mimes:jpg,jpeg,png,svg,gif|max:2048', // 2MB Max
            'image' => 'nullable', 
            'isbn' => 'nullable', 
            'published_year' => 'integer',
            'betlar_soni' => 'integer',
            'book_text_type_id' => 'required',
            'book_type_id' => 'required',
            'book_language_id' => 'required',
            'book_text_id' => 'required',
        ]);
 
        if($this->is_update_mode==false){
            $booksData2  = $this->validate([
                'faculty_id' => 'required',
                'arrived_year' => 'required|integer',
                'copies' => 'required|integer',
                'summarka_number' => 'nullable|integer',
            ]);
            $booksData['arrived_year']=$this->arrived_year;
            $booksData['summarka_number']=$this->summarka_number;
            $booksData['faculty_id']=$this->faculty_id;
            $booksData['copies']=$this->copies; 
        }
        

        if ($this->photo != null)
            $booksData['image'] = $this->photo->store('books/coverage', 'public');
        
         $bookData = [
            'title' => $this->title,
            'isbn' => $this->isbn,
            'author' => $this->author,
            'city' => $this->city,
            'publisher' => $this->publisher,
            'UDK' => $this->UDK,
            'image' =>  $booksData['image'],
            'description' => $this->description,
            'published_year' => $this->published_year,
            'betlar_soni' => $this->betlar_soni,
            'book_text_type_id'=>$this->book_text_type_id,
            'book_type_id'=>$this->book_type_id,
            'book_language_id'=>$this->book_language_id,
            'book_text_id'=>$this->book_text_id,
            'status'=>true,
        ];
        if($this->book_id){
            $book = Book::find($this->book_id);
            $book->update($bookData);
        }else{
            $book = Book::create($bookData);
            $this->book_id=$book->id;
        }
        if($this->book_id && $this->faculty_id && $this->arrived_year && $this->copies){
            $bookInventarData = [
                'faculty_id'=>$this->faculty_id,
                'direction_id'=>($this->direction_id)?$this->direction_id:null,
                'arrived_year' => $this->arrived_year,
                'summarka_number' => $this->summarka_number,
                'faculty_code' => ($this->faculty_id)?Faculty::GetById($this->faculty_id)->abbreviation:null,
                'copies' => $this->copies,
                'inventar_number_begin'=>1,
                'inventar_number_end'=>1,
                'qr_code_lists'=>1,
                'book_id'=>$this->book_id,
            ];
            
            if($this->book_inventar_id){
                $bookInventar = BookInventar::find($this->book_inventar_id);
                $bookInventar->update($bookInventarData);
            }else{
                $bookInventar = BookInventar::create($bookInventarData);
                $this->book_inventar_id=$bookInventar->id;
            }

        }

        if($this->book_id>0 && $this->book_inventar_id>0){
            if($this->is_update_mode==false){
                $this->addInvertars();
            }
        }
        $this->SwalAlertMessage($title = 'Successfully', $text = 'Saved Successfully.', $type = 'success', $icon = 'success', $toast = true, $position = 'top-right');
        $this->view($this->book_id);
    }
    public function UpdateAddInvertar(){
        $this->addInvertars();

        $bookInventarData = [
            'faculty_id'=>$this->faculty_id,
            'direction_id'=>($this->direction_id)?$this->direction_id:null,
            'arrived_year' => $this->arrived_year,
            'summarka_number' => $this->summarka_number,
            'faculty_code' => Faculty::GetById($this->faculty_id)->abbreviation,
            'copies' => $this->copies,
            'inventar_number_begin'=>1,
            'inventar_number_end'=>1,
            'qr_code_lists'=>1,
            'book_id'=>$this->book_id,
        ];
        $bookInventar = BookInventar::create($bookInventarData);
        $this->book_inventar_id=$bookInventar->id;
    }
    public function addInvertars(){
        for($i=1; $i<=$this->copies; $i++){
            $temp_invertar_num=($this->arrived_year)??$this->arrived_year;
            if($this->arrived_year!=null)
                $temp_invertar_num.= '-';
            $temp_invertar_num.=($this->summarka_number)?$this->summarka_number:'';

            if($this->arrived_year!=null | $this->summarka_number!=null)
                $temp_invertar_num.= '/';
            $temp_invertar_num.= Faculty::GetById($this->faculty_id)->abbreviation.'-'.str_pad(($i+Book::GetInvertarBegins($this->faculty_id)), 6, '0', STR_PAD_LEFT);
            
            \QRcode::png($temp_invertar_num, 'qr_image.png', 'L', 4, 2);
            $bookInventarList = BookInventarList::create([
                'invertar_number'=>$temp_invertar_num,
                'is_deleted'=>0,
                'status'=>true,
                'book_id'=>$this->book_id,
                'book_inventar_id'=>$this->book_inventar_id,
                'qr_img'=>base64_encode(file_get_contents('qr_image.png')),
            ]);
        }
        if($this->is_add_invertar_mode && $this->book_id>0){
            $this->SwalAlertMessage($title = 'Successfully', $text = 'Saved Successfully.', $type = 'success', $icon = 'success', $toast = true, $position = 'top-right');
            $this->view($this->book_id);
            // return redirect()->to('/books');

        }
    }


    public function view($id){
        $this->is_add_invertar_mode = true;
        $this->is_update_mode = false;
        $this->is_view_mode  = true;
        $this->show_create = false;
        $this->dbData($id);
    }


    public function destroyInventar($inventar_list_id){
        dd($inventar_list_id);
    }

    public function export($inventar_id=null)
    {
        $loans= BookInventarList::where('id', '=', $inventar_id)->get();
        $pdfContent = PDF::loadView('pdf.document', array('loans' => $loans))->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            $inventar_id.".pdf"
        );
    }

    public function addInvertar($id){
      
        $this->is_add_invertar_mode = true;
        $this->is_update_mode = false;
        $this->is_view_mode  = true;
        $this->show_create = false;
        $this->dbData($id);
    }
    
    public function edit($id){
        $this->is_add_invertar_mode = false;
        $this->is_update_mode = true;
        $this->is_view_mode  = false;
        $this->show_create = true;
        $this->dbData($id);
    }

    protected function dbData($id)
    {
        $this->book_id=$id;
        $book = Book::where('id', $id)->first();
        $this->title=$book->title;
        $this->isbn=$book->isbn;
        $this->author=$book->author;
        $this->city=$book->city;
        $this->publisher=$book->publisher;
        $this->UDK=$book->UDK;
        $this->description=$book->description;
        $this->published_year=$book->published_year;
        $this->betlar_soni=$book->betlar_soni;
        $this->book_text_type_id=$book->book_text_type_id;
        $this->book_type_id=$book->book_type_id;
        $this->book_language_id=$book->book_language_id;
        $this->book_text_id=$book->book_text_id;
        $this->old_image=$book->image;
        $this->status=true;

        if($this->book_id){
            $this->bookInventars = BookInventar::where('book_id', $this->book_id)->get();
         }
        // && $this->bookInventars->count()>0
        // foreach ($this->bookInventars as $k=>$item){
        // }
        if($this->book_id){
            // $this->qr_lists = BookInventarList::where('book_id', '=', $this->book_id)->where('book_inventar_id', '=', $this->book_inventar_id)->get();
            $this->qr_lists = BookInventarList::where('book_id', '=', $this->book_id)->get();
        }
 
    }

    public function ShowHideCreate()
    {
        $this->clearInputs();
        $this->show_create = !$this->show_create;
        $this->is_view_mode = false;
    }
    public function HideCreate()
    {
        $this->clearInputs();
        $this->show_create = false;
        $this->is_view_mode = false;

    }

    public function ShowCreate()
    {
        $this->is_update_mode = false;
        $this->is_view_mode = false;
        $this->clearInputs();
        $this->show_create = true;
    }
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function clearInputs(){
        $this->title=null;
        $this->isbn=null;
        $this->author=null;
        $this->city=null;
        $this->publisher=null;
        $this->UDK=null;
        $this->description=null;
        $this->published_year=null;
        $this->betlar_soni=null;
        $this->book_text_type_id=null;
        $this->book_type_id=null;
        $this->book_language_id=null;
        $this->book_text_id=null;
        $this->faculty_id=null;
        $this->direction_id=null;
        $this->arrived_year=null;
        $this->summarka_number=null;
        $this->faculty_id=null;
        $this->copies=null;
        $this->book_id=null;
        $this->photo=null;
        $this->book_inventar_id=null;
    }
     /**
     * Write code on Method
     */
    protected function SwalAlertMessage($title = null, $text = null, $type = null, $icon = null, $toast = true, $position = null)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'title' => ($title) ? $title : 'Empty',
            'text' => ($text) ? $text : 'Text Feedback Saved',
            'timer' => 3000,
            'type' => ($type) ? $type : 'success',
            'icon' => ($icon) ? $icon : 'success',
            'toast' => ($toast) ? $toast : false,
            'position' => ($position) ? $position : 'top-right'
        ]);
    }
}
