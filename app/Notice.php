<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
    protected $table ="noticie";
    protected $primaryKey="idnotice";
    protected $fillable=["title","subtitle","autor","fecha","description"];
}
