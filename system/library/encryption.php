<?php
final class Encryption {
    private $key;
    private $cipher;

    public function __construct($key) {
        $this->key = hash('sha256', $key, true);
        $this->cipher = 'AES-256-ECB'; // Corresponds to MCRYPT_RIJNDAEL_256
    }

    public function encrypt($value) {
        $encrypted = openssl_encrypt($value, $this->cipher, $this->key, OPENSSL_RAW_DATA);
        return $this->urlsafeB64Encode($encrypted);
    }

    public function decrypt($value) {
        $decoded = $this->urlsafeB64Decode($value);
        return trim(openssl_decrypt($decoded, $this->cipher, $this->key, OPENSSL_RAW_DATA));
    }

    private function urlsafeB64Encode($data) {
        return strtr(base64_encode($data), '+/=', '-_,');
    }

    private function urlsafeB64Decode($data) {
        return base64_decode(strtr($data, '-_,', '+/='));
    }
}