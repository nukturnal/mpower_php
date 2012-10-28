<?php
if (!extension_loaded("openssl")) {
  exit("Openssl Extension Not Loaded! Openssl PHP Extension is required by MPower PHP API Client to function properly.");
}

if (!extension_loaded("curl")) {
  exit("Curl Extension Not Loaded! Curl PHP Extension is required by MPower PHP API Client to function properly.");
}