"""
TerraCore API Example — Coordinates Lookup

Usage:
TERRACORE_API_KEY=your_api_key python coordinates.py
"""

import os
import sys
import json
import requests

API_KEY = os.getenv("TERRACORE_API_KEY")

if not API_KEY:
    print("Error: TERRACORE_API_KEY environment variable not set.", file=sys.stderr)
    sys.exit(1)

url = "https://api.airelit.com/v1/terracore/coordinates"

payload = {
    "lat": 34.4893592609069,
    "lon": -118.3203127918381,
    "fields": ["summary", "income"]
}

headers = {
    "X-API-Key": API_KEY,
    "Content-Type": "application/json"
}

response = requests.post(url, json=payload, headers=headers, timeout=5)

if not response.ok:
    print(f"Request failed: HTTP {response.status_code}", file=sys.stderr)
    print(response.text, file=sys.stderr)
    sys.exit(1)

print(json.dumps(response.json(), indent=2))
