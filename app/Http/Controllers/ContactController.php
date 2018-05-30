<?php

namespace App\Http\Controllers;

use App\CurriculumVitae;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    protected function contact(request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required',
            'email' => 'required|email',
            'messages' => 'required'
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['surname'] = $request->surname;
        $data['email'] = $request->email;

        if (isset($request->business))
            $data['business'] = $request->business;
        if (isset($request->department))
            $data['department'] = $request->department;

        $data['messages'] = $request->messages;

        Mail::send('emails/mail', $data, function($message) {

            $message->from('info@chartered.co.za', 'CAP Chartered Accountants Inc.');
            $message->to('info@chartered.co.za')->subject($request->department);

        });

        return redirect('/#home')->with('message', 'Message Sent.');
    }

    protected function careers()
    {

        return view('careers');
    }

    protected function careerPost(request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required',
            'email' => 'required|email',
            'messages' => 'required'
        ]);

        $pdf_path = NULL;

        $data = array();
        $data['name'] = $request->name;
        $data['surname'] = $request->surname;
        $data['email'] = $request->email;
        $data['messages'] = $request->messages;

        if ($file = $request->file('pdf_file')) {
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move('pdfs/uploads/', $name);
            $pdf_path = '/pdfs/uploads/' . $name;

            $pdf = new CurriculumVitae();
            $pdf->first_name = $data['name'];
            $pdf->last_name = $data['surname'];
            $pdf->path = $pdf_path;
            $pdf->save();
            $data['pdf_path'] = $pdf_path;

        }
        /*        var_dump($data);exit;*/

        Mail::send('emails/mail', $data, function($message) use ($pdf_path) {
            $message->from('info@chartered.co.za', 'CAP Chartered Accountants Inc.');
            $message->to('careers@chartered.co.za')->subject('New Careers Request');

            if ($pdf_path != NULL) {
                $message->attach(storage_path($pdf_path));
            }
        });

        return redirect('/#home')->with('message', 'Message Sent.');
    }
}
