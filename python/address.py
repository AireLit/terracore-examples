"""
TerraCore API Example — Address Lookup

Usage:
TERRACORE_API_KEY=your_api_key python address.py

Requires:
pip install requests
"""

import os
import sys
import json
import requests

API_KEY = os.getenv("TERRACORE_API_KEY")

if not API_KEY:
    print("Error: TERRACORE_API_KEY environment variable not set.", file=sys.stderr)
    print("Example:", file=sys.stderr)
    print("TERRACORE_API_KEY=your_key python address.py", file=sys.stderr)
    sys.exit(1)

url = "https://api.airelit.com/v1/terracore/address"

payload = {
    "address": "10700 Escondido Canyon Rd, Agua Dulce, CA 91390",
    "fields": ["summary", "income"]
}

headers = {
    "X-API-Key": API_KEY,
    "Content-Type": "application/json"
}

try:
    response = requests.post(url, json=payload, headers=headers, timeout=5)
except requests.exceptions.Timeout:
    print("Request timed out.", file=sys.stderr)
    sys.exit(1)

if not response.ok:
    print(f"Request failed: HTTP {response.status_code}", file=sys.stderr)
    print(response.text, file=sys.stderr)
    sys.exit(1)

data = response.json()

print("TerraCore Address Lookup Result:\n")
print(json.dumps(data, indent=2))
