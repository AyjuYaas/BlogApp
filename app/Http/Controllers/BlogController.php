<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;


class BlogController extends Controller {
    private $loginKey = "";

    public function index() {
        return view("Login.welcome");
    }
    public function login() {
        return view('Login.login');
    }
    public function register() {
        return view('Login.register');
    }

    public function handleLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $this->loginKey = Auth::user()->id;
            return redirect('/blog')->with('success', $this->loginKey);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function handleRegister(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            ]
        ]);

        if (User::where('email', '=', $request['email'])->count() > 0) {
            return redirect('/')->with('failure', 'Account Already Exists, Login to Continue');
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();

            return redirect('/')->with('success', 'Successfully Created Your Account');
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function blog(Request $request) {
        if (Auth::guest()) {
            return redirect('/');
        } else {
            $id = Auth::user()->id;
            $blogs = Blog::where('user_id', '=', $id)->orderBy('updated_at', 'DESC')->get();
            $data = compact("blogs");
            return view('Blog.blog')->with($data);
        }
    }

    public function create() {
        if (Auth::guest()) {
            return redirect('/');
        } else {
            $url = url('/create');
            $title = 'Create-Blog';
            $active = 'active';
            $button = 'Submit';
            $arr = ['title' => "", 'content' => ""];
            $blog = (object) $arr;
            $data = compact("title", "active", "button", "url", "blog");
            return view('Blog.create')->with($data);
        }
    }

    public function store(Request $request) {
        if (Auth::guest()) {
            return redirect('/');
        } else {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->user_id = Auth::user()->id;
            $blog->save();
            return redirect('/blog')->with('success', 'Succesfully Posted');
        }
    }

    public function iblog($id) {
        if (Auth::guest()) {
            return redirect('/');
        } else {
            $blog = Blog::where('blog_id', '=', $id)->where('user_id', '=', Auth::user()->id)->first();
            if (!is_null($blog)) {
                $data = compact('blog');
                return view('Blog.iblog')->with($data);
            }
            return redirect('/blog');
        }
    }

    public function deleteBlog($id) {
        if (Auth::guest()) {
            return redirect('/');
        } else {
            $blog = Blog::where('blog_id', '=', $id)->where('user_id', '=', Auth::user()->id)->first();
            if (!is_null($blog)) $blog->delete();

            return redirect('/blog');
        }
    }

    function editBlog($id) {
        if (Auth::guest()) {
            return redirect('/');
        } else {
            $blog = Blog::where('blog_id', '=', $id)->where('user_id', '=', Auth::user()->id)->first();
            if (!is_null($blog)) {
                $url = url('/update/') . '/' . $id;
                $title = 'Update-Blog';
                $active = "";
                $button = "Update";
                $data = compact('blog', 'url', 'title', 'active', 'button');
                return view('Blog.create')->with($data);
            }

            return redirect('/');
        }
    }

    function updateBlog($id, Request $request) {
        if (Auth::guest()) {
            return redirect('/');
        } else {
            $blog = Blog::where('blog_id', '=', $id)->where('user_id', '=', Auth::user()->id)->first();
            if (!is_null($blog)) {
                $blog->title = $request->title;
                $blog->content = $request->content;
                $blog->save();
            }

            return redirect()->route('ind-blog', ['id' => $id]);
        }
    }
}
