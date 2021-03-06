<?php

namespace randomhost\Alexa\Request;

use InvalidArgumentException;

/**
 * JSON data parser.
 */
class DataParser
{
    /**
     * Parses the given JSON data and returns an array.
     *
     * @param string $rawData JSON string.
     *
     * @return array
     */
    public function parseRawData($rawData)
    {
        if (!is_string($rawData)) {
            throw new InvalidArgumentException(
                'Given data is not a valid JSON string'
            );
        }

        $data = json_decode($rawData, true);
        if (is_null($data)) {
            throw new InvalidArgumentException(
                'Could not decode JSON data'
            );
        };

        return $data;
    }

    /**
     * Returns the request ID provided with the request.
     *
     * @param array $data JSON data.
     *
     * @return string
     *
     * @throws InvalidArgumentException
     */
    public function fetchRequestId(array $data)
    {
        if (!isset($data['request']['requestId'])) {
            throw new InvalidArgumentException(
                'Request does not contain field "requestId"'
            );
        }

        return $data['request']['requestId'];
    }

    /**
     * Returns the request type provided with the request.
     *
     * @param array $data JSON data.
     *
     * @return string
     *
     * @throws InvalidArgumentException
     */
    public function fetchRequestType(array $data)
    {
        if (!isset($data['request']['type'])) {
            throw new InvalidArgumentException(
                'Request does not contain field "type"'
            );
        }


        return $data['request']['type'];
    }

    /**
     * Returns the timestamp provided with the request.
     *
     * @param array $data JSON data.
     *
     * @return string
     *
     * @throws InvalidArgumentException
     */
    public function fetchTimestamp(array $data)
    {
        if (!isset($data['request']['timestamp'])) {
            throw new InvalidArgumentException(
                'Request does not contain field "timestamp"'
            );
        }

        return $data['request']['timestamp'];
    }

    /**
     * Returns the session data provided with the request.
     *
     * @param array $data JSON data.
     *
     * @return array
     *
     * @throws InvalidArgumentException
     */
    public function fetchSession(array $data)
    {
        if (!isset($data['session'])) {
            throw new InvalidArgumentException(
                'Request does not contain field "session"'
            );
        }

        return $data['session'];
    }

    /**
     * Returns the application ID provided with the request.
     *
     * @param array $data JSON data.
     *
     * @return string
     *
     * @throws InvalidArgumentException
     */
    public function fetchApplicationId(array $data)
    {
        if (!isset($data['session']['application']['applicationId'])) {
            throw new InvalidArgumentException(
                'Request does not contain field "applicationId"'
            );

        }

        return $data['session']['application']['applicationId'];
    }
}
