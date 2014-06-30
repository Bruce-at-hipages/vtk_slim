<?php
/**
 * test base class
 *
 */
namespace VS_Test
{
    class VTest
    {
        public function test()
        {
            echo 'hello';
        }
    }
}

namespace {
    function dump($var)
    {
        echo '<pre>' . print_r($var, 1) . '</pre>';
    }
}
?>