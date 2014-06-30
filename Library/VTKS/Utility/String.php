<?php
namespace VTKS\Utility;
/**
 * Class String
 * @package VTKS\Utility
 */
class String
{
    /**
     * a little template engine, use :name to do the job
     * @param str $template the template
     * @param array $options the options
     * @return str the replaced template
     */
    public static function template($template, $options)
    {
        foreach ((array) $options as $key => $option) {
            $template = str_replace(':' . $key, $option, $template);
        }

        return $template;

    }// end template

}// end String
?>