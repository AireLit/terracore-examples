#!/usr/bin/env bash

API_KEY="YOUR_API_KEY"

curl -X POST https://api.airelit.com/v1/terracore/zipcode \
  -H "X-API-Key: ${API_KEY}" \
  -H "Content-Type: application/json" \
  -d '{"zipcode":"75201","fields":["summary","housing","income"]}'
