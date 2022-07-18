<?php

namespace App\Models;

use App\Http\Requests\StoreUpdateUserFormRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getUsers (string | null $search = '')
    {
        $users = $this->where(function ($query) use ($search) {
            if($search) {
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->with(['comments'])
        ->paginate(15);
        return $users;
    }

    public function storeUser($request)
    {   
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        // pegar extensão do arquivo
        // $extension = $request->image->getClientOriginalExtension();
        //renomear imagem
        // $data['image']= $request->image->storeAs('users', now().".{$extension}");
        if($request->image){
            $data['image']= $request->image->store('users');
        }
        $this->create($data);
    }
    public function userUpdate($request, $id)
    {
        // se não existir o id solicitado
        if(!$user = $this->find($id))
        // retorna para a rota de usuarios
            return redirect()->route('users.index');
        //se existir
        //atualizar todos os dados do usuario
        $data = $request->only('name', 'email');
        if($request->password)
            $data['password'] = bcrypt($request->password);

        if($request->image) {
            if($user->image && Storage::exists($user->image)) {
                Storage::delete($user->image);
            }
            $data['image'] = $request->image->store('users');
        }   
        $user->update($data);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
