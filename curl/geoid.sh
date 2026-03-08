#!/usr/bin/env bash

API_KEY="YOUR_API_KEY"

curl -X POST https://api.airelit.com/v1/terracore/geoid \
  -H "X-API-Key: ${API_KEY}" \
  -H "Content-Type: application/json" \
  -d '{"geoid":"481130201001","fields":["summary","race","education"]}'
