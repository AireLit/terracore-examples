# TerraCore API Examples

Example integrations for the **TerraCore API**, a U.S. neighborhood intelligence platform providing census block group demographics, economic indicators, and location scoring signals.

## Documentation

Full API documentation:

https://airelit.com/docs

Get API access:

https://airelit.com

---

## Example Request

```bash
curl -X POST https://api.airelit.com/v1/terracore/address \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Content-Type: application/json" \
  -d '{"address": "10700 Escondido Canyon Rd, Agua Dulce, CA 91390","fields": ["summary", "income"]}'
