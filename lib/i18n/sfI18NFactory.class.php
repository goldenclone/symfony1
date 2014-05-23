<?php
/**
 *
 * @author Yuriy Berest <djua.com@gmail.com>
 */

class sfI18NFactory
{
  public static function make($className, sfApplicationConfiguration $configuration, sfCache $cache = null, $options = array())
  {
    $result = new $className($configuration, $cache, $options);

    sfWidgetFormSchemaFormatter::setTranslationCallable(array($result, '__'));

    return $result;
  }
}
