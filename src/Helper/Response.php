<?php

declare(strict_types=1);

namespace Kan\Hive\Helper;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Jedkirby\Json;
use Kan\Hive\Exception\RuntimeException;

class Response
{
    /**
     * Parse the respose from Guzzle, ensuring it's valid.
     *
     * @throws RuntimeException
     *
     * @return mixed
     */
    public static function getData(
        GuzzleResponse $response
    ) {
        $json = new Json(
            (string) $response->getBody()
        );

        if (false === $json->isValid()) {
            throw new RuntimeException(sprintf('Parsing failed with error "%s"', $json->getErrorMessage()));
        }

        return $json->getResponse();
    }
}
