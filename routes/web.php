<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ChamadosController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstoqueController;




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

/** VIEWS PUBLICAS */
Route::get('/', [ChamadosController::class,'index'])->name('home');
Route::view('/suporte', 'suporte');
Route::view('/chamado', 'chamado');

/** ADMIN */
Route::middleware(['auth', 'isAdmin'])->group(function (){

    // DASHBOARD
        Route::get('/admin/dashboard', [AdminController::class,'adminDashboard']);

    // TABELA
        Route::post('/admin/tabelaChamado', [AdminController::class,'tabelaChamado'])->name('tabela_Chamado');
        Route::post('/admin/tabelaSolucao', [AdminController::class,'tabelaSolucionados'])->name('tabela_Solucionados');

    // CONTEUDO
        Route::post('/admin/conteudo', [AdminController::class,'conteudoChamado'])->name('conteudo_Chamado');

    // FILTRO
        Route::match(['get', 'post'],'/admin/filtro', [AdminController::class,'filtroChamado'])->name('filtro_Chamado');

    // STATUS
        Route::match(['get', 'post'],'/admin/alterar', [AdminController::class,'alterarTec'])->name('alterar_Tec');
        Route::match(['get', 'post'],'/admin/alterarS', [AdminController::class,'alterarStatus'])->name('alterar_Status');

    // TASK
        Route::match(['get', 'post'],'/admin/tasks',[AdminController::class,'adminTasks'])->name('admin_Tasks');
        Route::post('/admin/addtask',[AdminController::class,'addtask'])->name('add_Task');
        Route::post('/admin/checktask',[AdminController::class,'checkTask'])->name('check_task');
        Route::post('/admin/vertask',[AdminController::class,'verTask'])->name('ver_task');
        Route::post('/admin/edittask',[AdminController::class,'editTask'])->name('edit_task');

    // ESTOQUE
        Route::match(['get', 'post'],'/admin/estoque',[EstoqueController::class,'adminEstoque'])->name('admin_Estoque');
        Route::post('/admin/inclui',[EstoqueController::class,'inclui'])->name('inclui.item');
        Route::post('/admin/edita',[EstoqueController::class,'edita'])->name('edita.item');
        Route::post('/admin/enviar',[EstoqueController::class,'enviar_relatorio'])->name('enviar.relatorio');
        Route::get('/admin/baixar',[EstoqueController::class,'baixar_relatorio'])->name('baixar.relatorio');


    // ESCALA
        Route::get('/admin/escala', [AdminController::class,'adminEscala'])->name('admin_Escala');

    // SOLUCIONADOS
        Route::get('/solucionados',[ChamadosController::class,'dashboard'])->name('login.pagina');
        Route::post('/restore',[ChamadosController::class,'restore'])->name('restore.chamado');

    // FERRAMENTAS ACOMP
        Route::post('/acompadmin',[ChamadosController::class,'acompadmin'])->name('acompadmin');

    // TRANSPORTE
        Route::get('admin/atendimentos',[AdminController::class,'atendimentos'])->name('atendimentos');

    //PAINEL
        Route::get('admin/painel',[AdminController::class,'painel'])->name('painel');


});

//Post para os Formularios
Route::post('/formchamado', [ChamadosController::class,'store'])->name('chamados.store');
Route::post('/formhelp', [HelpController::class,'store'])->name('help.store');

// PERFIL
Route::post('/trocafoto', [PerfilController::class,'trocafoto'])->name('perfil.store');
Route::get('/perfil', [PerfilController::class,'dashborad'])->middleware('auth');

// Autenticação e logout
Route::get('/getChamado/{filtro?}',[ChamadosController::class,'login'])->name('login.page');
Route::post('/auth',[AuthController::class,'entrar'])->name('auth.login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::match(['get', 'post'], '/dark_mode', function (Request $request) {
    Cookie::queue('dark_mode', $request->dark_mode);
})->name('dark_mode');



