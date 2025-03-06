<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('email_configurations_settings', function (Blueprint $table) {
            $table->id();
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('encryption_type')->nullable();
            $table->string('from_email')->nullable();
            $table->string('from_name')->nullable();

            $table->boolean('welcome_email')->default(1);
            $table->string('welcome_subject')->nullable();
            $table->text('welcome_content')->nullable();

            $table->boolean('order_confirmation')->default(1);
            $table->string('order_subject')->nullable();
            $table->text('order_content')->nullable();

            $table->boolean('password_reset')->default(1);
            $table->string('password_reset_subject')->nullable();
            $table->text('password_reset_content')->nullable();

            $table->string('admin_notification_email')->nullable();
            $table->boolean('new_order_notifications')->default(1);
            $table->boolean('new_user_notifications')->default(1);
            $table->boolean('contact_form_notifications')->default(1);
            $table->boolean('daily_digest_email')->default(0);

            $table->timestamps();
        });

        DB::table('email_configurations_settings')->insert([
            'smtp_host' => 'smtp.example.com',
            'smtp_port' => '587',
            'smtp_username' => 'user@example.com',
            'smtp_password' => 'secret',
            'encryption_type' => 'tls',
            'from_email' => 'noreply@example.com',
            'from_name' => 'My Website',
            'welcome_email' => 1,
            'welcome_subject' => 'Welcome to our platform!',
            'welcome_content' => '',
            'order_confirmation' => 1,
            'order_subject' => 'Order Confirmation',
            'order_content' => '',
            'password_reset' => 1,
            'password_reset_subject' => 'Password Reset Request',
            'password_reset_content' => '',
            'admin_notification_email' => '',
            'new_order_notifications' => 1,
            'new_user_notifications' => 1,
            'contact_form_notifications' => 1,
            'daily_digest_email' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_configurations_settings');
    }
};
