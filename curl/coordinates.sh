#!/usr/bin/env bash

API_KEY="YOUR_API_KEY"

curl -X POST https://api.airelit.com/v1/terracore/coordinates \
  -H "X-API-Key: ${API_KEY}" \
  -H "Content-Type: application/json" \
  -d '{"lat":32.7767,"lon":-96.7970,"fields":["summary","income"]}'
