# TerraCore API Examples

Official examples for the **TerraCore API**, AireLit’s U.S. neighborhood intelligence API.

TerraCore enriches a U.S. **address**, **ZIP code**, **coordinates**, or **12-digit Census block group GEOID** with structured demographic, economic, and location intelligence data at census block group resolution. ZIP lookups return population-weighted aggregate results across contributing block groups.

## Endpoints

- By Coordinates → `/v1/terracore/coordinates`
- By ZIP Code → `/v1/terracore/zipcode`
- By GEOID → `/v1/terracore/geoid`
- By Address → `/v1/terracore/address`

All endpoints use **POST** requests with JSON bodies.

## Authentication

All requests require an API key header:

```text
X-API-Key: YOUR_API_KEY
Content-Type: application/json
```

## Example Request

```bash
curl -X POST https://api.airelit.com/v1/terracore/address \
  -H "X-API-Key: YOUR_API_KEY" \
  -H "Content-Type: application/json" \
  -d '{"address":"10700 Escondido Canyon Rd, Agua Dulce, CA 91390","fields":["summary","income"]}'
```

## Example Response

```json
{
  "meta": {
    "geoid": "060379108141",
    "state_abbr": "CA",
    "state_name": "California",
    "county_name": "Los Angeles County",
    "dataset_version": "2026.03",
    "query_type": "address"
  },
  "data": {
    "total_population": 1846,
    "median_household_income": 129107,
    "median_age": 53.2
  }
}
```

> **Note:** The above response is a simplified example. In reality, requesting both the `summary` and `income` field groups will return a much larger set of fields (typically 30+ fields). The API supports over 200 fields across all available field groups.

## Field Groups

Requests may optionally include:

```json
"fields": ["summary", "income"]
```

If omitted, TerraCore returns:

```json
["summary"]
```

Examples of field groups include:

- summary
- demographics
- race
- income
- education
- employment
- housing
- commute
- internet
- insurance
- raw_counts
- indices
- walkability
- grocery_access
- healthcare_access
- transit_access
- retail
- school_access
- recreation
- community_access
- enrichment_meta

ZIP-only groups include:

- zip_environment_scores
- zip_poi_distances
- zip_amenity_counts
- zip_amenity_ratios
- zip_indices

> **There are over 200 individual fields available across all field groups.**

## Documentation

- Full documentation: [https://airelit.com/docs](https://airelit.com/docs)
- Product page: [https://airelit.com/apis/terracore](https://airelit.com/apis/terracore)

## Use Cases

Developers use TerraCore to:

- Enrich real estate and proptech platforms
- Analyze neighborhood demographics
- Build market analysis tools
- Provide geographic context to AI agents
- Score locations using census block group data

---

**Notes:**

- Coordinate, GEOID, and address lookups return block group-level results
- ZIP code lookups return population-weighted aggregate results and may include `contributing_block_groups`
- Address lookups include `resolved_address`, `resolved_latitude`, and `resolved_longitude` in meta

