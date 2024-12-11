<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\PostTooLargeException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Handle file size exception
        $this->app->singleton(
            \Illuminate\Contracts\Debug\ExceptionHandler::class,
            \App\Exceptions\Handler::class
        );

        $this->app->resolving(\App\Exceptions\Handler::class, function ($handler) {
            $handler->reportable(function (PostTooLargeException $e) {
                return false;
            });

            $handler->renderUsing(function ($request, PostTooLargeException $exception) {
                $maxSize = ini_get('upload_max_filesize');
                return back()
                    ->withErrors([
                        'file_size' => "Ukuran file terlalu besar. Maksimum yang diizinkan adalah {$maxSize}."
                    ])
                    ->withInput();
            });
        });

        // Optional: Add custom validation for file size
        Validator::extend('max_file_size', function ($attribute, $value, $parameters, $validator) {
            if (!$value) return true;
            
            $maxSizeInKb = $parameters[0] ?? 2048; // Default 2MB
            return $value->getSize() <= $maxSizeInKb * 1024;
        }, 'Ukuran file tidak boleh melebihi :max KB.');
    }
}