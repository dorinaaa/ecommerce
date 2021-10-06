<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\FlashMessages;

class BaseController extends Controller
{
    use FlashMessages;
    protected $data = null;




    /**
 * @param $title
 * @param $subTitle
 */

 //to set the page title and subtitle
protected function setPageTitle($title, $subTitle)
{
    view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
}
    

/**
 * @param int $errorCode
 * @param null $message
 * @return \Illuminate\Http\Response
 */


 //to show error page with our custom message and type of error page we want to load.
protected function showErrorPage($errorCode = 404, $message = null)
{
    $data['message'] = $message;
    return response()->view('errors.'.$errorCode, $data, $errorCode);
}




/**
 * @param bool $error
 * @param int $responseCode
 * @param array $message
 * @param null $data
 * @return \Illuminate\Http\JsonResponse
 */
protected function responseJson($error = true, $responseCode = 200, $message = [], $data = null)
{
    return response()->json([
        'error'         =>  $error,
        'response_code' => $responseCode,
        'message'       => $message,
        'data'          =>  $data
    ]);
}




/**
 * @param $route
 * @param $message
 * @param string $type
 * @param bool $error
 * @param bool $withOldInputWhenError
 * @return \Illuminate\Http\RedirectResponse
 */


 //redirect to a page or route if the request is HTTP,
protected function responseRedirect($route, $message, $type = 'info', $error = false, $withOldInputWhenError = false)
{
    $this->setFlashMessage($message, $type);
    $this->showFlashMessages();

    if ($error && $withOldInputWhenError) {
        return redirect()->back()->withInput();
    }

    return redirect()->route($route);
}



/**
 * @param $message
 * @param string $type
 * @param bool $error
 * @param bool $withOldInputWhenError
 * @return \Illuminate\Http\RedirectResponse
 */


 //redirect the user to the previous page, for example when we update a category we should send the user to the same category view.
protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false)
{
    $this->setFlashMessage($message, $type);
    $this->showFlashMessages();

    return redirect()->back();
}


}