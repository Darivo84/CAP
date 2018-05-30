<?php

namespace App\Http\Controllers;

use App\Career;
use App\ServiceCategory;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\ContactUs;
use App\Industry;
use App\AboutUs;
use App\News;
use App\Team;
use App\Service;
use App\UsefulDocument;
use \Validator;

class AdminController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
    }

    protected function loadUserDashboard()
    {

        $user = Auth::user();

        return view('admin.dashboard', ['user' => $user]);
    }

    //Custom Functions Start

    //ABOUT US
    public function getAboutUpdate()
    {

        $about = AboutUs::where('id', 1)->first();

        return view('admin.about.index', ['about' => $about]);
    }

    public function postAboutUpdate(Request $request)
    {

        $about = AboutUs::where('id', 1)->first();

        $validator = Validator::make(input::all(), array(
            "description" => "required",
        ));

        if ($validator->passes()) {
            $about->description = $request->description;
            $about->save();

            return redirect()->back()->with('success', 'Success! About Us description has been updated.');
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    //CONTACT US
    public function getContactUpdate()
    {

        $contact = ContactUs::where('id', 1)->first();

        return view('admin.contact-us.index', ['contact' => $contact]);
    }

    public function postContactUpdate(Request $request)
    {

        $contact = ContactUs::where('id', 1)->first();

        $validator = Validator::make(input::all(), array(
            "tel" => "required",
            "address" => "required",
            "email" => "required",
        ));

        if ($validator->passes()) {
            $contact->tel = $request->tel;
            $contact->address = $request->address;
            $contact->email = $request->email;
            $contact->save();

            return redirect()->back()->with('success', 'Success!Contact details have been updated.');
        } else {

            return redirect()->back()->withErrors($validator->errors())->withInput();

        }
    }

    //News
    public function getNews()
    {

        $user = Auth::user();
        $blog_article = News::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.news.index', ['user' => $user, 'blog_article' => $blog_article]);
    }

    public function getNewsCreate()
    {

        $user = Auth::user();
        $services = ServiceCategory::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        $team = Team::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();

        return view('admin.news.create', ['user' => $user, 'services' => $services, 'team' => $team]);
    }

    public function getNewsUpdate($article_id)
    {

        $user = Auth::user();
        $article = News::find($article_id);
        $services = ServiceCategory::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        $team = Team::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        $selected_service = ServiceCategory::where('id', $article->service_id)->first();
        $selected_team = Team::where('id', $article->team_id)->first();

        return view('admin.news.edit', ['user' => $user, 'article' => $article, 'services' => $services, 'team' => $team, 'selected_service' => $selected_service, 'selected_team' => $selected_team]);
    }

    public function postNewsCreate(Request $request)
    {

        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "title" => "required|max:255",
            "description" => "required",
            "cover_image" => "required|mimes:jpg,jpeg,tif,png,gif|max:2000",
        ));

        if ($validator->passes()) {
            $input = $request->all();

            if ($file = $request->file('cover_image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('images/uploads/news', $name);
                $image_path = '/images/uploads/news/' . $name;
                $input['cover_image'] = $image_path;
            }

            $input['title'] = ucwords(trim($input['title']));
            $article = new News;
            $article->title = $input['title'];
            $article->description = $input['description'];
            $article->cover_image = $input['cover_image'];
            $article->team_id = $input['team_id'];
            $article->service_id = $input['service_id'];
            $article->save();

            return redirect('dashboard/news')->with('success', 'Success! Your article has been created.');
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    public function postNewsUpdate(Request $request, $article_id)
    {
//var_dump($request);exit;
        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "title" => "required|max:255",
            "description" => "required",
        ));

        if ($validator->passes()) {
            $article = News::find($article_id);
            $input = $request->all();

            if ($file = $request->file('cover_image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('images/uploads/news', $name);
                $image_path = '/images/uploads/news/' . $name;
                $input['cover_image'] = $image_path;
            }

            $input['title'] = ucwords(trim($input['title']));
            $article->update($input);
            $article->team_id = $request->team_id;
            $article->save();

            return redirect()->back()->with('success', 'Success! Your article has been updated.');
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    public function postNewsDelete($article_id)
    {

        $user = Auth::user();
        $article = News::find($article_id);
        $article->delete();

        return redirect()->back()->with('success', 'Success! Your article has been deleted.');
    }

    //team
    public function getTeam()
    {

        $user = Auth::user();
        $team = Team::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.team.index', ['user' => $user, 'team' => $team,]);
    }

    public function getTeamCreate()
    {

        $user = Auth::user();

        return view('admin.team.create', ['user' => $user,]);
    }

    public function postTeamCreate(Request $request)
    {

        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "title" => "required",
            "profile_picture" => "required|mimes:jpg,jpeg,tif,png,gif|max:2000",
            "experience" => "required",
            "display_order" => "required",
            "qualifications" => "required",
            "tel" => "required",
        ));

        if ($validator->passes()) {
            $team_memeber = new Team();
            $input = $request->all();

            if ($file = $request->file('profile_picture')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('images/uploads/team', $name);
                $image_path = '/images/uploads/team/' . $name;
                $team_memeber->profile_picture = $image_path;
            }

            $team_memeber->first_name = $input['first_name'];
            $team_memeber->last_name = $input['last_name'];
            $team_memeber->tel = $input['tel'];
            $team_memeber->display_order = $input['display_order'];
            $team_memeber->experience = $input['experience'];
            $team_memeber->qualifications = $input['qualifications'];
            $team_memeber->email = $input['email'];
            $team_memeber->title = $input['title'];
            $team_memeber->save();

            $team = Team::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
            \Session::flash('success', 'Success! Your team member has been created.');

            return view('admin.team.index', ['user' => $user, 'team' => $team,]);
        } else {

            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    public function getTeamUpdate($user_id)
    {

        $user = Auth::user();
        $team_member = Team::where('id', $user_id)->first();

        return view('admin.team.edit', ['user' => $user, 'team_member' => $team_member,]);
    }

    public function postTeamUpdate(Request $request, $user_id)
    {
        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "title" => "required",
            "display_order" => "required",
            "experience" => "required",
            "qualifications" => "required",
            "tel" => "required",
        ));

        if ($validator->passes()) {
            $team_member = Team::where('id', $user_id)->first();
            $input = $request->all();

            if ($file = $request->file('profile_picture')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('images/uploads/team', $name);
                $image_path = '/images/uploads/team/' . $name;
                $input['profile_picture'] = $image_path;
            }

            $team_member->update($input);
            $team_member->display_order = $request->display_order;
            $team_member->save();

            return redirect()->back()->with('success', 'Success! Your team member has been updated.');
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    public function postTeamDelete($id)
    {

        $user = Auth::user();
        $team_member = Team::where('id', $id)->first();
        $team_member->delete();
        $team = Team::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

        \Session::flash('success', 'Success! Your team member has been deleted.');

        return view('admin.team.index', ['user' => $user, 'team' => $team,]);
    }

    //INDUSTRIES
    public function getIndustries()
    {

        $user = Auth::user();
        $industries = Industry::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.industries.index', ['user' => $user, 'industries' => $industries]);
    }

    public function getIndustriesCreate()
    {

        return view('admin.industries.create');
    }

    public function getIndustriesUpdate($id)
    {

        $industry = Industry::find($id);

        return view('admin.industries.edit', ['industry' => $industry]);
    }

    public function postIndustriesCreate(Request $request)
    {

        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "title" => "required",
            "description" => "required",
        ));

        if ($validator->passes()) {

            $industry = new Industry();

            if ($file = $request->file('icon')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('images/uploads/news', $name);
                $image_path = '/images/uploads/news/' . $name;
                $industry->icon = $image_path;
            }

            $industry->title = $request->title;
            $industry->description = $request->description;
            $industry->save();
            $industries = Industry::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
            \Session::flash('success', 'Success! Your industry has been created.');

            return view('admin.industries.index', ['user' => $user, 'industries' => $industries]);
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

    }

    public function postIndustriesUpdate(Request $request, $id)
    {

        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "title" => "required",
            "description" => "required",
        ));

        if ($validator->passes()) {

            $industry = Industry::find($id);

            if ($file = $request->file('icon')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('images/uploads/news', $name);
                $image_path = '/images/uploads/news/' . $name;
                $industry->icon = $image_path;
            }

            $industry->title = $request->title;
            $industry->description = $request->description;
            $industry->save();
            $industries = Industry::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

            return redirect()->back()->with('success', 'Success! Your industry has been updated.');
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

    }

    public function postIndustriesDelete($id)
    {

        $user = Auth::user();
        $industry = Industry::where('id', $id)->first();
        $industry->delete();
        $industries = Industry::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
        \Session::flash('success', 'Success! Your industry has been deleted.');

        return view('admin.industries.index', ['user' => $user, 'industries' => $industries,]);
    }

    //SERVICES
    public function getServices()
    {

        $user = Auth::user();
        $services = Service::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

        $service_cats = [];
        foreach ($services as $service) {
            $sc = ServiceCategory::where('id', $service->category_id)->first();
            if (isset($sc)) {
                $service_cats[$service->id] = $sc->name;
            }

        }
        return view('admin.services.index', ['user' => $user, 'services' => $services, 'service_cats' => $service_cats]);
    }

    public function getServicesCreate()
    {

        $service_cats = ServiceCategory::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.services.create', ['service_cats' => $service_cats]);
    }

    public function getServicesUpdate($id)
    {

        $service = Service::find($id);
        $service_cats = ServiceCategory::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
        $selected_category = ServiceCategory::where('id', $service->category_id)->first();

        return view('admin.services.edit', ['service' => $service, 'service_cats' => $service_cats, 'selected_category' => $selected_category]);
    }

    public function postServicesCreate(Request $request)
    {

        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "title" => "required",
            "description" => "required",
        ));

        if ($validator->passes()) {
            $service = new Service();
            $service->title = $request->title;
            $service->subtitle = $request->subtitle;
            $service->description = $request->description;
            $service->category_id = $request->category_id;
            $service->save();
            $services = Service::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
            \Session::flash('success', 'Success! Your service has been created.');
            $service_cats = ServiceCategory::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

            return view('admin.services.index', ['user' => $user, 'services' => $services, 'service_cats' => $service_cats]);
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    public function postServicesUpdate(Request $request, $id)
    {

        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "title" => "required",
            "description" => "required",
        ));

        if ($validator->passes()) {
            $service = Service::find($id);
            $service->title = $request->title;
            $service->category_id = $request->category_id;
            $service->subtitle = $request->subtitle;
            $service->description = $request->description;
            $service->save();
            $services = Service::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
            $service_cats = ServiceCategory::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();

            return redirect()->back()->with('success', 'Success! Your service has been updated.');
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    public function postServicesDelete($id)
    {

        $user = Auth::user();
        $service = Service::where('id', $id)->first();
        $service->delete();
        $services = Service::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
        \Session::flash('success', 'Success! Your service has been deleted.');

        return view('admin.services.index', ['user' => $user, 'services' => $services,]);
    }

    //SERVICE CATEGORIES
    public function getServiceCategories()
    {

        $user = Auth::user();
        $service_cats = ServiceCategory::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.service-categories.index', ['user' => $user, 'service_cats' => $service_cats]);
    }

    public function getServiceCategoriesCreate()
    {

        return view('admin.service-categories.create');
    }

    public function getServiceCategoriesUpdate($id)
    {

        $service_cat = ServiceCategory::find($id);

        return view('admin.service-categories.edit', ['service_cat' => $service_cat]);
    }

    public function postServiceCategoriesCreate(Request $request)
    {

        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "name" => "required",
        ));

        if ($validator->passes()) {
            $service_cat = new ServiceCategory();
            $service_cat->name = $request->name;
            $service_cat->save();
            $service_cats = ServiceCategory::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
            \Session::flash('success', 'Success! Your service category has been created.');

            return view('admin.service-categories.index', ['user' => $user, 'service_cats' => $service_cats]);
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    public function postServiceCategoriesUpdate(Request $request, $id)
    {

        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "name" => "required",
        ));

        if ($validator->passes()) {
            $service_cat = ServiceCategory::find($id);
            $service_cat->name = $request->name;
            $service_cat->save();
            $service_cats = ServiceCategory::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

            return redirect()->back()->with('success', 'Success! Your service category has been updated.');
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    public function postServiceCategoriesDelete($id)
    {

        $user = Auth::user();
        $service_cat = ServiceCategory::where('id', $id)->first();
        $service_cat->delete();
        $service_cats = ServiceCategory::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
        \Session::flash('success', 'Success! Your service category has been deleted.');

        return view('admin.service-categories.index', ['user' => $user, 'service_cats' => $service_cats,]);
    }

    //USEFUL DOCUMENTS
    public function getUsefulDocuments()
    {

        $documents = UsefulDocument::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.useful-documents.index', ['documents' => $documents]);
    }

    public function getUsefulDocumentsCreate()
    {

        return view('admin.useful-documents.create');
    }

    public function postUsefulDocumentsCreate(Request $request)
    {

        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "title" => "required|max:255",
            "pdf_file" => "required|mimes:pdf|max:15000",
        ));

        if ($validator->passes()) {
            $input = $request->all();

            if ($file = $request->file('pdf_file')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('pdfs/uploads/', $name);
                $pdf_path = '/pdfs/uploads/' . $name;

                $pdf = new UsefulDocument();
                $pdf->title = $request->title;
                $pdf->path = $pdf_path;
                $pdf->save();
                return redirect('dashboard/useful-documents')->with('success', 'Success! Your document has been uploaded.');
            }

        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
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
        \Session::flash('success', 'Success! Your document has been deleted.');

        return view('admin.useful-documents.index', ['user' => $user, 'documents' => $documents,]);
    }

    //CAREERS
    public function getCareers()
    {

        $user = Auth::user();
        $careers = Career::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.careers.index', ['user' => $user, 'careers' => $careers]);
    }

    public function getCareersCreate()
    {

        return view('admin.careers.create');
    }

    public function getCareersUpdate($id)
    {

        $career = Career::find($id);

        return view('admin.careers.edit', ['career' => $career]);
    }

    public function postCareersCreate(Request $request)
    {

        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "title" => "required",
            "pdf_file" => "required",
        ));

        if ($validator->passes()) {
            $career = new Career();

             if ($file = $request->file('pdf_file')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('pdfs/uploads/', $name);
                $pdf_path = '/pdfs/uploads/' . $name;

                $pdf = new UsefulDocument();
                $pdf->title = $request->title;
                $pdf->path = $pdf_path;
                $pdf->save();
                
            }

            $career->title = $request->title;
            $career->PDF = $pdf->id;
            $career->description = $request->description;
            $career->save();
            $careers = Career::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
            \Session::flash('success', 'Success! Your career has been created.');

            return view('admin.careers.index', ['user' => $user, 'careers' => $careers]);
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

    }

    public function postCareersUpdate(Request $request, $id)
    {


        //var_dump($request->description);exit;

        $user = Auth::user();

        $validator = Validator::make(input::all(), array(
            "title" => "required",
            
        ));

        if ($validator->passes()) {
            $career = Career::find($id);

            if ($file = $request->file('pdf_file')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('pdfs/uploads/', $name);
                $pdf_path = '/pdfs/uploads/' . $name;

                $pdf = new UsefulDocument();
                $pdf->title = $request->title;
                $pdf->path = $pdf_path;
                $pdf->save();

                 $career->PDF = $pdf->id;
            }

            $career->title = $request->title;
            $career->description = $request->description;
           
            $career->save();
            $careers = Career::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);

            return redirect()->back()->with('success', 'Success! Your career has been updated.');
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

    }

    public function postCareersDelete($id)
    {

        $user = Auth::user();
        $career = Career::where('id', $id)->first();
        $career->delete();
        $careers = Career::whereNull('deleted_at')->orderBy('created_at', 'desc')->paginate(10);
        \Session::flash('success', 'Success! Your career has been deleted.');

        return view('admin.careers.index', ['user' => $user, 'careers' => $careers,]);
    }

}


