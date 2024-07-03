<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FAQ\StoreFAQRequest;
use App\Http\Requests\Admin\FAQ\UpdateFAQRequest;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::paginate();
        return view('pages.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('pages.faq.create');
    }

    public function store(StoreFAQRequest $request)
    {
        $data = $request->validated();
        FAQ::create($data);
        return back()
            ->with('Success', 'Created Successfully');
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('pages.faq.edit', compact('faq'));
    }

    public function update(UpdateFAQRequest $request, $id)
    {
        $faq = FAQ::findOrFail($id);
        $data = $request->validated();
        $faq->update($data);
        return back()
            ->with('Success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();
        return back()
            ->with('Success', 'Deleted Successfully');
    }
}
