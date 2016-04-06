<?php
/**
 * Created by IntelliJ IDEA.
 * User: czoeller
 * Date: 06.04.16
 * Time: 15:02
 */

namespace HsBremen\WebApi\Order;

class Order implements \JsonSerializable
{

    private $title;

    /**
     * Order constructor.
     * @param $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return [
            'title' => $this->title,
        ];
    }

    public function setTitle($newTitle)
    {
        $this->title = $newTitle;
    }
}