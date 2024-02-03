<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_1', 'tel_2', 'tel_3', 'address', 'building', 'category_id', 'detail']);
        return view('confirm', compact('contact'));
    }

    public function admin(Request $request)
    {
        $contacts = Contact::all();
        $categories = Category::all();
        $contacts =Contact::Paginate(7);

        $input_search = $request->input('input_search');
        $search_gender = $request->input('search_gender');
        $search_category = $request->input('search_category');
        $search_date = $request->input('search_date');

        $query = Contact::query();

        if (!empty($input_search)) {
            $query->where('last_name' . 'first_name' . 'email', 'like', "%$input_search%");
        }

        if (!empty($search_gender)) {
            $query->where('gender', $search_gender);
        }

        if (!empty($search_category)) {
            $query->where('category_id', 'search_category');
        }

        if (!empty($search_date)) {
            $query->where('created_at', $search_date);
        }

        $results = $query->get();

        return view('/admin', compact('contacts', 'categories', 'results'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel_1', 'tel_2', 'tel_3', 'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);
        return view('thanks');      //DBにデータ入らない…thanks開けない…//
    }

    public function thanks()
    {
        return view('thanks');
    }

}
