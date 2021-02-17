<?php
declare(strict_types=1);

class ymlFeed
{

    /** @var object */
    public $xml;

    /** @var string */
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->xml = $this->loadFile();
    }

    /**
     * @return object
     * @property array $shop
     */
    function loadFile(): object
    {
        if (file_exists($this->filename)) {
            $xml = simplexml_load_file($this->filename);

            if (!$xml) {
                exit('Обнаружена ошибка разметки XML в файле: <b>' . $this->filename . '</b>');
            }

            return $xml;

        } else {
            exit('Не удалось загрузить файл ' . $this->filename);
        }
    }

    /**
     * @return array
     */
    function getOffersIds(): array
    {
        $items = [];
        foreach ($this->xml->shop->offers->offer as $item) {
            $items[] = $this->xml_attribute($item, "id");
        }
        return $items;
    }


    /**
     * @return string
     */
    function xml_attribute($object, $attribute): string
    {
        if (isset($object[$attribute]))
            return (string)$object[$attribute];
    }

}