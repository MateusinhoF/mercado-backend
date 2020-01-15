<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsuarioPainelAdministrativo;
use App\GrupoDePermissoesPainelAdministrativo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioPainelAdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UsuarioPainelAdministrativo::paginate(10);
        $data = [
            'users' => $users,
        ];
        return view('admin.usuario.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = GrupoDePermissoesPainelAdministrativo::all();
        $data = [
            'grupos' => $grupos,
            'validator' => null,
        ];
        return view('admin.usuario.cadastro', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'first_name', 
            'second_name', 
            'email',  
            'usuario',
            'password',
            'password_confirmation',
            'permissao',
        ]);
        
        $validator = $this->validator($data);
        
        if($validator->fails()){
            return redirect()->route('user.create')
            ->withErrors($validator)
            ->withInput();
        }

        $user = $this->cadastar($data);

        if($user){
            return redirect()->route('user.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string','min:4', 'max:255'],
            'second_name' => ['required', 'string','min:4', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'usuario' => ['required', 'string','min:5', 'max:255', 'unique:usuario_painel_administrativos'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }

    protected function cadastar(array $data)
    {
        return UsuarioPainelAdministrativo::create([
            'primeiro_nome' => $data['first_name'], 
            'segundo_nome'=> $data['second_name'], 
            'email' => $data['email'], 
            'usuario'=> $data['usuario'], 
            'password' => Hash::make($data['password']),
            'permissao_id' => $data['permissao']
        ]);
    }
}
