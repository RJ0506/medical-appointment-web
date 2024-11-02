<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidTokenName
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next, string $name): Response
	{
		$user = auth()->user();
		$tokenName = $user->currentAccessToken()->name;

		// Perform checks based on token name
		if ($tokenName !== $name) {
			return response()->json(['message' => 'You are not authorized to make this request.'], 401);
		}

		return $next($request);
	}
}
