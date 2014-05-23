<?php
/**
 *
 * @author Yuriy Berest <djua.com@gmail.com>
 */

class sfRoutingFactory
{
  public static function make($className, sfWebRequest $request, sfEventDispatcher $dispatcher, sfCache $cache = null, $options = array())
  {
    /** @var sfRouting $routing */
    $routing = new $className($dispatcher, $cache, array_merge(
      array(
        'auto_shutdown' => false,
        'context' => $request->getRequestContext()
      ),
      array(
        'load_configuration' => true,
        'suffix' => '',
        'default_module' => 'default',
        'default_action' => 'index',
        'debug' => '1',
        'logging' => '1',
        'generate_shortest_url' => true,
        'extra_parameters_as_query_string' => true,
        'lookup_cache_dedicated_keys' => true,
        'serialize_cached_values' => false,
      ),
      $options
    ));

    if ($parameters = $routing->parse($request->getPathInfo())) {
      $request->addRequestParameters($parameters);
    }

    return $routing;
  }
}
