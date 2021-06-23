<?php

namespace App\Http\Controllers;


use App\Models\Enquiry;
use App\Mail\EnquirySent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Enquiry $enquiry)
    {
        $data['enquiry'] = Enquiry::all();
        return view('admin.enquiries.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Enquiry $enquiry)
    {
        $this->_save($request, $enquiry);

        Mail::to(env('MAIL_FROM_ADDRESS'))->queue(new EnquirySent($enquiry));

        return redirect()->route('landing')->with('success', 'Enquiry sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Enquiry $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Enquiry $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Enquiry $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Enquiry $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $model = Enquiry::find($id);
        if ($model) {
            $model->delete();
        }
        if ($request->ajax()) {
            return response()->json(true);
        } else {
            return redirect('/enquiries');
        }
    }

    protected function _validate($request)
    {
        $this->validate($request, [
            'name' => "required",
            'email' => "required|email",
            'message' => "required",
        ]);
    }

    protected function _save($request, $model)
    {
        $this->_validate($request);

        $model->fill($request->except(['_token']));
        $model->save();
    }
}
