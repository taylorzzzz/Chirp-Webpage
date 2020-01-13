<?php
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SquareConnect\Model;

use \ArrayAccess;
/**
 * SourceApplication Class Doc Comment
 *
 * @category Class
 * @package  SquareConnect
 * @author   Square Inc.
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://squareup.com/developers
 */
class SourceApplication implements ArrayAccess
{
    /**
      * Array of property to type mappings. Used for (de)serialization 
      * @var string[]
      */
    static $swaggerTypes = array(
        'product' => 'string',
        'application_id' => 'string',
        'name' => 'string'
    );
  
    /** 
      * Array of attributes where the key is the local name, and the value is the original name
      * @var string[] 
      */
    static $attributeMap = array(
        'product' => 'product',
        'application_id' => 'application_id',
        'name' => 'name'
    );
  
    /**
      * Array of attributes to setter functions (for deserialization of responses)
      * @var string[]
      */
    static $setters = array(
        'product' => 'setProduct',
        'application_id' => 'setApplicationId',
        'name' => 'setName'
    );
  
    /**
      * Array of attributes to getter functions (for serialization of requests)
      * @var string[]
      */
    static $getters = array(
        'product' => 'getProduct',
        'application_id' => 'getApplicationId',
        'name' => 'getName'
    );
  
    /**
      * $product Read-only [Product](#type-product) type for the application. See [Product](#type-product) for possible values
      * @var string
      */
    protected $product;
    /**
      * $application_id Read-only Square ID assigned to the application. Only used for [Product](#type-product) type `EXTERNAL_API`.
      * @var string
      */
    protected $application_id;
    /**
      * $name Read-only display name assigned to the application (e.g. `\"Custom Application\"`, `\"Square POS 4.74 for Android\"`).
      * @var string
      */
    protected $name;

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initializing the model
     */
    public function __construct(array $data = null)
    {
        if ($data != null) {
            if (isset($data["product"])) {
              $this->product = $data["product"];
            } else {
              $this->product = null;
            }
            if (isset($data["application_id"])) {
              $this->application_id = $data["application_id"];
            } else {
              $this->application_id = null;
            }
            if (isset($data["name"])) {
              $this->name = $data["name"];
            } else {
              $this->name = null;
            }
        }
    }
    /**
     * Gets product
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }
  
    /**
     * Sets product
     * @param string $product Read-only [Product](#type-product) type for the application. See [Product](#type-product) for possible values
     * @return $this
     */
    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }
    /**
     * Gets application_id
     * @return string
     */
    public function getApplicationId()
    {
        return $this->application_id;
    }
  
    /**
     * Sets application_id
     * @param string $application_id Read-only Square ID assigned to the application. Only used for [Product](#type-product) type `EXTERNAL_API`.
     * @return $this
     */
    public function setApplicationId($application_id)
    {
        $this->application_id = $application_id;
        return $this;
    }
    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
  
    /**
     * Sets name
     * @param string $name Read-only display name assigned to the application (e.g. `\"Custom Application\"`, `\"Square POS 4.74 for Android\"`).
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset 
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->$offset);
    }
  
    /**
     * Gets offset.
     * @param  integer $offset Offset 
     * @return mixed 
     */
    public function offsetGet($offset)
    {
        return $this->$offset;
    }
  
    /**
     * Sets value based on offset.
     * @param  integer $offset Offset 
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }
  
    /**
     * Unsets offset.
     * @param  integer $offset Offset 
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->$offset);
    }
  
    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        } else {
            return json_encode(\SquareConnect\ObjectSerializer::sanitizeForSerialization($this));
        }
    }
}
