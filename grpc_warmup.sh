#!/bin/bash
# /usr/bin/php -q /var/www/html/ee/grpc_warmup.php
# /usr/bin/echo "yes this works" >> /tmp/didIwarmUp.txt
NUM_THREADS=3
i=0
while [ $i -lt $NUM_THREADS ]; do
  curl http://localhost/ee3/grpc_warmup.php
  i=$((i+1))
done

