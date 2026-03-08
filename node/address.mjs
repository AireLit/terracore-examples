/**
 * TerraCore API Example — Address Lookup
 *
 * Usage:
 * TERRACORE_API_KEY=your_api_key node address.mjs
 *
 * Requires Node.js 18+
 */

const API_KEY = process.env.TERRACORE_API_KEY;

if (!API_KEY) {
  console.error("Error: TERRACORE_API_KEY environment variable not set.");
  console.error("Example:");
  console.error("TERRACORE_API_KEY=your_key node address.mjs");
  process.exit(1);
}

async function main() {
  const payload = {
    address: "10700 Escondido Canyon Rd, Agua Dulce, CA 91390",
    fields: ["summary", "income"]
  };

  const response = await fetch("https://api.airelit.com/v1/terracore/address", {
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

  console.log("TerraCore Address Lookup Result:\n");
  console.log(JSON.stringify(data, null, 2));
}

main();
