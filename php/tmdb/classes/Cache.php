<?php
if (!class_exists('Cache')) {
    class Cache {
        private $cacheDir;
        private $ttl;

        public function __construct($ttl = 3600) {
            $this->cacheDir = __DIR__ . '/../cache';
            $this->ttl = $ttl;
            if (!is_dir($this->cacheDir)) {
                mkdir($this->cacheDir, 0777, true);
            }
        }

        public function get($key) {
            $filename = $this->getCacheFilename($key);
            if ($this->isValid($filename)) {
                return json_decode(file_get_contents($filename), true);
            }
            return null;
        }

        public function set($key, $data) {
            $filename = $this->getCacheFilename($key);
            file_put_contents($filename, json_encode($data));
        }

        private function getCacheFilename($key) {
            return $this->cacheDir . '/' . md5($key) . '.json';
        }

        private function isValid($filename) {
            return file_exists($filename) && (time() - filemtime($filename) < $this->ttl);
        }
    }
}