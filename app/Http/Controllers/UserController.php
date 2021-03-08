<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Validator;
//use App\User;
use App\Models\user;
use Gate;
use Illuminate\Http\Request;
use Flash;
use Response;
use Hash;

class UserController extends AppBaseController
{
    /** @var $userRepository UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$users = $this->userRepository->all();
        $users = User::paginate(6);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        if ( Gate::denies('criar-user')){
            abort(403, 'Não tem Permissão para criar um utilizador');
        }
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = $this->userRepository->create($input);

        Flash::success('Utilizador Criado.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $request->validate([
           // 'username' => 'required|sometimes|unique:users',
        ]);
        $input =  $request->all();

        if (!empty($input['password'])) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }
        $user = $this->userRepository->update($input, $id);

        Flash::success('Utilizador Actualizado.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('Utilizador Removido.');

        return redirect(route('users.index'));
    }

    public function bloquear(Request $request)
    {
        /* Receber user_id */
        $user = $this->userRepository->find($request->input('atender'));

        if (empty($user)) {
            Flash::error('Utilizador nao foi encontrado');

            return redirect()->back();
        }
        //Actualizar estado do utilizador
        if ($user->estado==1){
            User::where('id',$user->id)->update([
                'estado'=> 0,
                'updated_at' => date('Y-m-d')
            ]);
        }else{
            User::where('id',$user->id)->update([
                'estado'=> 1,
                'updated_at' => date('Y-m-d')
            ]);
            Flash::success( $user->name. ' foi Desbloqueado.');
            return redirect(route('users.index'));
        }

        Flash::error( $user->name. ' foi Bloqueado.');
        return redirect(route('users.index'));
    }
}
