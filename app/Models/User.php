<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'acl'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public int    $id;
    public string $email;
    public string $name;
    public string $mobile;

    public function getSanitized(): User
    {
        $out         = new User();
        $out->id     = $this->id;
        $out->name   = $this->name;
        $out->email  = $this->email;
        $out->mobile = $this->mobile;

        return $out;
    }

    public function setAcl(Acl $acl)
    {
        $this->attributes['acl'] = serialize($acl);
        $this->_acl              = $acl;
    }

    public function getAcl(): Acl
    {
        if (isset($this->_acl)) {
            return $this->_acl;
        }

        // Raw data
        if (!$this->acl) {
            // Return default ACL which will deny everything
            return new Acl();
        }

        $this->_acl = unserialize($this->acl);
        return $this->_acl;
    }
}
