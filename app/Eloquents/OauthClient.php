<?php

namespace App\Eloquents;

use Illuminate\Database\Eloquent\Model;

class OauthClient extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_clients';

    /**
     * @var boolean
     */
    public $incrementing = false;
}
