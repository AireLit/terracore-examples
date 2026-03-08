/**
 * TerraCore API Example — Coordinates Lookup
 *
 * Usage:
 * TERRACORE_API_KEY=your_api_key node coordinates.mjs
 *
 * Requires Node.js 18+
 */

const API_KEY = process.env.TERRACORE_API_KEY;

if (!API_KEY) {
  console.error("Error: TERRACORE_API_KEY environment variable not set.");
  process.exit(1);
}

async function main() {
  const payload = {
    lat: 34.4893592609069,
    lon: -118.3203127918381,
    fields: ["summary", "income"]
  };

  const response = await fetch("https://api.airelit.com/v1/terracore/coordinates", {
    method: "POST",
    headers: {
      "X-API-Key": API_KEY,
      "Content-Type": "application/json"
    },
    signal: AbortSignal.timeout(5000),
    body: JSON.stringify(payload)
  });

  const text = await response.text();

  if (!response.ok) {
    console.error(`Request failed: HTTP ${response.status}`);
    console.error(text);
    process.exit(1);
  }

  const data = JSON.parse(text);

  console.log("TerraCore Coordinates Lookup Result:\n");
  console.log(JSON.stringify(data, null, 2));
}

main();
