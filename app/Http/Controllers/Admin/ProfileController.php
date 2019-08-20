<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\Models\Media;
use App\Http\Requests\UpdateProfileformRequest;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(UpdateProfileformRequest $request)
    {
        $user = auth()->user();

        $data = $request->all();

        // para não alterar a senha se estiver vazia
        if (is_null($data['password'])) {
            unset($data['password']);
        } else {
            // alterar a senha somente se informar a senha atual
            if (! Hash::check($request->input('current_password'), $user->password)) {
                return redirect()
                    ->back()
                    ->with('error', 'Nova senha não alterado, senha atual está incorreta.');
            }
        }

        // alterar email somente se informar a senha atual
        if ($request->input('email') != $user->email) {
            if (! Hash::check($request->input('current_password'), $user->password)) {
                return redirect()
                    ->back()
                    ->with('error', 'E-mail não alterado, senha atual incorreta.');
            }
        }

        $data['avatar_id'] = $user->avatar_id;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $avatars = $user->getMedia('avatar');
            if(count($avatars) >= 3){
                return redirect()
                ->back()
                ->with('error', 'É permitido somente 3 fotos por usuário.');
            }

            $media = $user
                ->addMedia($request->image)
                ->withResponsiveImages()
                ->sanitizingFileName(function($fileName) {
                    return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                })
                ->toMediaCollection('avatar');

            if (!$media) {
                return redirect()
                ->back()
                ->with('error', 'Falha ao fazer o upload da foto');
            }

            $data['avatar_id'] = $media->id;
        }

        $update = $user->update($data);
        if ($update) {
            return redirect()
                    ->route('profile.edit')
                    ->with('success', 'Perfil atualizado com sucesso!');
        }

        return redirect()
                ->back()
                ->with('error', 'Falha ao atualizar o perfil.');
    }

    public function updateFoto(Request $request)
    {
        $user = auth()->user();
        $user->avatar_id = $request->selectedAvatar;
        $update = $user->save();

        if ($update) {
            return redirect()
                    ->back()
                    ->with('success', 'Foto atualizada com sucesso!');
        }
    }


    public function destroyFoto(Request $request)
    {
        $avatar_id = $request->deletedAvatar;

        if ($avatar_id instanceof Media) {
            $avatar_id = $avatar_id->id;
        }
        $media = Media::find($avatar_id);
        if (! $media) {
            throw MediaCannotBeDeleted::doesNotBelongToModel($avatar_id, $this);
        }
        $delete = $media->delete();
        if ($delete) {
            $user = auth()->user();
            $user->avatar_id = NULL;
            $user->save();

            return redirect()
                    ->back()
                    ->with('success', 'Foto deletada com sucesso!');
        }

        return redirect()
                ->back()
                ->with('error', 'Falha ao deletar a foto.');
    }
}
