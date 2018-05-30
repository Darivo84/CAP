<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\Career;
use App\ContactUs;
use App\Industry;
use App\News;
use App\Service;
use App\ServiceCategory;
use App\Team;
use App\UsefulDocument;
use Illuminate\Http\Request;
use Session;

class PublicController extends Controller
{

    public function getWelcome()
    {

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        $colours = [
            's-turqoise',
            's-apple',
            's-blue',
            's-lemon',
            's-blue',
            's-apple',
            's-turqoise',
            's-blue',
            's-apple',
            's-lemon',
            's-lemon',
        ];



        $contact = ContactUs::whereNull('deleted_at')->orderBy('created_at', 'desc')->first();

        return view('welcome', ['contact' => $contact, 'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'colours' => $colours, 'slider_link' => $slider_link]);
    }

    //Get About Us
    public function getAbout()
    {
        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        $team = Team::whereNull('deleted_at')->orderBy('display_order', 'desc')->paginate(10);
        $team_articles = [];
        foreach ($team as $member) {
            $a = News::where('team_id', $member->id)->get();
            if (isset($a)) {
                $team_articles[$member->id] = $a;
            }
        }

        $about_us = AboutUs::whereNull('deleted_at')->first();

        return view('public.about.index', ['team' => $team, 'about_us' => $about_us, 'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'team_articles' => $team_articles, 'slider_link' => $slider_link]);
    }
        //Get About Us
    public function getPrivacy()
    {
        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        $team = Team::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
        $team_articles = [];
        foreach ($team as $member) {
            $a = News::where('team_id', $member->id)->get();
            if (isset($a)) {
                $team_articles[$member->id] = $a;
            }
        }

        $about_us = AboutUs::whereNull('deleted_at')->first();

        return view('public.privacy', ['team' => $team, 'about_us' => $about_us, 'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'team_articles' => $team_articles, 'slider_link' => $slider_link]);
    }

    //Get News
    public function getNews()
    {

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        $articles = News::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(5);

        return view('public.news.index', ['articles' => $articles, 'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'slider_link' => $slider_link]);
    }

    public function getNewsSingle($title, $id)
    {

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        $article = News::where('id', $id)->first();

        return view('public.news.single', ['article' => $article, 'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'slider_link' => $slider_link]);
    }

    //Get Services
    public function getServices()
    {

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        $service_categories = ServiceCategory::all();

        $colours = [
            's-turqoise',
            's-blue',
            's-apple',
            's-lemon',
            's-blue',
            's-apple',
            's-turqoise',
            's-blue',
            's-apple',
            's-lemon',
            's-lemon',
        ];

        return view('public.services.index', ['service_categories' => $service_categories, 'colours' => $colours, 'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'slider_link' => $slider_link]);
    }

    //Get Services Slider
    public function getServicesSlider($title,$key)
    {

        $title = ucwords(str_replace('-', ' ', $title));

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        $selected_cat = ServiceCategory::whereNull('deleted_at')->where('name', $title)->first();
        $services = Service::whereNull('deleted_at')->where('category_id', $selected_cat->id)->orderBy('id', 'desc')->get();
       

        $articles = News::where('service_id', $selected_cat->id)->take(3)->get();

        return view('public.services.slider', ['services' => $services, 'selected_cat' => $selected_cat, 'articles' => $articles, 'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'key' => $key, 'slider_link' => $slider_link]);
    }

    //Get Industries
    public function getIndustries()
    {

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        return view('public.industries.index', ['service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'slider_link' => $slider_link]);
    }

    //Get industries Slider
    public function getIndustriesSlider($title,$link)
    {

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        $industries = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();

        $da_link = $link;

        return view('public.industries.slider', ['industries' => $industries, 'link' => $da_link, 'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'slider_link' => $slider_link]);
    }

    //Get Contact
    public function getContact()
    {

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        $contact = ContactUs::whereNull('deleted_at')->orderBy('created_at', 'desc')->first();

        return view('public.contact.index', ['contact' => $contact, 'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'slider_link' => $slider_link]);
    }

    //Get Careers Student
    public function getCareersStudent()
    {

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        return view('public.careers.student', ['service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'slider_link' => $slider_link]);
    }

    //Get Careers Professional
    public function getCareersProf()
    {

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        $careers = Career::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();

        $pdfs = [];
        foreach($careers as $career){
            $pdfs[$career->id] = UsefulDocument::where('id', $career->description)->first();
        }

        return view('public.careers.prof', ['pdfs' => $pdfs, 'careers' => $careers, 'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'slider_link' => $slider_link]);
    }

        public function getCareersDesc($id)
    {

        $job = Career::where('id',$id)->first();
        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        return view('public.careers.job-desc', ['job' => $job,'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'slider_link' => $slider_link]);
    }


    public function getUsefulDocuments()
    {

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        } $slider_link = 0;
        //INCLUDE IN ALL - END

        $documents = UsefulDocument::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

        return view('public.useful-documents.index', ['documents' => $documents, 'service_categories_footer' => $service_categories_footer, 'industries_footer' => $industries_footer, 'services_arr' => $services_arr, 'slider_link' => $slider_link]);
    }

    public function postDownloadPDF($id)
    {

        $pdf = UsefulDocument::where('id', $id)->first();

        return response()->download(public_path() . '/' . $pdf->path);
    }

    public function postDocumentDelete($id)
    {

        $user = Auth::user();
        $document = UsefulDocument::where('id', $id)->first();

        $document->delete();
        $documents = UsefulDocument::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
        Session::flash('success', 'Success! Your document has been deleted.');

        return view('admin.useful-documents.index', ['user' => $user, 'documents' => $documents,]);
    }

    public function getCapApp()
    {

        // INCLUDE IN ALL -START
        $service_categories_footer = ServiceCategory::all();
        $industries_footer = Industry::whereNull('deleted_at')->orderBy('title', 'desc')->get();
        $services_arr = [];
        foreach ($service_categories_footer as $service) {
            $services_arr[$service->id] = Service::where('category_id', $service->id)->orderBy('id', 'desc')->get();
        }
        $slider_link = 0;
        //INCLUDE IN ALL - END

        return view('public.cap-app.index', ['services_arr' => $services_arr, 'industries_footer' => $industries_footer, 'service_categories_footer' => $service_categories_footer, 'slider_link' => $slider_link]);
    }
}
