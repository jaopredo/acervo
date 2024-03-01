<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Symfony\Component\Routing\Exception\RouteNotFoundException;

use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function handler(Request $request, Throwable $e) {
        if ($e instanceof RouteNotFoundException) {
            return view('errors.404');
        } else if ($e instanceof TokenExpiredException) {
            return view('errors.419');
        }
    }

    public function render($request, Throwable $e) {
        if ($request->expectsJson()) {
            if ($e instanceof UniqueConstraintViolationException) {
                return response([
                    'message' => 'Você informou dados que já estão no banco de dados, tente fazer login!'
                ], Response::HTTP_NOT_ACCEPTABLE);
            } else if ($e instanceof ValidationException) {
                return response([
                    'message' => $e->getMessage(),
                    'errors' => $e->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        } else {
            if ($e instanceof QueryException) {
                return back()->withErrors([
                    'query' => $e->getMessage()
                ]);
            }
        }

        return parent::render($request, $e);
    }
}
