use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // Mengembalikan tampilan 'home.blade.php'
    }

    public function about()
    {
        return view('about'); // Mengembalikan tampilan 'about.blade.php'
    }
}

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Selamat datang di halaman Home!</h1>
    <a href="/about">Tentang</a>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Tentang</title>
</head>
<body>
    <h1>Ini adalah halaman Tentang.</h1>
    <a href="/">Kembali ke Home</a>
</body>
</html>

public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->timestamps();
    });
}

public function posts()
{
    $posts = Post::all(); // Mengambil semua data dari tabel posts
    return view('posts.index', compact('posts'));
}

Route::get('/posts', [HomeController::class, 'posts']);

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Post</title>
</head>
<body>
    <h1>Daftar Post</h1>
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }} - {{ $post->content }}</li>
        @endforeach
    </ul>
    <a href="/">Kembali ke Home</a>
</body>
</html>

