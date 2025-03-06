<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailConfigurationsSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'encryption_type',
        'from_email',
        'from_name',
        'welcome_email',
        'welcome_subject',
        'welcome_content',
        'order_confirmation',
        'order_subject',
        'order_content',
        'password_reset',
        'password_reset_subject',
        'password_reset_content',
        'admin_notification_email',
        'new_order_notifications',
        'new_user_notifications',
        'contact_form_notifications',
        'daily_digest_email',
    ];
}
