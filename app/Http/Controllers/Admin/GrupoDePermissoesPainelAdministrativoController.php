<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GrupoDePermissoesPainelAdministrativo;
use Illuminate\Support\Facades\Validator;

class GrupoDePermissoesPainelAdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = GrupoDePermissoesPainelAdministrativo::paginate(10);
        $data = [
            'grupos' => $grupos,
        ];
        return view('admin.permissao.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissao.cadastro');
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
            'nomo_do_grupo'
        ]);

        $validator = $this->validator($data);

        if($validator->fails()){
            return redirect()->route('permission.create')
            ->withErrors($validator)->withInput();
        }

        $grupo = $this->cadastrar($data);
        
        if($grupo){
            return redirect()->route('permission.index');
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
            'nomo_do_grupo' => ['required', 'string','min:4', 
            'max:255', 
            'unique:grupo_de_permissoes_painel_administrativos'],
        ]);
    }

    protected function cadastrar(array $data)
    {
        return GrupoDePermissoesPainelAdministrativo::create([
            'nomo_do_grupo' => $data['group_name'],
        ]);
    }
}
