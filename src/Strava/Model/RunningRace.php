<?php
/**
 * RunningRace
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
 * RunningRace Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class RunningRace implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'RunningRace';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
        'name' => 'string',
        'running_race_type' => 'int',
        'distance' => 'float',
        'start_date_local' => '\DateTime',
        'city' => 'string',
        'state' => 'string',
        'country' => 'string',
        'route_ids' => 'int[]',
        'measurement_preference' => 'string',
        'url' => 'string',
        'website_url' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => 'int64',
        'name' => null,
        'running_race_type' => null,
        'distance' => 'float',
        'start_date_local' => 'date-time',
        'city' => null,
        'state' => null,
        'country' => null,
        'route_ids' => 'int64',
        'measurement_preference' => null,
        'url' => null,
        'website_url' => null
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
        'id' => 'id',
        'name' => 'name',
        'running_race_type' => 'running_race_type',
        'distance' => 'distance',
        'start_date_local' => 'start_date_local',
        'city' => 'city',
        'state' => 'state',
        'country' => 'country',
        'route_ids' => 'route_ids',
        'measurement_preference' => 'measurement_preference',
        'url' => 'url',
        'website_url' => 'website_url'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'running_race_type' => 'setRunningRaceType',
        'distance' => 'setDistance',
        'start_date_local' => 'setStartDateLocal',
        'city' => 'setCity',
        'state' => 'setState',
        'country' => 'setCountry',
        'route_ids' => 'setRouteIds',
        'measurement_preference' => 'setMeasurementPreference',
        'url' => 'setUrl',
        'website_url' => 'setWebsiteUrl'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'running_race_type' => 'getRunningRaceType',
        'distance' => 'getDistance',
        'start_date_local' => 'getStartDateLocal',
        'city' => 'getCity',
        'state' => 'getState',
        'country' => 'getCountry',
        'route_ids' => 'getRouteIds',
        'measurement_preference' => 'getMeasurementPreference',
        'url' => 'getUrl',
        'website_url' => 'getWebsiteUrl'
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

    const MEASUREMENT_PREFERENCE_FEET = 'feet';
    const MEASUREMENT_PREFERENCE_METERS = 'meters';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMeasurementPreferenceAllowableValues()
    {
        return [
            self::MEASUREMENT_PREFERENCE_FEET,
            self::MEASUREMENT_PREFERENCE_METERS,
        ];
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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['running_race_type'] = isset($data['running_race_type']) ? $data['running_race_type'] : null;
        $this->container['distance'] = isset($data['distance']) ? $data['distance'] : null;
        $this->container['start_date_local'] = isset($data['start_date_local']) ? $data['start_date_local'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['route_ids'] = isset($data['route_ids']) ? $data['route_ids'] : null;
        $this->container['measurement_preference'] = isset($data['measurement_preference']) ? $data['measurement_preference'] : null;
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
        $this->container['website_url'] = isset($data['website_url']) ? $data['website_url'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getMeasurementPreferenceAllowableValues();
        if (!is_null($this->container['measurement_preference']) && !in_array($this->container['measurement_preference'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'measurement_preference', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

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
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id The unique identifier of this race.
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name The name of this race.
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets running_race_type
     *
     * @return int
     */
    public function getRunningRaceType()
    {
        return $this->container['running_race_type'];
    }

    /**
     * Sets running_race_type
     *
     * @param int $running_race_type The type of this race.
     *
     * @return $this
     */
    public function setRunningRaceType($running_race_type)
    {
        $this->container['running_race_type'] = $running_race_type;

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
     * @param float $distance The race's distance, in meters.
     *
     * @return $this
     */
    public function setDistance($distance)
    {
        $this->container['distance'] = $distance;

        return $this;
    }

    /**
     * Gets start_date_local
     *
     * @return \DateTime
     */
    public function getStartDateLocal()
    {
        return $this->container['start_date_local'];
    }

    /**
     * Sets start_date_local
     *
     * @param \DateTime $start_date_local The time at which the race begins started in the local timezone.
     *
     * @return $this
     */
    public function setStartDateLocal($start_date_local)
    {
        $this->container['start_date_local'] = $start_date_local;

        return $this;
    }

    /**
     * Gets city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->container['city'];
    }

    /**
     * Sets city
     *
     * @param string $city The name of the city in which the race is taking place.
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->container['city'] = $city;

        return $this;
    }

    /**
     * Gets state
     *
     * @return string
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param string $state The name of the state or geographical region in which the race is taking place.
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string $country The name of the country in which the race is taking place.
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets route_ids
     *
     * @return int[]
     */
    public function getRouteIds()
    {
        return $this->container['route_ids'];
    }

    /**
     * Sets route_ids
     *
     * @param int[] $route_ids The set of routes that cover this race's course.
     *
     * @return $this
     */
    public function setRouteIds($route_ids)
    {
        $this->container['route_ids'] = $route_ids;

        return $this;
    }

    /**
     * Gets measurement_preference
     *
     * @return string
     */
    public function getMeasurementPreference()
    {
        return $this->container['measurement_preference'];
    }

    /**
     * Sets measurement_preference
     *
     * @param string $measurement_preference The unit system in which the race should be displayed.
     *
     * @return $this
     */
    public function setMeasurementPreference($measurement_preference)
    {
        $allowedValues = $this->getMeasurementPreferenceAllowableValues();
        if (!is_null($measurement_preference) && !in_array($measurement_preference, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'measurement_preference', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['measurement_preference'] = $measurement_preference;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url The vanity URL of this race on Strava.
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets website_url
     *
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->container['website_url'];
    }

    /**
     * Sets website_url
     *
     * @param string $website_url The URL of this race's website.
     *
     * @return $this
     */
    public function setWebsiteUrl($website_url)
    {
        $this->container['website_url'] = $website_url;

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


