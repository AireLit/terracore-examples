#!/usr/bin/env bash

API_KEY="YOUR_API_KEY"

curl -X POST https://api.airelit.com/v1/terracore/address \
  -H "X-API-Key: ${API_KEY}" \
  -H "Content-Type: application/json" \
  -d '{"address":"10700 Escondido Canyon Rd, Agua Dulce, CA 91390","fields":["summary","income"]}'
