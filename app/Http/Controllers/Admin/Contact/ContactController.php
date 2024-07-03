<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Mail\ReplyMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ReplyContact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::paginate();
        return view('pages.contact.index', compact('messages'));
    }

    public function replyMessage(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'reply_message' => 'required|string',
        ]);
        $contact = Contact::findOrFail($request->contact_id);
        Mail::to($contact->email)->send(new ReplyContact($request->reply_message));
        return back()->with('Success', 'Reply sent successfully.');
    }

    public function delete(Contact $contact)
    {
        $contact->delete();
        return back()
            ->with('Success', 'Deleted Successfully');
    }
}
