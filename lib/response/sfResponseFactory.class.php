<?php
/**
 *
 * @author Yuriy Berest <djua.com@gmail.com>
 */

class sfResponseFactory
{
  public static function make($className, sfEventDispatcher $dispatcher, $options = array(), sfRequest $request)
  {
    $response = new $className($dispatcher, array_merge(
        array(
          'http_protocol' => isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : null,
          'logging' => '1',
          'charset' => 'utf-8',
          'send_http_headers' => true,
        ),
        $options
    ));

    if ($request instanceof sfWebRequest && $response instanceof sfWebResponse && $request->getMethod() === 'HEAD')
    {
      $response->setHeaderOnly(true);
    }

    return $response;
  }
}
