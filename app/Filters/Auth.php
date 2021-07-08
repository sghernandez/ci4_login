<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        $uri = service('uri');
        
        if ($uri->getSegment(1) !== 'login' && ! session()->get('isLoggedIn'))
        {
            session()->destroy();
            return redirect()->route('login');
        }           
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        $uri = service('uri');

        if (session()->get('isLoggedIn') && in_array($uri->getSegment(1), ['login', '']))
        {
           return redirect()->route('home');
        }           
    }
    

}