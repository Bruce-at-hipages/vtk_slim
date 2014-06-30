<?php
/**
 * this is the core file of slim vtk
 * it's largely similar to vtk library
 * with a few deligates moved out
 * and a few moved inside
 * @author Bruce Li
 */
namespace VTKS
{
    // core lib path
    define('VTKS_LIB_PATH', dirname(__FILE__));

    /**
     * Class Core
     * this is largely a collection of
     * static function that
     * can be used to manage
     * various aspects of the library
     * @package VTKS
     */
    class Core
    {
        /**
         * if you want to enforce base path, turn it on
         * @var bool
         */
        protected static $REQUIRE_BASEPATH = false;


        /**
         * auto load paths
         */
        protected static $APATHS = array(
            'VTKS' => VTKS_LIB_PATH,
        );


        /**
         * register a new ns with path to include
         * NOTE: case-sensitive!!!
         * @param $ns
         * @param $path
         */
        public static function registerNamespace($ns, $path)
        {
            self::$APATHS[$ns] = $path;

        }// end registerNS


        /**
         * the actual autoload
         * @param string $class the class name
         */
        public static function autoload($class)
        {
            // first, parse the string to make <NS>/path/class
            $arPaths = explode('\\', $class);
            if (empty($arPaths)) {
                return;
            }
            $basePath = null;
            if (!empty($arPaths[0])) {
                $ns = $arPaths[0];
                // let's find the base path
                if (!empty(self::$APATHS[$ns])) {
                    $basePath = self::$APATHS[$ns];
                } elseif (self::$REQUIRE_BASEPATH) {
                    throw new \Exception('Base path is NOT found for namespace: ' . $ns);
                }
                unset($arPaths[0]);
            }
            // now, start using basepath
            $basePath = rtrim($basePath, '/');
            $path = implode('/', $arPaths);
            require_once $basePath . '/' . $path . '.php';

        }// end autoload


    };// end Core

}// end namespace VTKS


/**
 * default namespace (global)
 */
namespace {
    /**
     * autoload override
     * @param $class
     */
    function __autoload($class)
    {
        return \VTKS\Core::autoload($class);
    };
}
?>