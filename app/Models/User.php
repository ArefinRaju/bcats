<?php

namespace App\Models;

use Helper\Repo\Entity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\Builder;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static Builder create(array $attributes = [])
 * @method public Builder update(array $values)
 * @property mixed|string acl
 */

class User extends Entity implements Authenticatable
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


    /**
     * @inheritDoc
     */
    public function getAuthIdentifierName()
    {
        return "id";
    }

    /**
     * @inheritDoc
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getRememberToken()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * @inheritDoc
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}
