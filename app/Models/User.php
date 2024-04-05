<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Mail\CreateUserMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
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
        'password' => 'hashed',
    ];

    public static function createUser(CreateRequest $request)
    {
        $data = $request->all();
        $password = uniqid();
        $data['password'] = bcrypt($password);

        $user = User::query()->create($data);

        if (!$user) {
            return false;
        }

        $result = Mail::to([$request->email])->send(new CreateUserMail($user, $password));

        if (!$result) {
            $user->delete();
        }

        return $result;
    }

    public static function updateUser(UpdateRequest $request, User $user)
    {
        $data = $request->all();

        return $user->update($data);
    }

    public static function deleteUser(User $user)
    {
        if ($user->id == auth()->id()) {
            return null;
        }

        return $user->delete();
    }

    public function __toString()
    {
        return "{$this->name} ({$this->email})";
    }
}
