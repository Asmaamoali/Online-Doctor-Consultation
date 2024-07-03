<?php

namespace App\Http\Controllers\Front\Home;

use App\Models\Booking;
use App\Models\Symptom;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\User\Booking\BookRequest;
use App\Http\Requests\Front\User\Contact\ContactRequest;
use App\Models\Contact;
use App\Models\FAQ;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator; // Import Validator facade

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withWhereHas('subCategories', function ($sc) {
            $sc->withWhereHas('symptoms', function ($symptoms) {
                $symptoms->withWhereHas('medicines');
            });
        })
            ->get();
        $doctors = User::where('role', 'doctor')
            ->with('category')
            ->get();
        $availableCategories = Category::whereHas('doctors')
            ->whereHas('subCategories', function ($sc) {
                $sc->whereHas('doctors');
            })
            ->get();
        $galleries = Gallery::get();
        $faqs = FAQ::get();
        return view('front.pages.home', compact('categories', 'doctors', 'availableCategories', 'galleries', 'faqs'));
    }

    public function getSub(Request $request)
    {
        $category_id = $request->category_id;
        $sub_categories = SubCategory::where('category_id', $category_id)
            ->get();
        return response()->json($sub_categories);
    }

    public function getDoctors(Request $request)
    {
        $sub_category_id = $request->sub_category_id;
        $doctors = User::where('sub_category_id', $sub_category_id)
            ->where('role', 'doctor')
            ->get();
        return response()->json($doctors);
    }

    public function submit(BookRequest $request)
    {
        if (auth()->check() && auth()->user()->role != 'user') {
            return back()
                ->with('Error', 'unauthorized');
        }
        $data = $request->validated();
        Booking::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'doctor_id' => $data['doctor'],
            'user_id' => auth()->id(),
            'description' => $data['message'],
        ]);
        return back()
            ->with('Success', 'Your appointment request has been sent successfully. Doctors will contact you soon.');
    }

    public function contactSubmit(ContactRequest $request)
    {
        $data = $request->validated();
        Contact::create([
            'name' => $data['contact_name'],
            'email' => $data['contact_email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);
        return back()
            ->with('Success', 'Message Sent successfully');
    }

    public function getMedicine(Category $category)
    {
        $subCategories = SubCategory::where('category_id', $category->id)
            ->get();
        return view('front.pages.medicine', compact('subCategories'));
    }

    public function getSymptoms(Request $request)
    {
        $sub_category_id = $request->sub_category_id;
        $symptoms = Symptom::where('sub_category_id', $sub_category_id)
            ->get();
        return response()->json($symptoms);
    }

    public function getMedicines(Request $request)
    {
        $symptoms = $request->input('symptoms');
        $medicinesBySymptom = [];

        foreach ($symptoms as $symptomId) {
            $symptom = Symptom::find($symptomId);
            $medicines = $symptom->medicines;
            $medicinesBySymptom[$symptom->name] = $medicines;
        }

        return response()->json($medicinesBySymptom);
    }
}
