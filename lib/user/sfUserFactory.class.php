<?php

/**
 *
 * @author Yuriy Berest <djua.com@gmail.com>
 */
class sfUserFactory
{
  public static function make($className, sfEventDispatcher $dispatcher, sfStorage $storage, $options = array(), sfRequest $request)
  {
    return new $className($dispatcher, $storage, array_merge(
        array(
          'auto_shutdown' => false,
          'culture' => $request->getParameter('sf_culture')
        ),
        $options
      )
    );
  }
}
