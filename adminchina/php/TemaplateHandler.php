<?php
/**
 * Created by PhpStorm.
 * User: pilig
 * Date: 03.11.2017
 * Time: 18:39
 */

class TemaplateHandler
{
    protected $file;
    protected $values = array();

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function SetParameter($key, $value)
    {
        $this->values[$key] = $value;
    }

    public function Output()
    {
        if (!file_exists($this->file)) {
            return "Error loading template file ($this->file).";
        }
        $output = file_get_contents($this->file);

        foreach ($this->values as $key => $value) {
            $tagToReplace = "[@$key]";
            $output = str_replace($tagToReplace, $value, $output);
        }

        return $output;
    }
}