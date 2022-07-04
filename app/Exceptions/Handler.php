<?php

namespace App\Exceptions;

use Throwable;
use ErrorException;
use SebastianBergmann\Diff\Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

// // Set a safe environment:
// error_reporting(-1);

// // Maps errors to ErrorException.
// function my_error_handler($errno, $message)
// { throw new ErrorException($message); }

// try {
//     echo 1/0;
// }
// catch(ErrorException $e){
//     echo "got $e";
// }

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */

    
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    
    
}
