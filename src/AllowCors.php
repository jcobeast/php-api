<?php 
namespace PHP_API\PhpApi;

class AllowCors
{
    private const ALLOW_CORS_ORIGIN_KEY = 'Access-Control-Allow-Origin';

    private const ALLOW_CORS_METHOD_KEY = 'Access-Control-Allow-Methods';

    private const ALLOW_CORS_ORIGIN_VALUE = '*';

    private const ALLOW_CORS_METHOD_VALUE = 'GET, POST, PUT, DELETE, PATCH, OPTIONS';

    /**
     * Initialize the Cross-Origin Resource Sharing (CORS) headers.
     */

    public function init(): void
    {
        $this->set(self::ALLOW_CORS_ORIGIN_KEY, self::ALLOW_CORS_ORIGIN_VALUE);
        $this->set(self::ALLOW_CORS_METHOD_KEY, self::ALLOW_CORS_METHOD_VALUE);
    }

    public function set(string $key, string $value): void
    {
        header(header: $key . ':' . $value);
    }
}

?>