<?php namespace App\Http\Middleware;

use App\Client;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Administrator {
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $segments = $request->segments();

        if ($this->auth->guest())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect($segments[0] . '/admin/login');
            }
        } else {

            $client = \App\Administrator::where('user_id', $request->user()->id)->first();

            if($client == null)
            {
                return redirect($segments[0] . '/admin/login')
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => 'You are not a registered admin',
                    ]);
            }
        }
        return $next($request);
    }
}
