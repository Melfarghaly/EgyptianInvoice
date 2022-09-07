<?php

/*
 * This file is part of the Kindy\EgyaptianEInvoice Package.
 *
 * (c) Ibrahim Abotaleb <admin@mrkindy.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kindy\EgyaptianEInvoice\Util;

use Kindy\EgyaptianEInvoice\Exceptions\RuntimeException;

final class JsonArray
{
    /**
     * Decode a JSON string into a PHP array.
     *
     * @param string $json
     *
     * @throws RuntimeException
     *
     * @return object
     */
    public static function decode(string $json)
    {
        /** @var scalar|array|null */
        $data = \json_decode($json);

        if (\JSON_ERROR_NONE !== \json_last_error()) {
            throw new RuntimeException(\sprintf('json_decode error: %s', \json_last_error_msg()));
        }

        if (null === $data) {
            throw new RuntimeException(\sprintf('json_decode error: Expected JSON of type array, %s given.', \get_debug_type($data)));
        }

        return $data;
    }

    /**
     * Encode a PHP array into a JSON string.
     *
     * @param array $value
     *
     * @throws RuntimeException
     *
     * @return string
     */
    public static function encode(array $value)
    {
        $json = \json_encode($value);

        if (\JSON_ERROR_NONE !== \json_last_error()) {
            throw new RuntimeException(\sprintf('json_encode error: %s', \json_last_error_msg()));
        }

        /** @var string */
        return $json;
    }
}