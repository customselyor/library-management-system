<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\BookInventarList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rainwater\Active\Active;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        // Find latest users
        // $users = Active::users()->get();
        //  // Loop through and echo user's name
        // foreach ($users as $activity) {
        //     echo $activity->user->name . '<br>';
        // }
        $users = User::count();
        $books = Book::active()->count();
        $book_copies = BookInventarList::active()->count();
        // dd($book_copies);
        // $book_data = DB::table('books')
        //     ->selectRaw('Year(`created_at`) as year, Month(`created_at`) as month, COUNT(*) as count')
        //     ->where('status', '=', 1)
        //     ->groupBy("month")
        //     ->get(); 
        return view('home', compact('users', 'books', 'book_copies'));
    }
}
