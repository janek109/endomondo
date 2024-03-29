<?php
/**
 * SummarySegment
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
 * SummarySegment Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SummarySegment implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SummarySegment';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
        'name' => 'string',
        'activity_type' => 'string',
        'distance' => 'float',
        'average_grade' => 'float',
        'maximum_grade' => 'float',
        'elevation_high' => 'float',
        'elevation_low' => 'float',
        'start_latlng' => '\Swagger\Client\Strava\Model\LatLng',
        'end_latlng' => '\Swagger\Client\Strava\Model\LatLng',
        'climb_category' => 'int',
        'city' => 'string',
        'state' => 'string',
        'country' => 'string',
        'private' => 'bool',
        'athlete_pr_effort' => '\Swagger\Client\Strava\Model\SummarySegmentEffort',
        'athlete_segment_stats' => '\Swagger\Client\Strava\Model\SummaryPRSegmentEffort'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => 'int64',
        'name' => null,
        'activity_type' => null,
        'distance' => 'float',
        'average_grade' => 'float',
        'maximum_grade' => 'float',
        'elevation_high' => 'float',
        'elevation_low' => 'float',
        'start_latlng' => null,
        'end_latlng' => null,
        'climb_category' => null,
        'city' => null,
        'state' => null,
        'country' => null,
        'private' => null,
        'athlete_pr_effort' => null,
        'athlete_segment_stats' => null
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
        'activity_type' => 'activity_type',
        'distance' => 'distance',
        'average_grade' => 'average_grade',
        'maximum_grade' => 'maximum_grade',
        'elevation_high' => 'elevation_high',
        'elevation_low' => 'elevation_low',
        'start_latlng' => 'start_latlng',
        'end_latlng' => 'end_latlng',
        'climb_category' => 'climb_category',
        'city' => 'city',
        'state' => 'state',
        'country' => 'country',
        'private' => 'private',
        'athlete_pr_effort' => 'athlete_pr_effort',
        'athlete_segment_stats' => 'athlete_segment_stats'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'activity_type' => 'setActivityType',
        'distance' => 'setDistance',
        'average_grade' => 'setAverageGrade',
        'maximum_grade' => 'setMaximumGrade',
        'elevation_high' => 'setElevationHigh',
        'elevation_low' => 'setElevationLow',
        'start_latlng' => 'setStartLatlng',
        'end_latlng' => 'setEndLatlng',
        'climb_category' => 'setClimbCategory',
        'city' => 'setCity',
        'state' => 'setState',
        'country' => 'setCountry',
        'private' => 'setPrivate',
        'athlete_pr_effort' => 'setAthletePrEffort',
        'athlete_segment_stats' => 'setAthleteSegmentStats'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'activity_type' => 'getActivityType',
        'distance' => 'getDistance',
        'average_grade' => 'getAverageGrade',
        'maximum_grade' => 'getMaximumGrade',
        'elevation_high' => 'getElevationHigh',
        'elevation_low' => 'getElevationLow',
        'start_latlng' => 'getStartLatlng',
        'end_latlng' => 'getEndLatlng',
        'climb_category' => 'getClimbCategory',
        'city' => 'getCity',
        'state' => 'getState',
        'country' => 'getCountry',
        'private' => 'getPrivate',
        'athlete_pr_effort' => 'getAthletePrEffort',
        'athlete_segment_stats' => 'getAthleteSegmentStats'
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

    const ACTIVITY_TYPE_RIDE = 'Ride';
    const ACTIVITY_TYPE_RUN = 'Run';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getActivityTypeAllowableValues()
    {
        return [
            self::ACTIVITY_TYPE_RIDE,
            self::ACTIVITY_TYPE_RUN,
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
        $this->container['activity_type'] = isset($data['activity_type']) ? $data['activity_type'] : null;
        $this->container['distance'] = isset($data['distance']) ? $data['distance'] : null;
        $this->container['average_grade'] = isset($data['average_grade']) ? $data['average_grade'] : null;
        $this->container['maximum_grade'] = isset($data['maximum_grade']) ? $data['maximum_grade'] : null;
        $this->container['elevation_high'] = isset($data['elevation_high']) ? $data['elevation_high'] : null;
        $this->container['elevation_low'] = isset($data['elevation_low']) ? $data['elevation_low'] : null;
        $this->container['start_latlng'] = isset($data['start_latlng']) ? $data['start_latlng'] : null;
        $this->container['end_latlng'] = isset($data['end_latlng']) ? $data['end_latlng'] : null;
        $this->container['climb_category'] = isset($data['climb_category']) ? $data['climb_category'] : null;
        $this->container['city'] = isset($data['city']) ? $data['city'] : null;
        $this->container['state'] = isset($data['state']) ? $data['state'] : null;
        $this->container['country'] = isset($data['country']) ? $data['country'] : null;
        $this->container['private'] = isset($data['private']) ? $data['private'] : null;
        $this->container['athlete_pr_effort'] = isset($data['athlete_pr_effort']) ? $data['athlete_pr_effort'] : null;
        $this->container['athlete_segment_stats'] = isset($data['athlete_segment_stats']) ? $data['athlete_segment_stats'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getActivityTypeAllowableValues();
        if (!is_null($this->container['activity_type']) && !in_array($this->container['activity_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'activity_type', must be one of '%s'",
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
     * @param int $id The unique identifier of this segment
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
     * @param string $name The name of this segment
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets activity_type
     *
     * @return string
     */
    public function getActivityType()
    {
        return $this->container['activity_type'];
    }

    /**
     * Sets activity_type
     *
     * @param string $activity_type activity_type
     *
     * @return $this
     */
    public function setActivityType($activity_type)
    {
        $allowedValues = $this->getActivityTypeAllowableValues();
        if (!is_null($activity_type) && !in_array($activity_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'activity_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['activity_type'] = $activity_type;

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
     * @param float $distance The segment's distance, in meters
     *
     * @return $this
     */
    public function setDistance($distance)
    {
        $this->container['distance'] = $distance;

        return $this;
    }

    /**
     * Gets average_grade
     *
     * @return float
     */
    public function getAverageGrade()
    {
        return $this->container['average_grade'];
    }

    /**
     * Sets average_grade
     *
     * @param float $average_grade The segment's average grade, in percents
     *
     * @return $this
     */
    public function setAverageGrade($average_grade)
    {
        $this->container['average_grade'] = $average_grade;

        return $this;
    }

    /**
     * Gets maximum_grade
     *
     * @return float
     */
    public function getMaximumGrade()
    {
        return $this->container['maximum_grade'];
    }

    /**
     * Sets maximum_grade
     *
     * @param float $maximum_grade The segments's maximum grade, in percents
     *
     * @return $this
     */
    public function setMaximumGrade($maximum_grade)
    {
        $this->container['maximum_grade'] = $maximum_grade;

        return $this;
    }

    /**
     * Gets elevation_high
     *
     * @return float
     */
    public function getElevationHigh()
    {
        return $this->container['elevation_high'];
    }

    /**
     * Sets elevation_high
     *
     * @param float $elevation_high The segments's highest elevation, in meters
     *
     * @return $this
     */
    public function setElevationHigh($elevation_high)
    {
        $this->container['elevation_high'] = $elevation_high;

        return $this;
    }

    /**
     * Gets elevation_low
     *
     * @return float
     */
    public function getElevationLow()
    {
        return $this->container['elevation_low'];
    }

    /**
     * Sets elevation_low
     *
     * @param float $elevation_low The segments's lowest elevation, in meters
     *
     * @return $this
     */
    public function setElevationLow($elevation_low)
    {
        $this->container['elevation_low'] = $elevation_low;

        return $this;
    }

    /**
     * Gets start_latlng
     *
     * @return \Swagger\Client\Strava\Model\LatLng
     */
    public function getStartLatlng()
    {
        return $this->container['start_latlng'];
    }

    /**
     * Sets start_latlng
     *
     * @param \Swagger\Client\Strava\Model\LatLng $start_latlng start_latlng
     *
     * @return $this
     */
    public function setStartLatlng($start_latlng)
    {
        $this->container['start_latlng'] = $start_latlng;

        return $this;
    }

    /**
     * Gets end_latlng
     *
     * @return \Swagger\Client\Strava\Model\LatLng
     */
    public function getEndLatlng()
    {
        return $this->container['end_latlng'];
    }

    /**
     * Sets end_latlng
     *
     * @param \Swagger\Client\Strava\Model\LatLng $end_latlng end_latlng
     *
     * @return $this
     */
    public function setEndLatlng($end_latlng)
    {
        $this->container['end_latlng'] = $end_latlng;

        return $this;
    }

    /**
     * Gets climb_category
     *
     * @return int
     */
    public function getClimbCategory()
    {
        return $this->container['climb_category'];
    }

    /**
     * Sets climb_category
     *
     * @param int $climb_category The category of the climb [0, 5]. Higher is harder ie. 5 is Hors catégorie, 0 is uncategorized in climb_category.
     *
     * @return $this
     */
    public function setClimbCategory($climb_category)
    {
        $this->container['climb_category'] = $climb_category;

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
     * @param string $city The segments's city.
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
     * @param string $state The segments's state or geographical region.
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
     * @param string $country The segment's country.
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets private
     *
     * @return bool
     */
    public function getPrivate()
    {
        return $this->container['private'];
    }

    /**
     * Sets private
     *
     * @param bool $private Whether this segment is private.
     *
     * @return $this
     */
    public function setPrivate($private)
    {
        $this->container['private'] = $private;

        return $this;
    }

    /**
     * Gets athlete_pr_effort
     *
     * @return \Swagger\Client\Strava\Model\SummarySegmentEffort
     */
    public function getAthletePrEffort()
    {
        return $this->container['athlete_pr_effort'];
    }

    /**
     * Sets athlete_pr_effort
     *
     * @param \Swagger\Client\Strava\Model\SummarySegmentEffort $athlete_pr_effort athlete_pr_effort
     *
     * @return $this
     */
    public function setAthletePrEffort($athlete_pr_effort)
    {
        $this->container['athlete_pr_effort'] = $athlete_pr_effort;

        return $this;
    }

    /**
     * Gets athlete_segment_stats
     *
     * @return \Swagger\Client\Strava\Model\SummaryPRSegmentEffort
     */
    public function getAthleteSegmentStats()
    {
        return $this->container['athlete_segment_stats'];
    }

    /**
     * Sets athlete_segment_stats
     *
     * @param \Swagger\Client\Strava\Model\SummaryPRSegmentEffort $athlete_segment_stats athlete_segment_stats
     *
     * @return $this
     */
    public function setAthleteSegmentStats($athlete_segment_stats)
    {
        $this->container['athlete_segment_stats'] = $athlete_segment_stats;

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


