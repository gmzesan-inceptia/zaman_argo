<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of contacts in admin panel.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Contact::latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action-btn', function ($row) {
                    return $row->id;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y, h:i A');
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.contacts.index');
    }

    /**
     * Store a newly created contact message from frontend.
     */
    public function store(StoreContactRequest $request)
    {
        Contact::create($request->validated());
        
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent successfully! We will contact you soon.'
            ]);
        }
        
        return redirect()->back()->with('success', 'Your message has been sent successfully! We will contact you soon.');
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact message deleted successfully');
    }
}
