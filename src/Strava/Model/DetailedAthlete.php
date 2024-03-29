<?php
/**
 * DetailedAthlete
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
use \Swagger\Client\Strava\ObjectSerializer;

/**
 * DetailedAthlete Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DetailedAthlete extends SummaryAthlete 
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'DetailedAthlete';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'follower_count' => 'int',
        'friend_count' => 'int',
        'measurement_preference' => 'string',
        'ftp' => 'int',
        'weight' => 'float',
        'clubs' => '\Swagger\Client\Strava\Model\SummaryClub[]',
        'bikes' => '\Swagger\Client\Strava\Model\SummaryGear[]',
        'shoes' => '\Swagger\Client\Strava\Model\SummaryGear[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'follower_count' => null,
        'friend_count' => null,
        'measurement_preference' => null,
        'ftp' => null,
        'weight' => 'float',
        'clubs' => null,
        'bikes' => null,
        'shoes' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes + parent::swaggerTypes();
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats + parent::swaggerFormats();
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'follower_count' => 'follower_count',
        'friend_count' => 'friend_count',
        'measurement_preference' => 'measurement_preference',
        'ftp' => 'ftp',
        'weight' => 'weight',
        'clubs' => 'clubs',
        'bikes' => 'bikes',
        'shoes' => 'shoes'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'follower_count' => 'setFollowerCount',
        'friend_count' => 'setFriendCount',
        'measurement_preference' => 'setMeasurementPreference',
        'ftp' => 'setFtp',
        'weight' => 'setWeight',
        'clubs' => 'setClubs',
        'bikes' => 'setBikes',
        'shoes' => 'setShoes'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'follower_count' => 'getFollowerCount',
        'friend_count' => 'getFriendCount',
        'measurement_preference' => 'getMeasurementPreference',
        'ftp' => 'getFtp',
        'weight' => 'getWeight',
        'clubs' => 'getClubs',
        'bikes' => 'getBikes',
        'shoes' => 'getShoes'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return parent::attributeMap() + self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return parent::setters() + self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return parent::getters() + self::$getters;
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
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        parent::__construct($data);

        $this->container['follower_count'] = isset($data['follower_count']) ? $data['follower_count'] : null;
        $this->container['friend_count'] = isset($data['friend_count']) ? $data['friend_count'] : null;
        $this->container['measurement_preference'] = isset($data['measurement_preference']) ? $data['measurement_preference'] : null;
        $this->container['ftp'] = isset($data['ftp']) ? $data['ftp'] : null;
        $this->container['weight'] = isset($data['weight']) ? $data['weight'] : null;
        $this->container['clubs'] = isset($data['clubs']) ? $data['clubs'] : null;
        $this->container['bikes'] = isset($data['bikes']) ? $data['bikes'] : null;
        $this->container['shoes'] = isset($data['shoes']) ? $data['shoes'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = parent::listInvalidProperties();

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
     * Gets follower_count
     *
     * @return int
     */
    public function getFollowerCount()
    {
        return $this->container['follower_count'];
    }

    /**
     * Sets follower_count
     *
     * @param int $follower_count The athlete's follower count.
     *
     * @return $this
     */
    public function setFollowerCount($follower_count)
    {
        $this->container['follower_count'] = $follower_count;

        return $this;
    }

    /**
     * Gets friend_count
     *
     * @return int
     */
    public function getFriendCount()
    {
        return $this->container['friend_count'];
    }

    /**
     * Sets friend_count
     *
     * @param int $friend_count The athlete's friend count.
     *
     * @return $this
     */
    public function setFriendCount($friend_count)
    {
        $this->container['friend_count'] = $friend_count;

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
     * @param string $measurement_preference The athlete's preferred unit system.
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
     * Gets ftp
     *
     * @return int
     */
    public function getFtp()
    {
        return $this->container['ftp'];
    }

    /**
     * Sets ftp
     *
     * @param int $ftp The athlete's FTP (Functional Threshold Power).
     *
     * @return $this
     */
    public function setFtp($ftp)
    {
        $this->container['ftp'] = $ftp;

        return $this;
    }

    /**
     * Gets weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->container['weight'];
    }

    /**
     * Sets weight
     *
     * @param float $weight The athlete's weight.
     *
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->container['weight'] = $weight;

        return $this;
    }

    /**
     * Gets clubs
     *
     * @return \Swagger\Client\Strava\Model\SummaryClub[]
     */
    public function getClubs()
    {
        return $this->container['clubs'];
    }

    /**
     * Sets clubs
     *
     * @param \Swagger\Client\Strava\Model\SummaryClub[] $clubs The athlete's clubs.
     *
     * @return $this
     */
    public function setClubs($clubs)
    {
        $this->container['clubs'] = $clubs;

        return $this;
    }

    /**
     * Gets bikes
     *
     * @return \Swagger\Client\Strava\Model\SummaryGear[]
     */
    public function getBikes()
    {
        return $this->container['bikes'];
    }

    /**
     * Sets bikes
     *
     * @param \Swagger\Client\Strava\Model\SummaryGear[] $bikes The athlete's bikes.
     *
     * @return $this
     */
    public function setBikes($bikes)
    {
        $this->container['bikes'] = $bikes;

        return $this;
    }

    /**
     * Gets shoes
     *
     * @return \Swagger\Client\Strava\Model\SummaryGear[]
     */
    public function getShoes()
    {
        return $this->container['shoes'];
    }

    /**
     * Sets shoes
     *
     * @param \Swagger\Client\Strava\Model\SummaryGear[] $shoes The athlete's shoes.
     *
     * @return $this
     */
    public function setShoes($shoes)
    {
        $this->container['shoes'] = $shoes;

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


