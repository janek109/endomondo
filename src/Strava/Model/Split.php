<?php
/**
 * Split
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Strava API v3
 *
 * The [Swagger Playground](https://developers.strava.com/playground) is the easiest way to familiarize yourself with the Strava API by submitting HTTP requests and observing the responses before you write any client code. It will show what a response will look like with different endpoints depending on the authorization scope you receive from your athletes. To use the Playground, go to https://www.strava.com/settings/api and change your “Authorization Callback Domain” to developers.strava.com. Please note, we only support Swagger 2.0. There is a known issue where you can only select one scope at a time. For more information, please check the section “client code” at https://developers.strava.com/docs.
 *
 * OpenAPI spec version: 3.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.16
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Strava\Model;

use \ArrayAccess;
use \Swagger\Client\Strava\ObjectSerializer;

/**
 * Split Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Split implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Split';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'average_speed' => 'float',
        'distance' => 'float',
        'elapsed_time' => 'int',
        'elevation_difference' => 'float',
        'pace_zone' => 'int',
        'moving_time' => 'int',
        'split' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'average_speed' => 'float',
        'distance' => 'float',
        'elapsed_time' => null,
        'elevation_difference' => 'float',
        'pace_zone' => null,
        'moving_time' => null,
        'split' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'average_speed' => 'average_speed',
        'distance' => 'distance',
        'elapsed_time' => 'elapsed_time',
        'elevation_difference' => 'elevation_difference',
        'pace_zone' => 'pace_zone',
        'moving_time' => 'moving_time',
        'split' => 'split'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'average_speed' => 'setAverageSpeed',
        'distance' => 'setDistance',
        'elapsed_time' => 'setElapsedTime',
        'elevation_difference' => 'setElevationDifference',
        'pace_zone' => 'setPaceZone',
        'moving_time' => 'setMovingTime',
        'split' => 'setSplit'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'average_speed' => 'getAverageSpeed',
        'distance' => 'getDistance',
        'elapsed_time' => 'getElapsedTime',
        'elevation_difference' => 'getElevationDifference',
        'pace_zone' => 'getPaceZone',
        'moving_time' => 'getMovingTime',
        'split' => 'getSplit'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['average_speed'] = isset($data['average_speed']) ? $data['average_speed'] : null;
        $this->container['distance'] = isset($data['distance']) ? $data['distance'] : null;
        $this->container['elapsed_time'] = isset($data['elapsed_time']) ? $data['elapsed_time'] : null;
        $this->container['elevation_difference'] = isset($data['elevation_difference']) ? $data['elevation_difference'] : null;
        $this->container['pace_zone'] = isset($data['pace_zone']) ? $data['pace_zone'] : null;
        $this->container['moving_time'] = isset($data['moving_time']) ? $data['moving_time'] : null;
        $this->container['split'] = isset($data['split']) ? $data['split'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets average_speed
     *
     * @return float
     */
    public function getAverageSpeed()
    {
        return $this->container['average_speed'];
    }

    /**
     * Sets average_speed
     *
     * @param float $average_speed The average speed of this split, in meters per second
     *
     * @return $this
     */
    public function setAverageSpeed($average_speed)
    {
        $this->container['average_speed'] = $average_speed;

        return $this;
    }

    /**
     * Gets distance
     *
     * @return float
     */
    public function getDistance()
    {
        return $this->container['distance'];
    }

    /**
     * Sets distance
     *
     * @param float $distance The distance of this split, in meters
     *
     * @return $this
     */
    public function setDistance($distance)
    {
        $this->container['distance'] = $distance;

        return $this;
    }

    /**
     * Gets elapsed_time
     *
     * @return int
     */
    public function getElapsedTime()
    {
        return $this->container['elapsed_time'];
    }

    /**
     * Sets elapsed_time
     *
     * @param int $elapsed_time The elapsed time of this split, in seconds
     *
     * @return $this
     */
    public function setElapsedTime($elapsed_time)
    {
        $this->container['elapsed_time'] = $elapsed_time;

        return $this;
    }

    /**
     * Gets elevation_difference
     *
     * @return float
     */
    public function getElevationDifference()
    {
        return $this->container['elevation_difference'];
    }

    /**
     * Sets elevation_difference
     *
     * @param float $elevation_difference The elevation difference of this split, in meters
     *
     * @return $this
     */
    public function setElevationDifference($elevation_difference)
    {
        $this->container['elevation_difference'] = $elevation_difference;

        return $this;
    }

    /**
     * Gets pace_zone
     *
     * @return int
     */
    public function getPaceZone()
    {
        return $this->container['pace_zone'];
    }

    /**
     * Sets pace_zone
     *
     * @param int $pace_zone The pacing zone of this split
     *
     * @return $this
     */
    public function setPaceZone($pace_zone)
    {
        $this->container['pace_zone'] = $pace_zone;

        return $this;
    }

    /**
     * Gets moving_time
     *
     * @return int
     */
    public function getMovingTime()
    {
        return $this->container['moving_time'];
    }

    /**
     * Sets moving_time
     *
     * @param int $moving_time The moving time of this split, in seconds
     *
     * @return $this
     */
    public function setMovingTime($moving_time)
    {
        $this->container['moving_time'] = $moving_time;

        return $this;
    }

    /**
     * Gets split
     *
     * @return int
     */
    public function getSplit()
    {
        return $this->container['split'];
    }

    /**
     * Sets split
     *
     * @param int $split N/A
     *
     * @return $this
     */
    public function setSplit($split)
    {
        $this->container['split'] = $split;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


