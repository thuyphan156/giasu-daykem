<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\RegisterClass;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\RegisterTeacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Str;
use AmrShawky\Currency;
use App\Models\Contact;
use Vanthao03596\HCVN\Models\Province;
use Vanthao03596\HCVN\Models\District;
use App\Mail\SendMailToParent;
use App\Mail\SendInformationAssignTutor;
use Illuminate\Support\Facades\Mail;
use DB;



class HomeController extends Controller
{
    public function index() {
        $posts = Post::orderByDesc('created_at')->paginate(10);
        $users = User::orderByDesc('created_at')->limit(6)->get();

        return view('client.home', compact('posts', 'users'));
    }

    public function introduce() {
        return view('client.introduce');
    }

    public function showPosts() {
        $posts = Post::orderByDesc('created_at')->paginate(12);
        $classes = Classes::all();
        $cities = Province::orderBy('name','asc')->get();

        return view('client.posts', compact('posts', 'classes', 'cities'));
    }

    public function registerClass($id) {
        RegisterClass::create([
            'post_id' => $id,
            'teacher_id' => Auth::user()->id
        ]);

        toastr()->success('Đăng ký thành công');

        return redirect()->back();
    }

    public function checkout($id) {
        $registerClass = RegisterClass::find($id);
        $post = Post::find($registerClass->post_id);

        return view('client.checkout', compact('registerClass', 'post'));
    }

    public function pay(Request $request, $id) {
        $product = [];
        $postId = $request->post_id;
        $contact = Contact::find($request->contact_id);
        $post = Post::find($postId);
        $request->session()->put('email', $contact->email);
        RegisterClass::where('id', $id)->update(['status' => 3]);
        $product['items'] = [
            [
                'name' => Classes::find($post->class_id)->title . ': ' . Subject::find($post->subject_id)->title,
                'price' => round(Currency::convert()
                ->from('VND')
                ->to('USD')
                ->amount($request->total)
                ->get(), 2),
                'qty' => 1
            ]
        ];
        $product['invoice_id'] = $postId;
        $product['invoice_description'] = "Post #{$postId}";
        $product['return_url'] = route('done.payment.paypal');
        $product['cancel_url'] = route('cancel.payment.paypal');
        $product['total'] = round(Currency::convert()
        ->from('VND')
        ->to('USD')
        ->amount($request->total)
        ->get(), 2);
        
        $paypalModule = new ExpressCheckout;

        $res = $paypalModule->setExpressCheckout($product);

        $res = $paypalModule->setExpressCheckout($product, true);
        
        return redirect($res['paypal_link']);
    }

    public function cancelPaymentPaypal()
    {
        toastr()->error('You have already canceled payment !');

        return redirect()->back();
    }
  
    public function donePaymentPaypal(Request $request)
    {
        $randomString = Str::random(10);
        $code = (int)$randomString+time();
        $teacher_mail = Auth::user()->email;
        $teacher_id = Auth::user()->id;
        $mail_parent =  $request->session()->get('email');
        $request->session()->forget('email');
        $registerTeacher = RegisterTeacher::find($teacher_id);
        $sql =  DB::insert('insert into detail_evalue (gmail_user,id_user,code) values (?, ?,?)', [$mail_parent,$teacher_id, $code]);
       
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
        Mail::to($mail_parent)->send(new SendMailToParent($code,$registerTeacher->name));
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            toastr()->success('Thanh toán thành công');
        
            Mail::to($teacher_mail)->send(new SendInformationAssignTutor($registerTeacher));
            return redirect()->route('client.home');
        }
    }

    public function searchPost(Request $request)
    {
        $classes = Classes::all();
        $cities = Province::orderBy('name','asc')->get();
        $posts = new Post;
        if ($request->has('class') && !empty($request->class)) {
            $posts = $posts->where('class_id', $request->class);
        }

        if ($request->has('subject') && !empty($request->subject)) {
            $posts = $posts->where('subject_id', $request->subject);
        }

        if ($request->has('city') && !empty($request->city)) {
            $city = Province::find($request->city)->name;
            $posts = $posts->where('address', 'like', '%' . $city . '%');
        }

        if ($request->has('district') && !empty($request->district)) {
            $district = District::find($request->district)->name;
            $posts = $posts->where('address', 'like', '%' . $district . '%');
        }

        $posts = $posts->orderByDesc('created_at')->paginate(12);

        return view('client.posts', compact('posts', 'classes', 'cities'));
    }

    public function findTeacher()
    {
        $cities = Province::get();
        $classes = Classes::all();

        return view('client.find-teacher', compact('cities', 'classes'));
    }

    public function postFindTeacher(Request $request) {
        RegisterTeacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'province_id' => $request->city,
            'district_id' => $request->district,
            'address' => $request->address,
            'phone' => $request->phone,
            'class_id' => $request->class,
            'subject_id' => $request->subject,
            'students' => $request->students,
            'time' => implode(', ', $request->times),
            'salary' => $request->salary,
            'note' => $request->note
        ]);
        toastr()->success('Gửi thành công, trung tâm sẽ sắp xếp cho quý phụ huynh gia sư phù hợp trong vòng 2 - 3 ngày');

        return redirect()->back();
    }
}
