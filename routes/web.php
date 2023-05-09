<?php

use App\Models\TournamentEntry;
use App\Models\User;
use App\Notifications\EmailTagPos;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Bagtag;
use App\Http\Resources\Bagtag as BagtagResource;
use App\Http\Resources\User as UserResource;
use App\Http\Controllers\AssignController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/pdga-export/{tournament}',function (\App\Models\Tournament  $tournament){
    $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject);
    $csv->insertOne(['first_name','last_name','pdga_number','division']);
    TournamentEntry::with(['payment','user'])->where('tournament_id',$tournament->id)->whereHas('payment')->get()->each(function ($item) use ($csv){
        $csv->insertOne([
            'first_name' => $item->first_name,
            'last_name' => $item->last_name,
            'pdga_number' => $item->pdga_number,
            'division' => $item->division,
            'email' => $item->user->email
        ]);
    });
    return response((string) $csv, 200, [
        'Content-Type' => 'text/csv',
        'Content-Transfer-Encoding' => 'binary',
        'Content-Disposition' => 'attachment; filename="entries.csv"',
    ]);
});



Route::get('/', function (){
    return Inertia::render('TwentyTwentyThree', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'tags' => BagtagResource::collection(Bagtag::where('year',2023)->get()->sortBy('tag_number')),
        'users' => UserResource::collection(\App\Models\User::where('paid_2023',true)->get()->sortBy('name'))
    ]);
});


Route::get('/2022', function (){
    return Inertia::render('TwentyTwentyTwo', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'tags' => BagtagResource::collection(Bagtag::where('year',2022)->get()->sortBy('tag_number')),
        'users' => UserResource::collection(\App\Models\User::where('paid_2022',true)->get()->sortBy('name'))
    ]);
});



Route::get('/2021', function () {
//    return Inertia::render('BRB');
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'tags' => BagtagResource::collection(Bagtag::all()->sortBy('tag_number')),
        'users' => UserResource::collection(\App\Models\User::where('paid_2021',true)->get()->sortBy('name'))
    ]);
});

Route::get('/update-tag',function (Request $request){
    if($request->year == 2023)
    {
        $tag = Bagtag::where('tag_number',$request->tag)->where('year',2023)->get();


        return Inertia::render('ChangeTagTwentyThree',[
            'tag' => BagtagResource::collection($tag)->first(),
            'users' => UserResource::collection(\App\Models\User::where('paid_2023',true)->get()->sortBy('name'))
        ]);
    }
});

//Route::get('/tmp', function () {
////    return Inertia::render('BRB');
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//        'tags' => BagtagResource::collection(Bagtag::all()->sortBy('tag_number')),
//        'users' => UserResource::collection(\App\Models\User::where('paid_2021',true)->get()->sortBy('name'))
//    ]);
//});
//Route::redirect('/','/register');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/buy', function () {
    return Inertia::render('Pay');
})->name('buy');


Route::middleware(['auth:sanctum', 'verified'])->get('/tuesday-night-league', function () {
    return Inertia::render('Thursday');
})->name('thursday');

Route::middleware(['auth:sanctum', 'verified'])->get('/ric-taylor-memorial', function () {
    return Inertia::render('Ric');
})->name('rictourney');



Route::get('/mwo2', function () {
    return Inertia::render('MWO2',[
        'user' => \Illuminate\Support\Facades\Auth::user() ?? null
    ]);
})->name('mwo2');
Route::post('/mwo2',[\App\Http\Controllers\TournamentController::class,'mwo2']);
Route::get('/mwo2/register', function () {
    return Inertia::render('MWO2Reg',[
        'user' => \Illuminate\Support\Facades\Auth::user() ?? null
    ]);
})->name('mwo2reg');
Route::get('/mwo2/info', function () {
    return Inertia::render('MWO2Info',[
        'user' => \Illuminate\Support\Facades\Auth::user() ?? null
    ]);
})->name('mwo2info');


Route::get('/masters-2022', function () {
    return Inertia::render('Masters',[
        'user' => \Illuminate\Support\Facades\Auth::user() ?? null
    ]);
})->name('masters');

Route::post('/masters-2022',[\App\Http\Controllers\TournamentController::class,'masters2022']);

Route::get('/masters-2022/register', function () {
    return Inertia::render('MastersReg',[
        'user' => \Illuminate\Support\Facades\Auth::user() ?? null
    ]);
})->name('mastersreg');

Route::get('/masters-2022/info', function () {
    return Inertia::render('MastersInfo',[
        'user' => \Illuminate\Support\Facades\Auth::user() ?? null
    ]);
})->name('mastersinfo');












Route::get('/admin/assign', function (){
    $first = Bagtag::where('year',2023)->first();
    if($first == null)
    {
        $players = User::where('paid_2023',true)->get()->sortByDesc(function ($item){
            return $item->donation_amount;
        });
        //check if we already have tags for some reason...
        $first = DB::table('bagtags')->where('year',2023)->orderByDesc('created_at')->first();
        if($first != null)
        {
            $initial_tag = $first['tag_number'] + 1;
        }
        else{
            $initial_tag = 1;
        }
        $players->each(function ($item) use (&$initial_tag){
            $t = new Bagtag();
            $t->tag_number = $initial_tag;
            $t->year = 2023;
            $t->save();
            $initial_tag++;
            $item->bagtags()->attach($t);
            Log::info($item->name . ' Gets tag ' . $t->tag_number);
        });
    }
    else{
        $start_tag = Bagtag::where('year',2023)->orderByDesc('id')->first()->tag_number + 1;

        $users = \App\Models\User::where('paid_2023',true)->get()->filter(function ($item) {
            return $item->current_tag_position == "Unassigned";
        })->each(function ($item) use (&$start_tag){
            $t = new Bagtag();
            $t->tag_number = $start_tag;
            $t->year = 2023;
            $t->save();
            $start_tag++;
            $item->bagtags()->attach($t);
            Log::info($item->name . ' Gets tag ' . $t->tag_number);
            $user = $item->fresh();
            $user->notify(new EmailTagPos($user->current_tag_position));
        });
    }
});

Route::get('admin/qummec-duHboh-dexhy1/notify-everyone',function (){
    User::where('paid_2023',true)->get()->each(function ($user){
//        ray($user->current_tag_position);
        $user->notify(new EmailTagPos($user->current_tag_position));
    });
});


Route::get('admin/bq9RT75pTmrn/ticket-orders',function (){
    print_r('Name,Date,Total,Tickets,Ace-pot,Donation'); print_r('<br>');
    \App\Models\TicketOrder::where('created_at','>', \Carbon\Carbon::now()->startOfYear()->subYears(2))->where('payment_id','!=',null)->get()->sortBy('user_id')->map(function ($item){
        $user = User::where('id',$item->user_id)->first();

        print_r($user->name .','. $item->created_at->format('d/m/Y') .',' . number_format($item->amount/100,2) .  ',' . $item->tickets . ',' .  number_format($item->acepot,2)  . ',' . number_format($item->donation,2) ); print_r('<br>');
    });
});

