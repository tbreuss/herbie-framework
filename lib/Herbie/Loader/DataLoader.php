<?php

namespace Herbie\Loader;

/**
 * Loads site data.
 *
 * @author Thomas Breuss <thomas.breuss@zephir.ch>
 */
class DataLoader
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var Parser
     */
    protected $parser;

    /**
     * @var array
     */
    protected $extensions;

    /**
     * @param string $path
     * @param Parser $parser
     * @param array $extensions
     */
    public function __construct($path, Parser $parser, array $extensions = [])
    {
        $this->path = $path;
        $this->parser = $parser;
        $this->extensions = $extension;
    }

    /**
     * @return array
     */
    public function load()
    {
        $data = [];
        $files = scandir($this->path);
        foreach($files AS $file) {
            if(substr($file, 0, 1) === '.') {
                continue;
            }
            $info = pathinfo($file);
            if(!in_array($info['extension'], $this->extensions)) {
                continue;
            }
            $key = $info['filename'];
            $content = file_get_contents($this->path.'/'.$file);
            $data[$key] = $parser->parse($content);
        }

        return $data;
    }

}