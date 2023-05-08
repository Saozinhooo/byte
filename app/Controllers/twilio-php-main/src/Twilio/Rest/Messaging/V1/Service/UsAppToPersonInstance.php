<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Messaging\V1\Service;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $accountSid
 * @property string $brandRegistrationSid
 * @property string $messagingServiceSid
 * @property string $description
 * @property string[] $messageSamples
 * @property string $usAppToPersonUsecase
 * @property bool $hasEmbeddedLinks
 * @property bool $hasEmbeddedPhone
 * @property string $status
 * @property string $campaignId
 * @property bool $isExternallyRegistered
 * @property array $rateLimits
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class UsAppToPersonInstance extends InstanceResource {
    /**
     * Initialize the UsAppToPersonInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $messagingServiceSid The SID of the Messaging Service the
     *                                    resource is associated with
     */
    public function __construct(Version $version, array $payload, string $messagingServiceSid) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'brandRegistrationSid' => Values::array_get($payload, 'brand_registration_sid'),
            'messagingServiceSid' => Values::array_get($payload, 'messaging_service_sid'),
            'description' => Values::array_get($payload, 'description'),
            'messageSamples' => Values::array_get($payload, 'message_samples'),
            'usAppToPersonUsecase' => Values::array_get($payload, 'us_app_to_person_usecase'),
            'hasEmbeddedLinks' => Values::array_get($payload, 'has_embedded_links'),
            'hasEmbeddedPhone' => Values::array_get($payload, 'has_embedded_phone'),
            'status' => Values::array_get($payload, 'status'),
            'campaignId' => Values::array_get($payload, 'campaign_id'),
            'isExternallyRegistered' => Values::array_get($payload, 'is_externally_registered'),
            'rateLimits' => Values::array_get($payload, 'rate_limits'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
        ];

        $this->solution = ['messagingServiceSid' => $messagingServiceSid, ];
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Messaging.V1.UsAppToPersonInstance]';
    }
}