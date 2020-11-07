<?php
/**
 * StreamSet
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
 * StreamSet Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class StreamSet implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'StreamSet';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'time' => '\Swagger\Client\Strava\Model\TimeStream',
        'distance' => '\Swagger\Client\Strava\Model\DistanceStream',
        'latlng' => '\Swagger\Client\Strava\Model\LatLngStream',
        'altitude' => '\Swagger\Client\Strava\Model\AltitudeStream',
        'velocity_smooth' => '\Swagger\Client\Strava\Model\SmoothVelocityStream',
        'heartrate' => '\Swagger\Client\Strava\Model\HeartrateStream',
        'cadence' => '\Swagger\Client\Strava\Model\CadenceStream',
        'watts' => '\Swagger\Client\Strava\Model\PowerStream',
        'temp' => '\Swagger\Client\Strava\Model\TemperatureStream',
        'moving' => '\Swagger\Client\Strava\Model\MovingStream',
        'grade_smooth' => '\Swagger\Client\Strava\Model\SmoothGradeStream'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'time' => null,
        'distance' => null,
        'latlng' => null,
        'altitude' => null,
        'velocity_smooth' => null,
        'heartrate' => null,
        'cadence' => null,
        'watts' => null,
        'temp' => null,
        'moving' => null,
        'grade_smooth' => null
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
        'time' => 'time',
        'distance' => 'distance',
        'latlng' => 'latlng',
        'altitude' => 'altitude',
        'velocity_smooth' => 'velocity_smooth',
        'heartrate' => 'heartrate',
        'cadence' => 'cadence',
        'watts' => 'watts',
        'temp' => 'temp',
        'moving' => 'moving',
        'grade_smooth' => 'grade_smooth'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'time' => 'setTime',
        'distance' => 'setDistance',
        'latlng' => 'setLatlng',
        'altitude' => 'setAltitude',
        'velocity_smooth' => 'setVelocitySmooth',
        'heartrate' => 'setHeartrate',
        'cadence' => 'setCadence',
        'watts' => 'setWatts',
        'temp' => 'setTemp',
        'moving' => 'setMoving',
        'grade_smooth' => 'setGradeSmooth'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'time' => 'getTime',
        'distance' => 'getDistance',
        'latlng' => 'getLatlng',
        'altitude' => 'getAltitude',
        'velocity_smooth' => 'getVelocitySmooth',
        'heartrate' => 'getHeartrate',
        'cadence' => 'getCadence',
        'watts' => 'getWatts',
        'temp' => 'getTemp',
        'moving' => 'getMoving',
        'grade_smooth' => 'getGradeSmooth'
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
        $this->container['time'] = isset($data['time']) ? $data['time'] : null;
        $this->container['distance'] = isset($data['distance']) ? $data['distance'] : null;
        $this->container['latlng'] = isset($data['latlng']) ? $data['latlng'] : null;
        $this->container['altitude'] = isset($data['altitude']) ? $data['altitude'] : null;
        $this->container['velocity_smooth'] = isset($data['velocity_smooth']) ? $data['velocity_smooth'] : null;
        $this->container['heartrate'] = isset($data['heartrate']) ? $data['heartrate'] : null;
        $this->container['cadence'] = isset($data['cadence']) ? $data['cadence'] : null;
        $this->container['watts'] = isset($data['watts']) ? $data['watts'] : null;
        $this->container['temp'] = isset($data['temp']) ? $data['temp'] : null;
        $this->container['moving'] = isset($data['moving']) ? $data['moving'] : null;
        $this->container['grade_smooth'] = isset($data['grade_smooth']) ? $data['grade_smooth'] : null;
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
     * Gets time
     *
     * @return \Swagger\Client\Strava\Model\TimeStream
     */
    public function getTime()
    {
        return $this->container['time'];
    }

    /**
     * Sets time
     *
     * @param \Swagger\Client\Strava\Model\TimeStream $time time
     *
     * @return $this
     */
    public function setTime($time)
    {
        $this->container['time'] = $time;

        return $this;
    }

    /**
     * Gets distance
     *
     * @return \Swagger\Client\Strava\Model\DistanceStream
     */
    public function getDistance()
    {
        return $this->container['distance'];
    }

    /**
     * Sets distance
     *
     * @param \Swagger\Client\Strava\Model\DistanceStream $distance distance
     *
     * @return $this
     */
    public function setDistance($distance)
    {
        $this->container['distance'] = $distance;

        return $this;
    }

    /**
     * Gets latlng
     *
     * @return \Swagger\Client\Strava\Model\LatLngStream
     */
    public function getLatlng()
    {
        return $this->container['latlng'];
    }

    /**
     * Sets latlng
     *
     * @param \Swagger\Client\Strava\Model\LatLngStream $latlng latlng
     *
     * @return $this
     */
    public function setLatlng($latlng)
    {
        $this->container['latlng'] = $latlng;

        return $this;
    }

    /**
     * Gets altitude
     *
     * @return \Swagger\Client\Strava\Model\AltitudeStream
     */
    public function getAltitude()
    {
        return $this->container['altitude'];
    }

    /**
     * Sets altitude
     *
     * @param \Swagger\Client\Strava\Model\AltitudeStream $altitude altitude
     *
     * @return $this
     */
    public function setAltitude($altitude)
    {
        $this->container['altitude'] = $altitude;

        return $this;
    }

    /**
     * Gets velocity_smooth
     *
     * @return \Swagger\Client\Strava\Model\SmoothVelocityStream
     */
    public function getVelocitySmooth()
    {
        return $this->container['velocity_smooth'];
    }

    /**
     * Sets velocity_smooth
     *
     * @param \Swagger\Client\Strava\Model\SmoothVelocityStream $velocity_smooth velocity_smooth
     *
     * @return $this
     */
    public function setVelocitySmooth($velocity_smooth)
    {
        $this->container['velocity_smooth'] = $velocity_smooth;

        return $this;
    }

    /**
     * Gets heartrate
     *
     * @return \Swagger\Client\Strava\Model\HeartrateStream
     */
    public function getHeartrate()
    {
        return $this->container['heartrate'];
    }

    /**
     * Sets heartrate
     *
     * @param \Swagger\Client\Strava\Model\HeartrateStream $heartrate heartrate
     *
     * @return $this
     */
    public function setHeartrate($heartrate)
    {
        $this->container['heartrate'] = $heartrate;

        return $this;
    }

    /**
     * Gets cadence
     *
     * @return \Swagger\Client\Strava\Model\CadenceStream
     */
    public function getCadence()
    {
        return $this->container['cadence'];
    }

    /**
     * Sets cadence
     *
     * @param \Swagger\Client\Strava\Model\CadenceStream $cadence cadence
     *
     * @return $this
     */
    public function setCadence($cadence)
    {
        $this->container['cadence'] = $cadence;

        return $this;
    }

    /**
     * Gets watts
     *
     * @return \Swagger\Client\Strava\Model\PowerStream
     */
    public function getWatts()
    {
        return $this->container['watts'];
    }

    /**
     * Sets watts
     *
     * @param \Swagger\Client\Strava\Model\PowerStream $watts watts
     *
     * @return $this
     */
    public function setWatts($watts)
    {
        $this->container['watts'] = $watts;

        return $this;
    }

    /**
     * Gets temp
     *
     * @return \Swagger\Client\Strava\Model\TemperatureStream
     */
    public function getTemp()
    {
        return $this->container['temp'];
    }

    /**
     * Sets temp
     *
     * @param \Swagger\Client\Strava\Model\TemperatureStream $temp temp
     *
     * @return $this
     */
    public function setTemp($temp)
    {
        $this->container['temp'] = $temp;

        return $this;
    }

    /**
     * Gets moving
     *
     * @return \Swagger\Client\Strava\Model\MovingStream
     */
    public function getMoving()
    {
        return $this->container['moving'];
    }

    /**
     * Sets moving
     *
     * @param \Swagger\Client\Strava\Model\MovingStream $moving moving
     *
     * @return $this
     */
    public function setMoving($moving)
    {
        $this->container['moving'] = $moving;

        return $this;
    }

    /**
     * Gets grade_smooth
     *
     * @return \Swagger\Client\Strava\Model\SmoothGradeStream
     */
    public function getGradeSmooth()
    {
        return $this->container['grade_smooth'];
    }

    /**
     * Sets grade_smooth
     *
     * @param \Swagger\Client\Strava\Model\SmoothGradeStream $grade_smooth grade_smooth
     *
     * @return $this
     */
    public function setGradeSmooth($grade_smooth)
    {
        $this->container['grade_smooth'] = $grade_smooth;

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

