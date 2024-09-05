<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function enquiry()
    {
        $enquiry = Enquiry::all();
        return view('admin.pages.enquiry.enquiry',compact('enquiry'));
    }
    public function delete($id)
    {
        $enquiry = Enquiry::findOrFail($id);
        if($enquiry){
            $enquiry->delete();
            return redirect()->back()->with('status','Enquiry deleted successfully');
        }else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
