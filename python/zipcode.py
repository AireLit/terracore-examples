import requests

API_KEY = "YOUR_API_KEY"
URL = "https://api.airelit.com/v1/terracore/zipcode"

payload = {
    "zipcode": "75201",
    "fields": ["summary", "housing", "income"],
}

headers = {
    "X-API-Key": API_KEY,
    "Content-Type": "application/json",
}

response = requests.post(URL, json=payload, headers=headers, timeout=30)
response.raise_for_status()

print(response.json())
