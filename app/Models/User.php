<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 31 Jul 2017 17:41:31 +0800.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int            $id
 * @property string         $name
 * @property string         $email
 * @property string         $password
 * @property bool           $is_admin
 * @property string         $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string         $deleted_at
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'users';

    protected $casts = [
        'is_admin' => 'bool',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'remember_token',
    ];
}
