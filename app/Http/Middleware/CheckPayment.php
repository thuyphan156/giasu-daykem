<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RegisterClass;

class CheckPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = (int) $request->route()->parameter('id');
        $registerClass = RegisterClass::find($id);
        if ($registerClass->status === 3) {
            toastr()->error('Lớp học đã được bàn giao');

            return redirect()->route('client.home');
        }

        return $next($request);
    }
}
