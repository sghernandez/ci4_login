<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Login implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        $uri = service('uri');
        
        if ($uri->getSegment(1) !== '' && ! session()->get('isLoggedIn'))
        {
            session()->destroy();
            // return redirect()->route('/');
        }           
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        $uri = service('uri');

        if (session()->get('isLoggedIn') && $uri->getSegment(1) === '')
        {
            return redirect()->route('home');
        }           
    }
    

}