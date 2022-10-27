<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    // use Notifiable;
    // public function routeNotificationForSlack($notification)
    // {
    //     return 'https://hooks.slack.com/services/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';
    // }

    use HasFactory;
    protected $table = 'app_aktivitas';
    protected $guarded = [];
}


