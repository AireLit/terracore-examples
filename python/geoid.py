import requests

API_KEY = "YOUR_API_KEY"
URL = "https://api.airelit.com/v1/terracore/geoid"

payload = {
    "geoid": "481130201001",
    "fields": ["summary", "race", "education"],
}

headers = {
    "X-API-Key": API_KEY,
    "Content-Type": "application/json",
}

response = requests.post(URL, json=payload, headers=headers, timeout=5)
response.raise_for_status()

print(response.json())
